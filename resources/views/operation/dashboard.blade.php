@extends('layouts.app')

@section('content')
<div class="dashboard-container">
  <div class="sidebar-wrapper">
    @include('operation.sidebar')
  </div>
  <div class="content-wrapper">
    <div class="right mr-5">
      <br>
      <a class="btn btn-primary btn-sm" href="/users/{{$user->id}}" style="margin-right: 12px;" role="button">Mi
        perfil</a>
      @if($user->rol)
      <a class="btn btn-success btn-sm" href="/users/{{$user->id}}/classrooms" style="margin-right: 12px;"
        role="button">Mi Aula</a>
      @endif
      <a class="btn btn-primary btn-sm text-white" onclick="javascript:window.location.reload();"
        style="margin-right: 12px;" role="button">Actualizar operaciones</a>
    </div>
    <img class="dashboard-bg" src="{{ asset('svg/dashboard.svg') }}" rel="stylesheet" />
  </div>
</div>
@endsection