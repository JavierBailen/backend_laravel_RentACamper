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
        Schema::table('furgonetas', function (Blueprint $table) {
            $table->decimal('latitud')->nullable();
            $table->decimal('longitud')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('furgonetas', function (Blueprint $table) {
            $table->dropColumn(['latitud', 'longitud']);
        });
    }
};
