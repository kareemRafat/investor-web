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
        Schema::create('investor_resources', function (Blueprint $table) {
            $table->id();
            $table->foreignId('investor_id')->constrained()->onDelete('cascade');
            $table->enum('company', ['yes', 'no'])->nullable();
            $table->string('space_type')->nullable();
            $table->enum('staff', ['yes', 'no'])->nullable();
            $table->integer('staff_number')->nullable();
            $table->enum('workers', ['yes', 'no'])->nullable();
            $table->integer('workers_number')->nullable();
            $table->enum('executive_spaces', ['yes', 'no'])->nullable();
            $table->string('executive_spaces_type')->nullable();
            $table->enum('equipment', ['yes', 'no'])->nullable();
            $table->string('equipment_type')->nullable();
            $table->enum('software', ['yes', 'no'])->nullable();
            $table->string('software_type')->nullable();
            $table->enum('website', ['yes', 'no'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investor_resources');
    }
};
