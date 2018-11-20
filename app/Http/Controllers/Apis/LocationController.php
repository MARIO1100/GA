<?php

namespace GolpeAvisa\Http\Controllers\Apis;

use GolpeAvisa\Location;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GolpeAvisa\Http\Controllers\Controller;

class LocationController extends Controller
{

    /**
     * Get the quantity of incidents per hour.
     *
     * @return \Illuminate\Http\Response
     */
    public function getData()
    {
        // get data for maps makers
        $data = DB::table('incidents')
            ->join('locations', 'locations.id', '=', 'incidents.location_id')
            ->join('users', 'users.id', '=', 'incidents.user_id')
            ->join('people', 'people.id', '=', 'users.person_id')
            ->select('speed', 'latitud', 'longitud', 'date', 'name', 'lastname', 'email')
            ->get();

        return response()->json($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();

        return response()->json($locations);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $location = Location::find($id);

        return response()->json($location);
    }

}
