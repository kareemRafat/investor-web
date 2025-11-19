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
            $table->enum('type', ['one-time', 'annual', 'money_contribution']);
            $table->bigInteger('min_value')->nullable();
            $table->bigInteger('max_value')->nullable();
            $table->string('label_en'); // النص اللي هيظهر في الراديو
            $table->string('label_ar');
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
