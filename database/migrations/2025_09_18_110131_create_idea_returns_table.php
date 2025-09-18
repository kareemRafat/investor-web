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
        Schema::create('idea_returns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idea_id')->constrained()->cascadeOnDelete();

            $table->decimal('profit_only_percentage', 5, 2)->nullable();
            $table->decimal('one_time_dollar', 15, 2)->nullable();
            $table->decimal('one_time_sar', 15, 2)->nullable();
            $table->decimal('combo_dollar', 15, 2)->nullable();
            $table->decimal('combo_sar', 15, 2)->nullable();
            $table->decimal('combo_percentage', 5, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('idea_returns');
    }
};
