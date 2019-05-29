<?php

namespace App\Http\Controllers;

use App\Step;
use Illuminate\Http\Request;
use App\Operation;

class StepController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Operation $operation)
    {

        return view('step.create_step', compact('operation'));

    }

    public function store(Operation $operation, Request $request)
    {

        Step::create(['operation_id' => $operation->id, 'name' => $request->name]);

        return redirect('/operations/'.$operation->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Step  $step
     * @return \Illuminate\Http\Response
     */
    public function show(Operation $operation, Step $step)
    {
        $messages = $step->messages;

        return view('step.show_step', compact('messages', 'step', 'operation'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Step  $step
     * @return \Illuminate\Http\Response
     */
    public function destroy(Step $step)
    {
        //
    }
}
