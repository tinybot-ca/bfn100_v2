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
        $users = User::orderBy('name', 'asc')->get();

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
        
        // categories
        for ($n = 5; $n >= 0; $n--)
        {
            $date = date('Y-m', strtotime(Carbon::create( date('Y'), date('m'), date('d') )->subMonthsNoOverflow($n)));
            $chart['categories'][] = date('M Y', strtotime($date));
        }

        // series
        $users = User::orderBy('name', 'asc')->get();
        $series = [];

        foreach ($users as $user)
        {
            $amount = [];
            
            for ($n = 5; $n >= 0; $n--)
            {
                $date = date('Y-m', strtotime(Carbon::create( date('Y'), date('m'), date('d') )->subMonthsNoOverflow($n)));

                $pushups = Pushup::where('user_id', '=', $user->id)
                                    ->orderBy('datetime')
                                    ->whereYear('datetime', date('Y', strtotime($date)))
                                    ->whereMonth('datetime', date('m', strtotime($date)))
                                    ->get();
                
                $amount[] = $pushups->sum('amount') ?? 0;
            }

            $series[] = ['name' => $user->name, 'data' => $amount];
        }

        $chart['series'] = $series;

        return $chart;
    }

    public function overall()
    {
        $chart = [];
        
        $users = User::orderBy('name', 'asc')->get();

        foreach ($users as $user)
        {
            $amount = $user->pushups->sum('amount');

            $series[] = ['name' => $user->name, 'y' => $amount];
        }

        $chart['series'] = $series;

        return $chart;
    }

    public function annual()
    {
        $chart = [];

        // Find out how many years exist
        $years = Pushup::selectRaw("DISTINCT YEAR(date) as year")->latest('year')->get();

        // categories
        foreach ($years as $year) {
            $chart['categories'][] = $year['year'];
        }

        // series
        $users = User::orderBy('name', 'asc')->get();

        foreach ($users as $user)
        {
            $data = [];

            foreach ($years as $year)
            {
                $amount = Pushup::where('user_id', '=', $user->id)->whereYear('datetime', '=', $year['year'])->sum('amount');

                // var_dump($amount);

                $data[] = (int) ($amount ?? 0);
            }

            $series[] = ['name' => $user->name, 'data' => $data];
        }

        $chart['series'] = $series;

        return $chart;
    }

    public function wordCloud()
    {
        $chart = '';
        $pushups = Pushup::latest()->limit(150)->get();

        foreach ($pushups as $pushup)
        {
            $chart .= $pushup->comment ?  $pushup->comment . ', ' : '';
        }

        $wordFilter = array("the", "The", "test", "Test", "for", "For", "a", "A", "from", "From", "have", "Have");
        
        return str_replace($wordFilter, "", $chart);
    }

}
