@extends('layouts.app')

    @section('title') Crear Aula @endsection

    @section('content')

        <div class="container">
            <div class="container">
                <form action="/users/{{ $usr->id }}/classrooms" method="POST" class="form form-group">
                    @csrf

                    <label for="Classroom name">Classroom Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Insert classroom name" required>

                    <input type="submit" class="btn btn-primary mt-2">

                </form>
            </div>
        </div>

    @endsection
