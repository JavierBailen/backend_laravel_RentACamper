<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ValoracionController extends Controller
{
    public function obtenerValoracionesFurgoneta($furgoneta_id){
        $token = request()->bearerToken();

        $response = Http::withToken($token)->acceptJson()->get("http://localhost:3000/api/rentACamper/$furgoneta_id");

        return response()->json($response->json());
    }




public function crearValoracion(Request $request)
{
    $token = request()->bearerToken();
    
    $response = Http::withToken($token)->post('http://localhost:3000/valoracion/crear', [
        'user_id' => auth()->id(),
        'furgoneta_id' => $request->furgoneta_id,
        'comentario' => $request->comentario,
        'puntuacion' => $request->puntuacion
    ]);

    return $response->json();
}
}
