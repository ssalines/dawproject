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

    public function extra_form(User $user, Classroom $classroom)
    {

        return view('student.extra_form_student', compact('user', 'classroom'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user, Classroom $classroom, Request $request)
    {

        request()->validate([

            'student_num' => 'required | min:1'

        ]);

        $cont = $request->student_num;

        $users = User::all();

        return view('student.create_student', compact('classroom', 'users', 'user', 'cont'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cont = $request->student_num;

        $users = $request->users;

        for($i = 0; $i < $cont; $i++){

            if($users[$i] != 0){

                $request->request->add(['user_id' => (int)$users[$i]]);

                Student::create(request(['classroom_id', 'user_id']));
        }
    }

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
