@extends('layouts.app')

@section('title') Crear Paso @endsection

@section('content')

<form class="form form-group" action="/operations/{{$operation->id}}/steps" method="post">

    @csrf

    <input name="name" type="text" class="form-control">

    <input type="submit" class="btn btn-primary mt-2">

</form>

@endsection
