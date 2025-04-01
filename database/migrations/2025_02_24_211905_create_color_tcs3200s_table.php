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
        Schema::create('color_tcs3200s', function (Blueprint $table) {
            $table->id();
            $table->float('col_R', 15, 2)->default(0);
            $table->float('col_G', 15, 2)->default(0);
            $table->float('col_B', 15, 2)->default(0);
            $table->timestamp('col_fecha')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreignId('configuration_id')->constrained()
            ->onDelete('cascade');

            $table->foreignId('tipo_piel_id')->constrained()
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('color_tcs3200s');
    }
};
