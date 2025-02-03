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
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->boolean('con_tipo_user')->default(false);
            $table->string('con_equipo', 50);
            $table->dateTime('con_fechaAlta');
            $table->float('con_latitud');
            $table->float('con_logitud');
            $table->string('con_user', 100);
            $table->string('con_password', 100);
        });
    }
    /*
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configurations');
    }
};
