<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reserva';
    protected $fillable = ['user_id', 'furgoneta_id', 'fecha_inicio', 'fecha_fin', 'precio_total'];

    public function user(){
        return $this->belongsTo(User::class);

    }

    public function furgoneta(){
        return $this->belongsTo(Furgoneta::class);
    }
}
