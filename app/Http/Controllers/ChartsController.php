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
        $series = [];
        $categories = [];
        $chart = [];

        $rows = DB::table('pushups')
                    ->join('users', 'pushups.user_id', '=', 'users.id')
                    ->selectRaw('users.name as name, sum(pushups.amount) as amount, pushups.date as date')
                    ->whereYear('datetime', '=', date('Y'))
                    ->whereMonth('datetime', '=', date('m'))
                    ->groupBy('name', 'date')
                    ->get();

        foreach ($rows as $row) 
        {
            $series[] = ['name' => $row->name, 'data' => [$row->date, (int)$row->amount]];
        }

        $rows = DB::table('pushups')
                    ->selectRaw('pushups.date as date')
                    ->whereYear('datetime', '=', date('Y'))
                    ->whereMonth('datetime', '=', date('m'))
                    ->orderBy('date')
                    ->get();

        $categories = $rows->pluck('date')->unique();

        $chart['series'] = $series;
        $chart['categories'] = $categories;

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
