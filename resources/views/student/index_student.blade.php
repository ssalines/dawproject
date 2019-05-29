@extends('layouts.app')

    @section('title') Mostrar Alumnos @endsection

    @section('content')
        <div class="container">
            <div class="container">
                @foreach ($student as $std)

                    {{$std}}

                @endforeach
            </div>
        </div>
    @endsection
