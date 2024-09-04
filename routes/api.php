<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerUser;
use App\Http\Controllers\ControllerGrupo;
use App\Http\Controllers\ControllerNota;
use App\Http\Controllers\ControllerChat;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


//Rutas de Usuario.

//Esta ruta ejecuta la funcion de crear un usuario.
Route::post('/users', [ControllerUser::class, 'store']);

//Esta ruta ejecuta la funcion de actualizar los datos de un usuario.
Route::put('/users/{id}', [ControllerUser::class, 'update']);

//Esta ruta ejecuta la funcion de eliminar un usuario.
Route::delete('/users/{id}', [ControllerUser::class, 'destroy']);

//Esta ruta ejecuta la funcion de iniciar sesion.
Route::post('/login', [AuthenticatedSessionController::class, 'login']);

//Esta ruta ejecuta la funcion de cerrar sesion.
Route::middleware(['auth:sanctum'])->post('/logout',
[AuthenticatedSessionController::class, 'logout']);//->name('api.logout');

//Esta ruta ejecuta la funcion de mostrar los datos de un usuario en el perfil.
Route::middleware('auth:api')->get('/users', [ControllerUser::class, 'show']);

//Esta ruta ejecuta la funcion de cambiar la contraseña del usuario.
Route::post('/users/cambiarcontraseña', [ControllerUser::class, 'cambiarContraseña'])->name('users.cambiarcontraseña');


//Rutas de Grupo.

//Esta ruta ejecuta la funcion de crear un Grupo.
Route::post('/grupos', [ControllerGrupo::class, 'store']);

//Esta ruta ejecuta la funcion de actualizar los datos de un Grupo.
Route::put('/grupos/{id}', [ControllerGrupo::class, 'update']);

//Esta ruta ejecuta la funcion de eliminar un grupo.
Route::delete('/grupos/{id}', [ControllerGrupo::class, 'destroy']);


//Rutas de Nota.

//Esta ruta ejecuta la funcion de Crear una Nota.
Route::post('/notas', [ControllerNota::class, 'store']);

//Esta ruta ejecuta la funcion de eliminar una Nota.
Route::delete('/notas/{id}', [ControllerNota::class, 'destroy']);


//Rutas de Chat.

//Esta ruta ejecuta la funcion de crear un Chat.
Route::post('/chats', [ControllerChat::class, 'store']);
