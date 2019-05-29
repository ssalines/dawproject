<?php

namespace App\Http\Controllers;

use App\Participant;
use Illuminate\Http\Request;
use App\Role;
use App\Operation;
use App\User;

class ParticipantController extends Controller
{
    //Control user is logged in

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Operation $operation)
    {

        $id = $operation->id;

        $participant = Participant::all();

        $op_part = $participant->where('operation_id', $id);

        return view('participant.index_participant', compact('participant', 'id', 'op_part'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function extra_form(Operation $operation)
    {

        return view('participant.extra_form_participant', compact('operation'));
    }

    public function create(Operation $operation, Request $request){

        request()->validate([

            'participant_num' => 'required | min:1'

        ]);

        $cont = $request->participant_num;

        $roles = Role::all();

        $users = User::all();

        return view('participant.form_create_participant', compact('roles', 'users', 'operation', 'cont'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Operation $operation)
    {

        $cont = $request->participant_num;

        $role = $request->participant_role;

        $user = $request->participant_user;

        // request()->validate([

        //     'participant_role' => 'required | min:'.$cont,
        //     'participant_role.*' => 'required | not_in:0',
        //     'participant_user' => 'required | min:'.$cont,
        //     'participant_user.*' => 'required | not_in:0'

        // ]);

        $request->request->add(['operation_id' => $operation->id]);

        for($i = 0; $i < $cont; $i++){

            if($role[$i] != 0 && $user[$i] != 0){

                $request->request->add(['role_id' => (int)$role[$i]]);
                $request->request->add(['user_id' => (int)$user[$i]]);

            Participant::create(request(['role_id', 'operation_id','user_id']));
        }

        }

        return redirect('/operations');

    }

    public function show(Operation $operation){


        return redirect('/operations');

        // $id = $operation->id;

        // $participant = Participant::all();

        // $op_part = $participant->where('operation_id', $id);

        // return view('participant.index_participant', compact('participant', 'id', 'op_part'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participant $participant)
    {
        //
    }


}
