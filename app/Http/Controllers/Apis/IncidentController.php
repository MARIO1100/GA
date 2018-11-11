<?php

namespace GolpeAvisa\Http\Controllers\Apis;

use Carbon\Carbon;
use GolpeAvisa\Incident;
use GolpeAvisa\Location;
use GolpeAvisa\User;
use GolpeAvisa\Person;
use Illuminate\Http\Request;
use GolpeAvisa\Http\Controllers\Controller;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incidents = Incident::all();

        return response()->json($incidents);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $now = Carbon::now()->toDateString(); //date 
        $hour = Carbon::now()->toTimeString(); //hour
        $date = Carbon::now();
        $day = $date->format('l');

        $latitud = $request->get('latitud');
        $longitud = $request->get('longitud');
        
        $location = new Location();
        $location->latitud = $latitud;
        $location->longitud = $longitud;
        $location->save();

        $speed = $request->get('speed');
        $user_id = $request->get('user_id');
        
        $incident = new Incident();
       
        $incident->speed = $speed;
        $incident->user_id = $user_id;        
        $incident->date = $now;
        $incident->time = $hour;
        $incident->day = $day;
        $incident->location_id = $location->id;

        $incident->save(); // this is for add the incident on database
        
        return $incident;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $incident = Incident::find($id);
        $data = [];

        $location = Location::find($incident->id);

        $data['Location'] = $location;

        $data['Speed'] = $incident->speed;
        $data['Date'] = $incident->date;
        $data['Time'] = $incident->time;
        $data['User'] = User::find($incident->user_id);

        return response()->json($data); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $incident = Incident::find($id);

        $incident->delete(); // to delete user id

        return response()->json('Incident Deleted Success'); //return confirmation
    }
}
