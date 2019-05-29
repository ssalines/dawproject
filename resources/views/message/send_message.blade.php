@extends('layouts.app')


    @section('title') Mostrar Mensaje @endsection

    @section('content')

<div class="container">

<br>

<!--   <a class="btn btn-primary mr-5" href="/messages/create">Crear Mensaje</a> -->
<a class="btn btn-primary" href="/messages">Ver Mensajes Recibidos</a>

<br>
<br>

<h1>Mensajes Enviados</h1>

        <ul>

            @foreach ($messages_send as $message_send)


                <div class="card list-group-item">
                    <li>
                        <a href="/messages/{{ $message_send->id }}">Ver detalles del mensaje: {{ $message_send->affair }}</a>
                        <input class="mb-2 form-control" type="text" value="{{ $message_send->affair }}" disabled>
                        @if ($message_send->file != null)
                            <input type="text" value="{{$message_send->file->name}}" class="mb-2 form-control" disabled>
                        @endif
                    </li>
                </div>

                <br>

            @endforeach

        </ul>

</div>

@endsection
