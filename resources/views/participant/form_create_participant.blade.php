@extends('layouts.app')


@section('title')

    Crear Participantes

@endsection

@section('content')

@if($errors->any())
<div class="container alert alert-danger">
<h6>Fix the following errors:</h6>
<br>
  <ul>

    @foreach($errors->all() as $error)

    <li>
      {{ $error }}
    </li>

    @endforeach

  </ul>

</div>
 @endif

<form method="post" class="container mt-5" action="/operations/{{$operation->id}}/participants">

        @csrf

    <input type="text" class="input" id="participant_num" style="display:none;" value="{{$cont}}" name="participant_num">

        @for ($i = 0; $i < $cont; $i++)

            <select class="mt-2" name="participant_role[]">

                <option value="0">Select a role</option>

            @foreach ($roles as $role)

                <option value="{{ $role->id }}">{{ $role->role_name }}</option>

            @endforeach

        </select>

        <select class="mt-2" name="participant_user[]">

                <option value="0">Select a user</option>

            @foreach ($users as $user)

        <option value="{{ $user->id }}">{{ $user->name }}</option>

            @endforeach

        </select>

        <br>

        @endfor

    <button class="mt-2" type="submit">Enviar</button>
</form>


@endsection
