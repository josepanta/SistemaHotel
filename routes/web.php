<?php

use  App\Http\Controllers\ReservasController;
use App\Http\Controllers\HabitacionesController;
use App\Http\Controllers\TipoHabitacionesController;
use App\Http\Controllers\TipoReservasController;
use App\Http\Controllers\TipoUsersController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

Auth::routes([
    'reset' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function() {

    Route::get('/reservas/ajaxIndex', [ReservasController::class, 'ajaxIndex'])->name('reservas.ajaxIndex');
    Route::get('/reservas/dataCalendario', [ReservasController::class, 'getDataCalendario'])->name('reservas.dataCalendario');
    Route::get('/reservas/calendario', [ReservasController::class, 'getCalendario'])->name('reservas.calendario');
    Route::get('/reservas/habitacionesLibres/{fecha_inicio}/{fecha_fin}', [ReservasController::class, 'habitacionesLibres'])->name('reservas.habitacionesLibres');
    Route::resource('/reservas', ReservasController::class );

    Route::get('/habitaciones/ajaxIndex', [HabitacionesController::class, 'ajaxIndex'])->name('habitaciones.ajaxIndex');
    Route::resource('/habitaciones', HabitacionesController::class);

    Route::get('/tipo_reservas/ajaxIndex', [TipoReservasController::class, 'ajaxIndex'])->name('tipo_reservas.ajaxIndex');
    Route::resource('/tipo_reservas', TipoReservasController::class);

    Route::get('/tipo_habitaciones/ajaxIndex', [TipoHabitacionesController::class, 'ajaxIndex'])->name('tipo_habitaciones.ajaxIndex');
    Route::resource('/tipo_habitaciones', TipoHabitacionesController::class);

    Route::get('/users/ajaxIndex', [UsersController::class, 'ajaxIndex'])->name('users.ajaxIndex');
    Route::resource('/users', UsersController::class);
    
});