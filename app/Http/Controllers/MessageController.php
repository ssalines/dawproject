<?php

namespace App\Http\Controllers;

use App\Operation;
use App\Message;
use App\User;
use App\Step;
use App\Participant;
use App\Role;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $messages_send = auth()->user()->message_send;

        $messages_ret = auth()->user()->message_retrive;

        $users = auth()->user()->id;

        return view('message.index_message', compact('messages_send', 'messages_ret', 'users'));
    }

    /*Funcion para mostras los mensajes que se han enviado al usuario.*/
    public function show_send()
    {
        $messages_send = auth()->user()->message_send;

        $users = auth()->user()->id;

        return view('message.send_message', compact('messages_send', 'users'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Operation $operation, Step $step)
    {

        $user = auth()->user();

        $users = User::all();

        $participants = Participant::all();

        $roles = Role::all();

        return view('message.create_message', compact('users', 'step', 'user', 'operation', 'participants', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Operation $operation, Request $request)
    {
        request()->validate([

            'to_id' => ['required', 'not_in:0'],
            'affair' => ['required', 'min:5'],
            'message' =>['required', 'min:2']

        ]);

        Message::create(request(['user_id', 'to_id', 'step_id', 'file_id', 'affair', 'message']));

        return redirect('/operations/'.$operation->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Operation $operation , Step $step, Message $message, Request $request)
    {
        $id = $message->id;

        $file = $message->file;

        $message = Message::find($id);

        $user = auth()->user();

        $send = $message->user_id;

        return view('message.show_message', compact('message','user','send', 'file', 'operation', 'step'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        return view('message.edit_message', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operation $operation,  Message $message)
    {
        request()->validate([

            'affair' => ['required', 'min:5'],
            'message' => ['required', 'min:5']

        ]);

        $message->update(request(['affair', 'message']));

        return redirect('/operations/'.$operation->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();

        return redirect('/operations');
    }
}