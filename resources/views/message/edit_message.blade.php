@extends('layouts.app')

    @section('title') Editar Mensaje @endsection

    @section('content')

    <div class="container">

        <br>

    <form method="post" action="/messages/{{ $message->id }}">

        @csrf

        @method('patch')
        <div>
            <input style="display: none;" class="input mb-2 form-control" type="text" name="user_id" value="{{request()->user()->id}}">
        </div>

        <div>
            <input class="input {{ $errors->has('affair') ? 'is-danger' : '' }} mb-2 form-control" type="text" name="affair" placeholder="Asunto" value="{{$message->affair}}">
        </div>

        <div>
            <textarea name="message" class="textarea {{ $errors->has('message') ? 'is-danger' : '' }} mb-2 form-control">{{$message->message}}</textarea>
        </div>

        <div>
            <button class="button btn btn-primary" type="submit">Confirmar Cambios</button>
        </div>
    </form>


    <form method="post" action="/messages/{{ $message->id }}">

        @method('delete')

        @csrf
    <!--
        <div style="margin-top: 10px">
            <button class="btn btn-danger" type="submit">Borrar Mensaje</button>
        </div> 
    -->
    </form>

    @if($errors->any())
        <div class="notification is-danger">
                <br>
            <ul>

                @foreach($errors->all() as $error)

                    <li>
                    <div class="alert alert-danger">
                    {{ $error }}
                    </div>
                        
                    </li>

                @endforeach

            </ul>

        </div>
    @endif
    </div>
    @endsection
