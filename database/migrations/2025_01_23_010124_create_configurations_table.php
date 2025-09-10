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
            $table->string('con_equipo', 50);
            $table->dateTime('con_fechaAlta');
            $table->float('con_latitud');
            $table->float('con_logitud');

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
