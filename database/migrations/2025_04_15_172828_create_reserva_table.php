<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reserva', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'fk_reserva_users')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('furgoneta_id');
            $table->foreign('furgoneta_id', 'fk_reserva_furgonetas')->references('id')->on('furgonetas')->onDelete('cascade')->onUpdate('cascade');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->decimal('precio_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserva');
    }
};
