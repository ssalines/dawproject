@extends('layouts.app')



    @section('title')

        Editar Operacion

    @endsection

    @section('content')


    @section('content')

    <form method="post" action="/operations/{{ $operation->id }}">

        @csrf

        @method('patch')
        <div>
            <input style="display: none;" class="input" type="text" name="user_id" value="{{request()->user()->id}}">
        </div>

        <div>
            Title: <input class="input {{ $errors->has('title') ? 'is-danger' : '' }}" type="text" name="title" placeholder="Operation title" value="{{$operation->title}}">
        </div>

        <div>
            Description: <input class="input {{ $errors->has('description') ? 'is-danger' : '' }}" type="text" name="description" placeholder="Operation description" value="{{$operation->description}}">
        </div>

        <div>
            Statement: <textarea name="statement" class="textarea {{ $errors->has('statement') ? 'is-danger' : '' }}">{{$operation->statement}}</textarea>
        </div>

        <div>
            <button class="button" type="submit">Edit Operation</button>
        </div>
    </form>


    <form method="post" action="/operations/{{ $operation->id }}">

        @method('delete')

        @csrf

        <div style="margin-top: 10px">
            <button class="button" type="submit">Delete Operation</button>
        </div>
    </form>

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

    @endsection


    @endsection
