<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pushup;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ChartsController extends Controller
{
    public function chart4() 
    {
        $chart4 = DB::table('pushups')
                    ->join('users', 'pushups.user_id', '=', 'users.id')
                    ->selectRaw('users.name, sum(pushups.amount) as data')
                    ->whereYear('datetime', '=', date('Y'))
                    ->whereMonth('datetime', '=', date('m'))
                    ->groupBy('users.name')
                    ->get();

        return $chart4;
    }
}
