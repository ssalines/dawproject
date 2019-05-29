<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;
use App\User;

class ClassroomController extends Controller
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
        $usr = auth()->user();

        $classrooms = Classroom::all();

        return view('classroom.index_classroom', compact('classrooms', 'usr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usr = auth()->user();

        return view('classroom.create_classroom', compact('usr'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $usr = auth()->user();
        request()->validate([
            'name' => ['required', 'min:5']
        ]);

        $request->request->add(['user_id' => $usr->id]);

        Classroom::create(request(['name', 'user_id']));

        return redirect('/users/'.$usr->id.'/classrooms');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Classroom $classroom)
    {
        return view('classroom.show_classroom', compact('classroom', 'user'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
