<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pushup;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ChartsController extends Controller
{
    // Current Month
    public function currentMonth() 
    {
        // $series = [];
        // $categories = [];
        // $chart = [];

        $rows = DB::table('pushups')
                    ->join('users', 'pushups.user_id', '=', 'users.id')
                    ->selectRaw('users.name as name, sum(pushups.amount) as amount, pushups.date as date')
                    ->whereYear('datetime', '=', date('Y'))
                    ->whereMonth('datetime', '=', date('m'))
                    ->groupBy('name', 'date')
                    ->get();

        foreach ($rows as $row) 
        {
            $temp = array();

            $temp[] = array('name' => $row['name']);



            $series[] = ['name' => $row->name, 'data' => [$row->date, (int)$row->amount]];
        }

        /*
        ['Sep', 'Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr']


[
    { "name":"bernie","data":[400,2400,948,1000,1100,500,1200,300] },{"name":"moti","data":[210,1570,1800,1800,1200,840,1180,300]},{"name":"nikosuave","data":[0,0,0,0,0,0,460,300]},{"name":"ashman","data":[0,0,0,0,0,0,270,200]}
]

*/

        // $rows = DB::table('pushups')
        //             ->selectRaw('pushups.date as date')
        //             ->whereYear('datetime', '=', date('Y'))
        //             ->whereMonth('datetime', '=', date('m'))
        //             ->orderBy('date')
        //             ->get();

        // $categories = $rows->pluck('date')->unique();

        // $chart['series'] = $series;
        // $chart['categories'] = $categories;

        return $chart;

        // return $rows;
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
