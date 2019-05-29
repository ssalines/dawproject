@extends('layouts.app')

    @section('title')Messages @endsection

    @section('content')

        <div class="container">

        <br>

        <!-- <a class="btn btn-primary mr-5" href="/messages/create">Crear Mensaje</a> -->
        <a class="btn btn-primary" href="/messages/send">Ver Mensajes enviados</a>

        <br>
        <br>

        <h1>Mensajes Recibidos</h1>

        <ul>

            @foreach ($messages_ret as $message_ret)


                    <div class="card list-group-item">
                        <li>
                            <a href="/messages/{{ $message_ret->id }}">Ver detalles del mensaje: {{ $message_ret->affair }}</a>
                            <input class="mb-2 form-control" type="text" value="{{ $message_ret->affair }}" disabled>
                                @if ($message_ret->file != null)
                                    <input type="text" value="{{$message_ret->file->name}}" class="mb-2 form-control" disabled>
                                @endif
                        </li>
                    </div>


                <br>

            @endforeach

        </ul>

        </div>
    @endsection
