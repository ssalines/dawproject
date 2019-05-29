@extends('layouts.app')

@section('title') Crear Mensaje @endsection

@section('content')

@if($errors->any())
<div class="notification is-danger">

  <ul>

    @foreach($errors->all() as $error)

    <li>
      {{ $error }}
    </li>

    @endforeach

  </ul>

</div>
@endif

<div class="container mt-5">
  <h2 class='mb-5'>Crear Mensaje</h2>

  <form method="POST" action="{{ route('files.store', compact('operation', 'step')) }}" enctype="multipart/form-data">

    @csrf
    <label for="to_id">
      Usuario:
    </label>
    <select id="to_id" name="to_id" class="form-control role-select mb-2">

      <option value="-">Selecciona un usuario</option>
      @foreach ($users as $user)

      <option value="{{ $user->id }}">{{ $user->name }}</option>

      @endforeach

    </select>

    <input class="input container" style="display: none;" type="text" name="step_id" value="{{$step->id}}">

    <input class="input" style="display: none;" type="text" name="user_id" value="{{request()->user()->id}}">

    <label for="asunto">
      Asunto:
    </label>
    <input id="asunto" class="mb-2 form-control input {{ $errors->has('affair') ? 'is-danger' : ''}}" type="text"
      name="affair" placeholder="asunto">

    <label for="textarea">
      Mensaje:
    </label>
    <textarea id="textarea" class="form-control mb-5 textarea  {{ $errors->has('message') ? 'is-danger' : '' }}"
      name="message" placeholder="mensaje"></textarea>



    <div class="card mt-4 mb-4">
      <div class="card-header">Subir nuevo archivo</div>
      <div class="card-body">

        <input type="file" name="file" class="form-control mr-4">


      </div>
    </div>

    <button type="submit" class="btn btn-primary"> Crear Mensaje</button>

  </form>

</div>

@endsection
