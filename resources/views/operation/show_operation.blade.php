@extends('layouts.app')


@section('title')

Mostrar Operacion

@endsection

@section('content')
<div class="dashboard-container">
  <div class="sidebar-wrapper">
    @include('operation.sidebar')
  </div>
  <div class="content-wrapper">
    <div class="operation-info">
      <h2 class="operation-title">{{ $find_operation->title }}</h2>
      <div class="alert alert-secondary" role="alert">
        {{ $find_operation->operation_type }}
      </div>
      <div class="alert alert-primary" role="alert">
        {{ $find_operation->item }}
      </div>
    </div>
    <div class="list-group">

      <div class="container">

        @foreach ($steps as $step)

        <div class="list-group-item list-group-item-action">

        <a href="/operations/{{$id}}/steps/{{$step->id}}">Mostrar detalle del paso: {{$step->name}}</a>

          @foreach ($op_messages as $message)

          @if ($message->step_id == $step->id)

          <a href="/operations/{{$id}}/steps/{{ $message->step_id }}/messages/{{$message->id}}"
            class="list-group-item list-group-item-action">
            @foreach($participants as $participant)
            @if($participant->user_id == $message->user_id)
            @foreach($roles as $role)
            @if($message->user_id == $role->id)
            <span style="display:none;">{{$emisor = $role->role_name}}</span>
            @endif
            @endforeach
            @endif
            @if($participant->user_id == $message->to_id)
            @foreach($roles as $role)
            @if($message->to_id == $role->id)
            <span style="display:none;">{{$receptor = $role->role_name}}</span>
            @endif
            @endforeach
            @endif
            @endforeach
            <p class="mb-1">Emisor: <strong>{{$emisor}}</strong> </p>
            <p class="mb-1">Receptor: <strong>{{$receptor}}</strong></p>
            <hr>
            <div class="d-flex w-100 justify-content-between">

              <h5 class="mb-1">{{$message->affair}}</h5>


              <small>{{$message->created_at}}</small>
            </div>
            <p class="mb-1">{{$message->message}}
            </p>
            <small></small>
          </a>

          @endif

          @endforeach

        </div>
        @endforeach

      </div>

    </div>

    <div class="button-list">
      <a href="/operations/{{$id}}/steps/{{ $step->id }}/messages/create" class="btn btn-primary">Crear Mensaje</a>
      <a href="/operations/{{$id}}/steps/create" class="btn btn-primary">Crear Paso</a>
      <a href="/operations/{{$id}}/participants" class="btn btn-primary">Ver los participantes</a>
    </div>

  </div>
</div>

@endsection
