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
                 $table->boolean('auto_approve_item')->default(0)->after('is_verified');
        });
        Schema::table('chats', function (Blueprint $table) {
            $table->boolean('is_read')->nullable();
        });
        Schema::table('languages', function (Blueprint $table) {
            $table->string('country_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('auto_approve_item');
        });
        Schema::table('chats', function (Blueprint $table) {
            $table->dropColumn('is_read');
        });
        Schema::table('languages', function (Blueprint $table) {
            $table->dropColumn('country_code');
        });
    }
};
