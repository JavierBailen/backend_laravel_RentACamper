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
        Schema::create('valoracion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'fk_valoracion_users')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('furgoneta_id');
            $table->foreign('furgoneta_id', 'fk_valoracion_furgonetas')->references('id')->on('furgonetas')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('puntuacion')->unsigned();
            $table->text('comentario')->nullable();
            $table->timestamp('fecha')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('valoracion', function (Blueprint $table) {
            //
        });
    }
};
