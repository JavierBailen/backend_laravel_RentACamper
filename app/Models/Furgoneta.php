<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Furgoneta extends Model
{
    protected $table = 'furgonetas';
    protected $fillable = ['user_id', 'modelo', 'precio' , 'descripcion', 'fotos', 'localizacion', 'disponible'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function reservas(){
        return $this->hasMany(Reserva::class);
    }
}
