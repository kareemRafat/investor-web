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
        Schema::create('idea_contributions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idea_id')->constrained()->cascadeOnDelete();

            $table->string('contribute_type')->nullable();
            $table->integer('staff')->nullable();
            $table->decimal('staff_person_money', 15, 2)->nullable();
            $table->decimal('money_amount', 15, 2)->nullable();
            $table->decimal('money_percent', 5, 2)->nullable();
            $table->decimal('person_money_amount', 15, 2)->nullable();
            $table->decimal('person_money_percent', 5, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('idea_contributions');
    }
};
