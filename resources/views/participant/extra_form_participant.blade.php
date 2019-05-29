@extends('layouts.app')


@section('title')

Crear Participantes

@endsection

@section('content')

<form method="post" class="container mt-5" action="/operations/{{$operation->id}}/participants/create">

  @csrf

  <input name="operation_id" value="{{ $operation->id }}" style="display: none;">

  <label class="label">Elige el numero de participantes:</label>
  <input type="number" class="input" id="participant_num" name="participant_num">

  <br>

  <button class="btn btn-primary mt-2" type="submit">Enviar</button>
</form>


@endsection