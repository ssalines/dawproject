@extends('layouts.app')

@section('title') Crear Paso @endsection

@section('content')

<div class="container mt-4">
  <form class="form form-group" action="/operations/{{$operation->id}}/steps" method="post">

    @csrf

    <label class="label">Nombre del paso:</label>
    <input name="name" type="text" class="form-control">
    <input type="submit" class="btn btn-primary mt-2">

  </form>
</div>

@endsection