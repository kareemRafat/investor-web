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
        Schema::table('contact_messages', function (Blueprint $table) {
            $table->string('status')->default('unread')->after('message');
        });

        // Migrate existing data
        \DB::table('contact_messages')->where('is_read', true)->update(['status' => 'read']);
        \DB::table('contact_messages')->where('is_read', false)->update(['status' => 'unread']);

        Schema::table('contact_messages', function (Blueprint $table) {
            $table->dropColumn('is_read');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_messages', function (Blueprint $table) {
            $table->boolean('is_read')->default(false)->after('message');
        });

        // Migrate back
        \DB::table('contact_messages')->where('status', 'read')->update(['is_read' => true]);
        \DB::table('contact_messages')->where('status', 'unread')->update(['is_read' => false]);

        Schema::table('contact_messages', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
