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

    Route::get('/reservas/habitacionesLibres/{fecha_inicio}/{fecha_fin}', [ReservasController::class, 'habitacionesLibres'])->name('reservas.habitacionesLibres');
    Route::resource('/reservas', ReservasController::class );

    Route::resource('/habitaciones', HabitacionesController::class);
    Route::resource('/tipo_reservas', TipoReservasController::class);
    Route::resource('/tipo_habitaciones', TipoHabitacionesController::class);
    Route::resource('/tipo_users', TipoUsersController::class);

    Route::resource('/users', UsersController::class);
    
});