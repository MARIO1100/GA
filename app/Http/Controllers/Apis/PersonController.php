<?php

namespace GolpeAvisa\Http\Controllers\Apis;

use Carbon\Carbon;
use GolpeAvisa\Person;
use Illuminate\Http\Request;
use GolpeAvisa\Http\Controllers\Controller;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = Person::all();

        return response()->json($people);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dateOfBirth = $request->get('dateOfBirth'); // get the data
        $date = Carbon::createFromFormat('Y-m-d', $dateOfBirth)->toDateString(); // to get just the date

        $person = new Person();
        //''name', 'lastname', 'dateOfBirth', 'email'
        $person->name = $request->get('name');
        $person->lastname = $request->get('lastname');
        $person->dateOfBirth = $date;

        $person->save(); // this is for add the person on database
        
        return $person;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $person = Person::find($id);

        return response()->json($person); 
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
        $person = Person::find($id);

        $person->delete(); // to delete person id

        return response()->json('Person Deleted Success'); //return confirmation
    }
}
