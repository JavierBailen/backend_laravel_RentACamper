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
        Schema::create('furgonetas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'fk_furgonetas_users')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('modelo');
            $table->decimal('precio');
            $table->text('descripcion');
            $table->text('fotos');
            $table->json('localizacion')->nullable();
            $table->boolean('disponible')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('furgonetas');
    }
};
