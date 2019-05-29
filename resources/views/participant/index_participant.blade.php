@extends('layouts.app')

@section('content')

    @if (Count($op_part) == 0)

    <div class="alert alert-danger container mt-2" role="alert"> There no paricipants on this operation</div>

    <div class="container"><a href="/operations/{{$id}}/participants/form" class="btn btn-primary">Crear Prticipantes</a></div>

    @else

    <div class="mt-2">
        @foreach ($op_part as $part)

        <div class="container list-group-item">
            <div>{{ $part->user->name }}</div>
            <div>{{ $part->role->role_name }}</div>
        </div>

        @endforeach

        </div>

    <div class="container"> <a href="/operations/{{$id}}/participants/edit" class="btn btn-success mt-2">Modificar los participantes</a></div>

    @endif
@endsection
