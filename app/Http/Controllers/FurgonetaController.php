<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Furgoneta;
use Illuminate\Support\Facades\Http;

class FurgonetaController extends Controller
{
    public function obtenerFurgonetas(){
        
        $token = request()->bearerToken();

        $response = Http::withToken($token)->acceptJson()->get('http://localhost:3000/api/rentACamper/furgonetas');

        return response()->json($response->json());
    }


    public function obtenerReservasUser(){
        $token = request()->bearerToken();

        $userId = auth()->user()->id;
        

        $url = "http://localhost:3000/api/rentACamper/reservas/$userId";
        
        $response = Http::withToken($token)->acceptJson()->get($url);

        if($response->successful()){
            return response()->json($response->json(),200);
        }

    }
    //Furgonetas reservadas del user
    public function getFurgonetasUser(){
        $token = request()->bearerToken();

        $userId = auth()->user()->id;

        $url = "http://localhost:3000/api/rentACamper/furgonetas/usuario/$userId";

        $response = Http::withToken($token)->acceptJson()->get($url);

        if($response->successful()){
            return response()->json($response->json(),200);
        }

    }



    public function crearFurgoneta(Request $request){
        $user = auth()->user();

        if (!$user) {
            return response()->json(['error' => 'Usuario no autenticado'], 401);
        }

        $datos = $request->only([
            'modelo', 'precio', 'localizacion', 'descripcion', 'fotos'
        ]);

        $datos['user_id'] = $user->id;
        


        $response = Http::withToken($request->bearerToken())->timeout(60)->post('http://localhost:3000/api/rentACamper/furgonetas/crear', $datos);
        
        

        if($response->successful()){
            return response()->json($response->json(), 201);
        }else{
            return response()->json(['error'=>'Error al crear la furgoneta',
                                      'mensaje'=>$response->body(),                                
        ], $response->status());
        }

    }


    public function crearReserva(Request $request){
        $user = auth()->user();

        if (!$user) {
            return response()->json(['error' => 'Usuario no autenticado'], 401);
        }

        $datos = $request->only([
            'furgoneta_id', 'fecha_inicio', 'fecha_fin'
        ]);

        $datos['user_id'] = $user->id;

        $response = Http::withToken($request->bearerToken())
                    ->acceptJson()
                    ->post('http://localhost:3000/api/rentACamper/reservas/crear', $datos);



                    if ($response->successful()) {
                        return response()->json($response->json(), 201);
                    } else {
                        return response()->json([
                            'error' => 'Error al crear la reserva',
                            'mensaje' => $response->body()
                        ], $response->status());
                    }
    }



    
}
