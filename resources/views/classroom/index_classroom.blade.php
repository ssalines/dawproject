@extends('layouts.app')

@section('title') Mostrar Aulas @endsection

@section('content')

<div class="container mt-4">
  <div class="row">

    @foreach ($classrooms as $class)

    <div class="container list-group-item">

      <a href="/users/{{$usr->id}}/classrooms/{{$class->id}}">Mostrar alumnos del aula</a>

      <div class="mt-3">
        @if ($usr->id == $class->user_id)

        @foreach ($class->student as $student)
        <div class="container list-group-item">
          <a href="/users/{{$student->user->id}}">{{$student->user->name}}</a>
        </div>
        @endforeach

        @endif
      </div>
    </div>

    @endforeach

  </div>
</div>

<div class="container mt-3">
  <a class="btn btn-primary text-white" onclick="window.history.back()">Volver atrás</a>
  <a class="btn btn-success text-white ml-3" href="/users/{{$usr->id}}/classrooms/create">Crear aula</a>
</div>
@endsection