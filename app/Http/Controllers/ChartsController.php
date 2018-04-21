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
            $pushups = $user->pushups;
            $sum = 0;
            $data = [];

            foreach ( $pushups as $pushup ) 
            {
                if ( $pushup->datetime->year == date('Y') ) 
                {
                    if ( $pushup->datetime->month == date('m') ) 
                    {
                        // $data[] = ['Date.UTC(' 
                        //             . $pushup->datetime->year . ', ' 
                        //             . ($pushup->datetime->month - 1) . ', ' 
                        //             . $pushup->datetime->day . ')', ($pushup->amount + $sum)];

                        $data[] = [$pushup->datetime->toDateString(), ($pushup->amount + $sum)];
                        $sum += $pushup->amount;
                    }
                }
            }

            $chart[] = ['name' => $user->name, 'data' => $data];
        }

        return $chart;
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
