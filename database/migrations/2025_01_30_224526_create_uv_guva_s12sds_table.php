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
        Schema::create('uv_guva_s12sds', function (Blueprint $table) {
            $table->id();
            $table->float('uv_data', 5, 2)->default(0);
            $table->timestamp('uv_fecha')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->foreignId('configuration_id')->constrained()
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uv_guva_s12sds');
    }
};
