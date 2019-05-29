<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/operations/{operation}/steps/{step}/files', 'FileController@index')->name('files.index');

Route::post('/operations/{operation}/steps/{step}/files', 'FileController@store')->name('files.store');

Route::delete('/operations/{operation}/steps/{step}/files/{file}', 'FileController@destroy')->name('files.destroy');

Route::get('/operations/{operation}/steps/{step}/files/{file}/download', 'FileController@download')->name('files.download');

Route::get('/operations/{operation}/steps/{step}/messages/create', 'MessageController@create');

Route::get('/operations/{operation}/steps/{step}/messages/{message}', 'MessageController@show');
    /* Rutas del crud de los mensajes */

Route::get('/messages/send', 'MessageController@show_send');
Route::resource('/messages', 'MessageController');

/* Rutas de las operaciones que utilizan el middleware profe (Validar si el rol que tiene es el de profe o no)*/

Route::group(['middleware' => 'profe'], function () {
    Route::get('/operations/create', 'OperationController@create');
    Route::get('/operations/{operation}/edit', 'OperationController@edit');
    Route::resource('/users/{user}/classrooms', 'ClassroomController');
    Route::resource('/users/{user}/classrooms/{classroom}/students', 'StudentController');
    Route::post('/operations/{operation}/participants/edit', 'EditParticipantController@update_participant');
    Route::get('/operations/{operation}/participants/edit', 'EditParticipantController@edit_participant');
    Route::get('/operations/{operation}/participants/form', 'ParticipantController@extra_form');
    Route::post('/operations/{operation}/participants/create', 'ParticipantController@create');
    Route::resource('/operations/{operation}/participants', 'ParticipantController');

});

/* Rutas de las operaciones que no utilizan el middleware profe */

Route::get('/users/{user}', 'UserController@profile');
Route::get('/operations', 'OperationController@index');
Route::post('/operations', 'OperationController@store');
Route::patch('/operations/{operation}', 'OperationController@update');
Route::delete('/operations/{operation}', 'OperationController@destroy');
Route::get('/operations/{operation}', 'OperationController@show');

/* Ventana de error que salta en caso de que no pase el middleware de profe */

Route::get('/error/role_not_allowed', function(){
    return view('error.role_not_allowed');
});

Route::resource('/operations/{operation}/steps', 'StepController');
