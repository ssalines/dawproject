@extends('layouts.app')

@section('title') Mostrar Paso @endsection

@section('content')

<br>

<div class="container">

<h2>Detalles del paso {{$step->name}}</h2>

  <br>

  @foreach ($messages as $message)

  @if ($message->step_id == $step->id)

  <a href="/operations/{{$operation->id}}/steps/{{ $step->id }}/messages/{{$message->id}}"
    class="list-group-item list-group-item-action">

    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">{{$message->affair}}</h5>
      <small>{{$message->created_at}}</small>
    </div>

    <p class="mb-1">{{$message->message}}
    </p>

  </a>

  <br>

  @endif

  @endforeach

  <a class="btn btn-primary mt-2" href="/operations/{{$operation->id}}">Volver a la operación</a>

  <a href="/operations/{{$operation->id}}/steps/{{$step->id}}/messages/create" class="btn btn-primary mt-2">Crear nuevo
    mensaje en este paso</a>

</div>

@endsection
