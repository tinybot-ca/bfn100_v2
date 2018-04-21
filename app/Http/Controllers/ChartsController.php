<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pushup;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ChartsController extends Controller
{
    // Current Month
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
        $users = User::all();

        foreach ( $users as $user ) 
        {
            $data = [];

            $pushups = $user->pushups->sortBy('datetime');

            for ( $n = 1; $n <= $day; $n++)
            {
                $chart['categories'][$n] = $n;

                $pushup = $pushups
                    ->firstWhere('date', '=', date('Y-m-d', strtotime(date('Y') . '-' . date('m') . '-' . $n )));

                $data[$n] = ($pushup->amount ?? 0) + ($data[$n - 1] ?? 0);
            }

            $chart['series'][] = ['name' => $user->name, 'data' => $data];
        }

        return $chart;



        // $series = DB::table('pushups')
        //             ->join('users', 'pushups.user_id', '=', 'users.id')
        //             ->selectRaw('users.name as name, sum(pushups.amount) as amount, pushups.date as date')
        //             ->whereYear('datetime', '=', date('Y'))
        //             ->whereMonth('datetime', '=', date('m'))
        //             ->groupBy('name', 'date')
        //             ->get();

        // $names = array();
        // $data = array();


        $users = User::all();
        $chart = [];

        foreach ( $users as $user )
        {
            $pushups = $user->pushups->sortBy('datetime');
            $sum = 0;
            $data = [];

            foreach ( $pushups as $pushup ) 
            {
                if ( $pushup->datetime->year == date('Y') ) 
                {
                    if ( $pushup->datetime->month == date('m') ) 
                    {
                        $data[] = [('Date.UTC(' 
                                    . $pushup->datetime->year . ', ' 
                                    . ($pushup->datetime->month - 1) . ', ' 
                                    . $pushup->datetime->day . ')'), ($pushup->amount + $sum)];

                        // $data[] = [$pushup->datetime->toDateString(), ($pushup->amount + $sum)];

                        // $data[] = [strtotime($pushup->datetime), ($pushup->amount + $sum)];
                        
                        $sum += $pushup->amount;
                    }
                }
            }

            $chart[] = ['name' => $user->name, 'data' => $data];
        }

        // return $chart;
    }

    // Last Month
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

}
