<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\EstadoAPIController;

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


Route::resource('estados', 'EstadoAPIController');

Route::resource('privacidads', 'PrivacidadAPIController');

Route::resource('giros', 'GiroAPIController');

Route::resource('alcances', 'AlcanceAPIController');

Route::resource('posts', 'PostAPIController');

Route::resource('likes', 'LikeAPIController');

Route::resource('seguidors', 'SeguidorAPIController');

Route::resource('recomendacions', 'RecomendacionAPIController');

Route::resource('usuarios', 'UsuariosAPIController');

Route::resource('ilustrables', 'IlustrableAPIController');

Route::resource('comentables', 'ComentableAPIController');


Route::group(['prefix' => 'auth'], function () {

    Route::post('login', 'AuthAPIController@login');
    
    Route::post('signup', 'AuthAPIController@signup');

    Route::group(['middleware' => 'auth:api'], function() {
        
        Route::get('logout', 'AuthAPIController@logout');
        
        Route::get('user', 'AuthAPIController@user');
    });
    
});
