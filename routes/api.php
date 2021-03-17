<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('estados', App\Http\Controllers\API\EstadoAPIController::class);

Route::resource('privacidads', App\Http\Controllers\API\PrivacidadAPIController::class);

Route::resource('giros', App\Http\Controllers\API\GiroAPIController::class);

Route::resource('alcances', App\Http\Controllers\API\AlcanceAPIController::class);

Route::resource('posts', App\Http\Controllers\API\PostAPIController::class);

Route::resource('likes', App\Http\Controllers\API\LikeAPIController::class);

Route::resource('seguidors', App\Http\Controllers\API\SeguidorAPIController::class);

Route::resource('recomendacions', App\Http\Controllers\API\RecomendacionAPIController::class);

Route::resource('usuarios', App\Http\Controllers\API\UsuariosAPIController::class);

Route::resource('ilustrables', App\Http\Controllers\API\IlustrableAPIController::class);

Route::resource('comentables', App\Http\Controllers\API\ComentableAPIController::class);