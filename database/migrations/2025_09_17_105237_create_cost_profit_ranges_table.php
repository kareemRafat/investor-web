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
        Schema::create('cost_profit_ranges', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['one-time', 'annual']);
            $table->bigInteger('min_value')->nullable();
            $table->bigInteger('max_value')->nullable();
            $table->string('label'); // النص اللي هيظهر في الراديو
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cost_profit_ranges');
    }
};
