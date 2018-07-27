<?php

namespace GolpeAvisa\Http\Controllers\Apis;

use GolpeAvisa\Contact;
use Illuminate\Http\Request;
use GolpeAvisa\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();

        return response()->json($contacts);
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
        $message = array(
            0 => 'Success.',
            1 => 'Incomplete data.',
            2 => 'Contact Registered.',
        ); // default messages

        $response = [];

        if(!isset($request['fName']) || !isset($request['fCellphone']))
            $status = 1;
        else{
            //'name', 'cellphone', 'user_id'
            $name = $request->get('fName');
            $cellphone = $request->get('fCellphone');
            $user_id = $request->get('user_id');

            if($name != '' && $cellphone != ''){
                Contact::updateOrCreate(
                    ['user_id' => $user_id], // if exist a row with this values
                    [ 'name' => $name, 'cellphone' => $cellphone] // uptdate it with this info
                );  // this is for add the contact on database
            $status = 0;
            }
            else{
                $status = 1;
            }    
        }

        if(!isset($request['sName']) || !isset($request['sCellphone']))
            $status = 2;
        else{
            //'name', 'cellphone', 'user_id'
            $id = 2;
            $name = $request->get('sName');
            $cellphone = $request->get('sCellphone');
            $user_id = $request->get('user_id');

            if($name != '' && $cellphone != ''){
                Contact::updateOrCreate(
                    ['id' => $id, 'user_id' => $user_id], // if exist a row with this values
                    [ 'name' => $name, 'cellphone' => $cellphone] // uptdate it with this info
                );  // this is for add the contact on database
                $status == 0 ? $status = 0 : $status = 2;
            }
            else{
                $status = 2;
            }
        }
        
        $response = array( // response with data, just status and confirmation message
            'status' => $status,
            'message' => $message[$status],
        );
        return $response; // return response
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$email = DB::table('users')->where('name', 'John')->value('email');
        $contacts = Contact::where('user_id', $id)->get();

        return response()->json($contacts); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);

        $contact->delete(); // to delete contact id

        return response()->json('Contact Deleted Success'); //return confirmation
    }
}
