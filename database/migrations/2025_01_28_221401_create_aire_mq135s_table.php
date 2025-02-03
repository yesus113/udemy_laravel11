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
        Schema::create('aire_mq135s', function (Blueprint $table) {
            $table->id();
            $table->float('air_CO2', 5, 2)->default(0);
            $table->float('air_NH3', 5, 2)->default(0);
            $table->float('air_C2H5OH', 5, 2)->default(0);
            $table->float('air_toluelo', 5, 2)->default(0);
            $table->float('air_NOx', 5, 2)->default(0);
            $table->float('air_alcohol', 5, 2)->default(0);
            $table->timestamp('air_fecha')->default(DB::raw('CURRENT_TIMESTAMP'));
            
            $table->foreignId('configuration_id')->constrained()
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aire_mq135s');
    }
};
