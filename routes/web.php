<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/home', [
    HomeController::class, 'index'
])->name('home');


Route::resource('estados', App\Http\Controllers\EstadoController::class)->middleware('auth');

Route::resource('privacidads', App\Http\Controllers\PrivacidadController::class)->middleware('auth');

Route::resource('giros', App\Http\Controllers\GiroController::class)->middleware('auth');

Route::resource('alcances', App\Http\Controllers\AlcanceController::class)->middleware('auth');

Route::resource('posts', App\Http\Controllers\PostController::class)->middleware('auth');

Route::resource('likes', App\Http\Controllers\LikeController::class)->middleware('auth');

Route::resource('seguidors', App\Http\Controllers\SeguidorController::class)->middleware('auth');

Route::resource('recomendacions', App\Http\Controllers\RecomendacionController::class)->middleware('auth');

Route::resource('users', App\Http\Controllers\UserController::class)->middleware('auth');

Route::resource('ilustrables', App\Http\Controllers\IlustrableController::class)->middleware('auth');

Route::resource('comentables', App\Http\Controllers\ComentableController::class)->middleware('auth');

Route::resource('blog', App\Http\Controllers\PostClienteController::class)->middleware('auth');

Route::resource('inicio', App\Http\Controllers\PaginaController::class);

//Route::resource('home', App\Http\Controllers\Controller::class)->middleware(['auth', 'estadoactivo']);




