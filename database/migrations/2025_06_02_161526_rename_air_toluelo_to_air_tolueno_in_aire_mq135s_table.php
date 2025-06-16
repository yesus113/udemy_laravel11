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
        Schema::table('aire_mq135s', function (Blueprint $table) {
             $table->renameColumn('air_toluelo', 'air_tolueno');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('aire_mq135s', function (Blueprint $table) {
            $table->renameColumn('air_tolueno', 'air_toluelo');
        });
    }
};
