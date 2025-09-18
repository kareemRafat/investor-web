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

            $table->enum('contribute_type', ['sell', 'idea', 'capital', 'personal', 'both']);
            $table->enum('staff', ['full_time', 'part_time', 'supervision'])->nullable();
            $table->enum('staff_person_money', ['full_time', 'part_time', 'supervision'])->nullable();
            $table->decimal('money_amount', 12, 2)->nullable();
            $table->unsignedTinyInteger('money_percent')->nullable();
            $table->decimal('person_money_amount', 12, 2)->nullable();
            $table->unsignedTinyInteger('person_money_percent')->nullable();
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
