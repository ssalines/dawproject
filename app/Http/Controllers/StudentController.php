<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\Classroom;
use App\User;

class StudentController extends Controller
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
    public function index(User $user, Classroom $classroom)
    {

        $student = $classroom->student;

        return view('student.index_student', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user, Classroom $classroom)
    {
        $users = User::all();

        return view('student.create_student', compact('classroom', 'users', 'user'));
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
            'user_id' => 'required | not_in:0',
        ]);

        Student::create(request(['classroom_id', 'user_id']));

        return redirect('/users/'.$request->user_id.'/classrooms');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {

    }
}
