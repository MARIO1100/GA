<?php

namespace GolpeAvisa\Http\Controllers\Apis;

use GolpeAvisa\User;
use Illuminate\Support\Facades\DB;
use GolpeAvisa\Person;
use Illuminate\Http\Request;
use GolpeAvisa\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $users = User::all();
        
        
        return response()->json($users);
    }

    public function getContact($id){
        $data;
        
        $user = User::find($id);
        $contact = DB::table('contacts')
            ->select('cellphone')
            ->where('user_id', $id)
            ->first();
        
        $person = Person::find($user->person_id);


        $data = $contact->cellphone .';'. $person->name . ' ' . $person->lastname;

        return response($data);
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
        $user = new User();
        //'email', 'password', 'person_id'
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password')); // encrypt password
        $user->person_id = $request->get('person_id');

        $user->save(); // this is for add the user on database
        
        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [];
        
        $user = User::find($id);

        $data['id'] = $user->id;
        $data['email'] = $user->email;
        $data['person'] = Person::find($user->person_id);

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
        $user = Incident::find($id);

        $user->delete(); // to delete user id

        return response()->json('User Deleted Success'); //return confirmation
    }
}
