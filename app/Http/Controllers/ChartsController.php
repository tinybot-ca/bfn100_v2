<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pushup;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ChartsController extends Controller
{
    public function currentMonth() 
    {
        /* 
            Let's try a new approach:
            - Determine today's date
            - Count the number of days from the first of the month to today's date
            - This determines the number of categories/series along x-axis
            - Create a data set for each user, ensuring a "0" entry for days with no pushup record found
            - Should I pass two separate JSON objects (e.g., one for x-axis series, and a separate for data)
            - Or try to combine them into one?
        */

        $chart = [];
        $day = date('d');
        $users = User::all()->sortBy('name');

        foreach ( $users as $user ) 
        {
            $data = [];
            $data_named = [];

            $pushups = $user->pushups->sortBy('datetime');

            for ( $n = 0; $n < $day; $n++)
            {
                $chart['categories'][$n] = $n + 1;
                
                $date = date('Y-m-d', strtotime(date('Y') . '-' . date('m') . '-' . ($n + 1) ));

                $pushup = $pushups->firstWhere('date', $date);
                
                $amount = (int)($pushup->amount ?? 0) + (int)($data[$n - 1] ?? 0);
                
                $data[$n] = $amount;
                
                $data_named[$n] = ['name' => $date, 'y' => $amount];
            }

            $chart['series'][] = ['name' => $user->name, 'data' => $data_named];
        }

        return $chart;
    }

    public function lastMonth()
    {
        $chart = [];

        $rows = DB::table('pushups')
                    ->join('users', 'pushups.user_id', '=', 'users.id')
                    ->selectRaw('users.name as name, sum(pushups.amount) as amount')
                    ->whereYear('datetime', '=', date('Y'))
                    ->whereMonth('datetime', '=', date('m') - 1)
                    ->groupBy('name')
                    ->get();

        foreach ($rows as $row) 
        {
            $chart[] = ['name' => $row->name, 'data' => array((int)$row->amount)];
        }

        return $chart;
    }

    public function rollingHistory()
    {
        $chart = [];

        $rows = DB::table('pushups')
                    ->join('users', 'pushups.user_id', '=', 'users.id')
                    ->selectRaw('users.name as name, year(date) as year, month(date) as month, sum(pushups.amount) as amount, count(date)')
                    ->whereRaw('date > DATE_SUB(now(), INTERVAL 6 MONTH)')
                    ->groupBy('year', 'month', 'name')
                    ->orderBy('year', 'month', 'name')
                    ->get();

        foreach ($rows as $row) 
        {
            $amount = (int) ($row->amount ?? 0);

            $chart['series'][$row->name][] = $amount;
        }

        return $chart;
    }

}
