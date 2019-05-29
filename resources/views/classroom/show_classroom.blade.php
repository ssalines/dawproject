@extends('layouts.app')

@section('title') Mostrar Aula @endsection

@section('content')

    @if ($user->id == $classroom->user_id)

    <div class="container">
            <div class="container">
                <h1>{{$classroom->name}}</h1>
                <div class="container">
                    @foreach ($classroom->student as $student)
                    <div class="container list-group-item">
                       <a href="/users/{{$student->user->id}}">{{$student->user->name}}</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    @endif

    <div class="container mt-3">
        <a class="btn btn-success" href="/users/{{$user->id}}/classrooms/{{$classroom->id}}/students/form">Añadir Alumnos</a>
        <a class="btn btn-primary" onclick="window.history.back()">Volver atras</a>
    </div>

@endsection
