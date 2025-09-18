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
        Schema::create('idea_resources', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idea_id')->constrained()->cascadeOnDelete();

            $table->boolean('company')->nullable();
            $table->string('space_type')->nullable();
            $table->boolean('staff')->nullable();
            $table->integer('staff_number')->nullable();
            $table->boolean('workers')->nullable();
            $table->integer('workers_number')->nullable();
            $table->boolean('executive_spaces')->nullable();
            $table->string('executive_spaces_type')->nullable();
            $table->boolean('equipment')->nullable();
            $table->string('equipment_type')->nullable();
            $table->boolean('software')->nullable();
            $table->string('software_type')->nullable();
            $table->boolean('website')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('idea_resources');
    }
};
