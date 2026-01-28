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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('plan_type', ['free', 'monthly', 'yearly'])
                ->default('free')
                ->after('id');

            $table->integer('contact_credits')
                ->default(0)
                ->after('plan_type');

            $table->timestamp('credits_reset_at')
                ->nullable()
                ->after('contact_credits');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
