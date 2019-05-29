@extends('layouts.app')

    @section('title') Crear Alumno @endsection

    @section('content')

        <div class="container">
            <div class="container">
            <form action="/users/{{$user->id}}/classrooms/{{$classroom->id}}/students" method="post" class="form form-group">
                @csrf

                    <input type="number" name="classroom_id" value="{{$classroom->id}}" style="display: none;">

                    <label for="">Select User</label>
                    <select name="user_id" class="form form-contol mt-2">
                        @foreach ($users as $usr)

                            @if ($usr->rol != 1)
                                <option value="{{$usr->id}}">{{$usr->name}}</option>
                            @endif

                        @endforeach
                    </select>

                    <input type="submit" class="btn btn-primary">

                </form>
            </div>
        </div>

    @endsection

