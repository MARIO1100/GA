<?php

namespace GolpeAvisa\Http\Controllers\Apis;

use Carbon\Carbon;
use GolpeAvisa\Incident;
use GolpeAvisa\Location;
use GolpeAvisa\User;
use GolpeAvisa\Person;
use Illuminate\Http\Request;
use GolpeAvisa\Http\Controllers\Controller;

class IncidentControllerSocket extends Controller
{
    public function accidentProbability(){
        $probabilityPerHour = array(
            array(0, 2), // 24 hours too
            array(1, 1),
            array(2, 1),
            array(3, 2),
            array(4, 1),
            array(5, 2),
            array(6, 4),
            array(7, 20),
            array(8, 15),
            array(9, 3),
            array(10, 1),
            array(11, 1),
            array(12, 8),
            array(13, 2),
            array(14, 1),
            array(15, 2),
            array(16, 1),
            array(17, 15),
            array(18, 8),
            array(19, 2),
            array(20, 1),
            array(21, 2),
            array(22, 4),
            array(23, 1),
        );

        $accident = false;
        $hour = date('h:i:sa'); //hour
        $hourOnly = date('H', strtotime($hour)); // to get just the hour
        // $probability = $probabilityPerHour[$hourOnly][1]; // getting the probability by current hour
        $probability = $probabilityPerHour[8][1]; // TO try with an specific hour

        $percentage = mt_rand(1, 100); // genering a random number between 0 - 100
        
        if($percentage  > 0 && $percentage <= $probability) { // if the percentage is between 0 to the probability will be an accident
            $accident = true;
        }

        return $accident;
    }

    public function getSpeed(){
        $speeds = array( // array with [percentage of accident speed, and speed min, speed max]
            array(28, 40, 60), // 28%
            array(45, 61, 80), // 17%
            array(90, 81, 100), // 45%
            array(100, 101, 120) // 10%
        );
        $speed = 0; // speed to initialized
        $percent = mt_rand(1, 100); // percent

        if($percent <= $speeds[0][0]) // if the first speed option percent happened
            $speed = mt_rand($speeds[0][1], $speeds[0][2]);
        else if($percent <= $speeds[1][0]) // if the second speed option percent happened
            $speed = mt_rand($speeds[1][1], $speeds[1][2]);
        else if($percent <= $speeds[2][0]) // if the third speed option percent happened
            $speed = mt_rand($speeds[2][1], $speeds[2][2]);
        else if($percent <= $speeds[3][0]) // if the fourth speed option percent happened
            $speed = mt_rand($speeds[3][1], $speeds[3][2]);
        // set speed by a random between the speed options of the arrays

        return $speed; // return speed
    }

    public function saveAccident(){
        $accident = $this->accidentProbability();

        if($accident){
            $location = 'Av. Siempre viva, Ejemplo';
            $speed = $this->getSpeed();
            $user_id = 1;
            $now = Carbon::now()->toDateString(); //date 
            $hour = Carbon::now()->toTimeString(); //hour
            $date = Carbon::now();
            $day = $date->format('l');

            $latitud = '-116.8736288';
            $longitud = '32.4705472';
            $location = Location::updateOrCreate([
                'latitud' => $latitud,
                'longitud' => $longitud
            ]);

            $incident = new Incident();
            
            $incident->location_id = $location->id;
            $incident->speed = $speed;
            $incident->date = $now;
            $incident->time = $hour;
            $incident->day = $day;
            $incident->user_id = $user_id; 

            $incident->save(); // this is for add the incident on database
            
            return response()->json(['status' => '0', 'message' => 'Accident registered'], 200);
        }
        else{
            return response()->json(['status' => '1', 'message' => 'Not Accident!'], 200);
        }
    }

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
}
