@extends('layouts.app')


    @section('title') Mostrar Mensaje @endsection

    @section('content')

<div class="container">

    <br>

    <input class="mb-2 form-control" type="text" value="{{ $message->affair }}" disabled>

<br>

    <textarea class="mb-2 form-control" cols="80" type="text" disabled>{{ $message->message }}</textarea>

<br>

    @if ($message->file_id != null)

    <div class="container list-group">

        <div class="card list-group-item">

            <div>{{ $message->file->name}}</div>

                <a class=" btn btn-primary mt-2" href="{{ $message->file->public_url }}" target="_blank">Ver el fichero</a>

                <br><a href="{{ route('files.download', compact('operation', 'step', 'file')) }}" class="btn btn-primary mt-2"> Descargar</a>

        </div>

    </div>

    @endif


@if($user === $send)

<a class="btn btn-primary" href="/messages/{{ $message->id }}/edit">Editar Mensaje</a>

@else

@endif

</div>
    @endsection
