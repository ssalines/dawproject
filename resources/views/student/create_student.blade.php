@extends('layouts.app')

    @section('title') Crear Alumno @endsection

    @section('content')

        <div class="container">
            <div class="container">
            <form action="/users/{{$user->id}}/classrooms/{{$classroom->id}}/students" method="post" class="form form-group">
                @csrf

                    <input type="number" name="classroom_id" value="{{$classroom->id}}" style="display: none;">
                    <input type="number" name="user_id" value="{{$user->id}}" style="display: none;">
                    <input type="text" class="input" id="student_num" style="display:none;" value="{{$cont}}" name="student_num">



                    @for ($i = 0; $i < $cont; $i++)


                    <label for="">Select User</label>
                    <select name="users[]" class="form form-contol mt-2">

                        <option value="0">Select user</option>

                        @foreach ($users as $usr)

                            @if ($usr->rol != 1)
                                <option value="{{$usr->id}}">{{$usr->name}}</option>
                            @endif

                        @endforeach
                    </select>

                    <br>

                    @endfor

                    <input type="submit" class="btn btn-primary mt-2">

                </form>
            </div>
        </div>

    @endsection

