@extends('layouts.app')


@section('title')

    Editar Participantes

@endsection

@section('content')
<div class="container"> 
    <form method="post" class="container mt-5" action="/operations/{{ $operation->id }}/participants/edit">

        @csrf

        <input name="operation_id" value="{{ $operation->id }}" style="display: none;" disabled>

        <br>

        @foreach ($participant as $part)

            @if ($part->operation_id == $operation->id)

            <select class="col-sm-2 form-control" style="float: left;" name="participant_role{{$cont}}">

                <option disabled selected>Select a role</option>

                <option selected>{{$part->role->role_name}}</option>

                @foreach ($roles as $role)

                    @if ($part->role->role_name != $role->role_name)

                        <option value="{{ $role->id }}">{{ $role->role_name }}</option>

                    @endif

                @endforeach

        </select>

            @endif

            <select class="col-sm-2 form-control ml-5" style="float: left;" name="participant_user{{$cont}}">

                <option disabled selected>Select a user</option>

            @foreach ($users as $user)

                @if($user->id == $part->user_id)
                    <option {{$user->id}} selected>{{ $user->name }}</option>
                @endif

                 <option value="{{ $user->id }}">{{ $user->name }}</option>

            @endforeach

        </select>
        <br>
        <br>

            <input name="part_id{{$cont}}" value="{{$part->id}}" style="display: none;">
            <input name="cont" value="{{$cont++}}" style="display: none;">
        @endforeach

    <button class="btn btn-primary" type="submit">Enviar</button>
</form>
</div>

@endsection
