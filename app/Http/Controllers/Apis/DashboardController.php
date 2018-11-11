<?php

namespace GolpeAvisa\Http\Controllers\Apis;

use Illuminate\Support\Facades\DB;
use GolpeAvisa\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Get the quantity of incidents per hour.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIncidentsPerHour()
    {
        $incidents = DB::table('incidents')
            ->select(DB::raw('SUBSTRING(time, 1, 2) AS hour'), DB::raw('COUNT(*) AS qty'))
            ->groupBy('hour')
            ->get();

        return response()->json($incidents);
    }

    /**
     * Get the quantity of incidents per day.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIncidentsPerDay(){
        $incidents = DB::table('incidents')
            ->select('day', DB::raw('COUNT(*) AS qty'))
            ->groupBy('day')
            ->get();

        return response()->json($incidents);
    }

    public function getAll(){
        $perHour = DB::table('incidents')
                    ->select(DB::raw('SUBSTRING(time, 1, 2) AS hour'), DB::raw('COUNT(*) AS qty'))
                    ->groupBy('hour')
                    ->get();
        $perDay = DB::table('incidents')
                    ->select('day', DB::raw('COUNT(*) AS qty'))
                    ->groupBy('day')
                    ->get();
        
        $all = array(
            'PerHour' => $perHour,
            'PerDay' => $perDay
        );

        return response()->json($all);
    }
}
