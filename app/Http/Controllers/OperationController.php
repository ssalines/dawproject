<?php

namespace App\Http\Controllers;

use App\Operation;
use Illuminate\Http\Request;
use App\Message;
use App\User;
use App\Role;
use App\Participant;
use App\Step;


class OperationController extends Controller
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
    public function index()
    {
        $operationstest = auth()->user()->operation;
        $operations = Operation::all();
        $participants = Participant::all();
        $user = auth()->user();

        return view('operation.dashboard', compact('operations', 'user', 'participants', 'operationstest'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user()->id;

        $roles = Role::all();

        $users = User::all();

        return view('operation.create_operation', compact('user', 'roles', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate([
            'title' => ['required ', ' min:5'],
            'first_step' => ['required ', ' min:1']
        ]);

        $operation = Operation::create(request(['title', 'user_id', 'operation_type', 'exp_name','exp_country', 'imp_name', 'imp_country', 'role', 'item', 'currency', 'price', 'transport', 'incoterm', 'payment', 'insurance_carrier', 'legislation', 'documents', 'language', 'contract']));

        $request->request->add(['name' => $request->first_step]);

        app(StepController::class)->store($operation, $request);

        return redirect('/operations');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function show(Operation $operation, Message $message)
    {
        $id = $operation->id;

        $user = auth()->user();

        $operations = auth()->user()->operation;

        $find_operation = Operation::find($id);

        $steps = $find_operation->step;

        //$ops_messages = $find_operation->messages;

        $op_messages = Message::orderBy('created_at', 'asc')->get();

        return view('operation.show_operation', compact('find_operation', 'op_messages', 'steps', 'id', 'operations', 'user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operation $operation)
    {
        $operation->delete();

        return redirect('/operations');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function showAll(Operation $operation)
    {
        $operations = auth()->user()->operation;
        $user = auth()->user();

        return view('operation.sidebar', compact('operations', 'user'));
    }
}
