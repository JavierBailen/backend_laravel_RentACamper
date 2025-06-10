<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoritoController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Controllers\FurgonetaController;
use App\Http\Controllers\ValoracionController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');





Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login',[AuthController::class, 'login']);
    Route::post('signup', [AuthController::class, 'signUp']);
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', [AuthController::class, 'logout']);
        Route::get('user', [AuthController::class, 'user']);
        Route::get('furgonetas-node', [FurgonetaController::class, 'obtenerFurgonetas']);
        Route::post('furgonetas-node/crear', [FurgonetaController::class, 'crearFurgoneta']);
        //Reservas
        Route::get('reservas-node', [FurgonetaController::class, 'obtenerReservasUser']);
        Route::post('crear-reserva', [FurgonetaController::class, 'crearReserva']);

        //Valoraciones
        Route::post('valoraciones/crear', [ValoracionController::class, 'crearValoracion']);
        Route::get('/valoraciones/{furgoneta_id}', [ValoracionController::class, 'obtenerValoracionesFurgoneta']);

        //Obtener furgonetas alquiladas por el user
        Route::get('furgonetas/user', [FurgonetaController::class, 'getFurgonetasUser']);

        //ruta para borrar usuario
        Route::delete('{id}', [AuthController::class, 'deleteUser']);


        
        
    });
});



