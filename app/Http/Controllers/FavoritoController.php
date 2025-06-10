<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FavoritoController extends Controller
{
   public function getFavoritosUsuario(){
        $token = request()->bearerToken();

        $userId = auth()->user()->id;

        $url = "http://localhost:3000/api/rentACamper/favoritos/$userId";

        $response = Http::withToken($token)->acceptJson()->get($url);

        if($response->successful()){
            return response()->json($response->json(),200);
        }

    }
}
