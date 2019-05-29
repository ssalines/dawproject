@extends('layouts.app')

@section('title') Perfil @endsection

@section('content')

<div class="container">
  <br>
  <br>

  <form>
    <div class="form-group">
      <label>Nombre:</label>
      <input class="form-control" value="{{$user->name}}" disabled>
    </div>
    <div class="form-group">
      <label>Email:</label>
      <input type="text" class="form-control" value="{{$user->email}}" disabled>
    </div>
    <div class="form-group">
      <label>Creado:</label>
      <input type="text" class="form-control" value="{{$user->created_at}}" disabled>
    </div>
    <div class="form-group">
      <label>Actualizado:</label>
      <input type="text" class="form-control" value="{{$user->updated_at}}" disabled>
    </div>
  </form>
  <a class="btn btn-primary" href="/operations">Volver a las operaciones</a>
</div>

{{-- <div>{{}}</div> --}}


@endsection
