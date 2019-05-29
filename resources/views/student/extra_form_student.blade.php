@extends('layouts.app')


@section('title')

    Crear Estudiantes

@endsection

@section('content')

<form method="post" action="/users/{{$user->id}}/classrooms/{{$classroom->id}}/students/create">

    @csrf

    <input name="classroom_id" type="number" style="display: none;" value="{{$classroom->id}}">
    <input name="user_id" type="number" style="display: none;" value="{{$user->id}}">


    <label for="">Introduce el numero de estudianes que quieres añadir al aula</label>
    <input id="student_num" name="student_num" class="input" type="number">

    <input class="btn btn-primary" type="submit">


</form>

@endsection
