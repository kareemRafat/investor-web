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
        Schema::create('idea_expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idea_id')->constrained()->cascadeOnDelete();

            $table->decimal('company', 15, 2)->nullable();
            $table->decimal('assets', 15, 2)->nullable();
            $table->decimal('salaries', 15, 2)->nullable();
            $table->decimal('operating', 15, 2)->nullable();
            $table->decimal('other', 15, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('idea_expenses');
    }
};
