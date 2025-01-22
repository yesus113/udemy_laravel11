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
        Schema::create('hyt_dht11s', function (Blueprint $table) {
            $table->id();
            $table->float('hyt_temp', 5, 2)->default(0);
            $table->float('hyt_humd', 5, 2)->default(0);
            $table->timestamp('hyt_fecha')->default(DB::raw('CURRENT_TIMESTAMP'));
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hyt_dht11s');
    }
};
