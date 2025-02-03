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
        Schema::create('tipo_piels', function (Blueprint $table) {
            $table->id();
            $table->string('tip_tipo', 500)->default('empty');
            $table->string('tip_colorPiel', 500)->default('empty');
            $table->string('tip_sensibilidadUV', 500)->default('empty');
            $table->string('tip_riesgo', 500)->default('empty');
            $table->string('tip_fotCutaneo', 500)->default('empty');
            $table->string('tip_protSolar', 500)->default('empty');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_piels');
    }
};
