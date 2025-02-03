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
        Schema::create('temp_lm35s', function (Blueprint $table) {
            $table->id();
            $table->float('tem_data', 5, 2)->default(0);
            $table->timestamp('tem_fecha')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->foreignId('configuration_id')->constrained()
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temp_lm35s');
    }
};
