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
            //
            $table->boolean('status')->default(false);
            $table->boolean('first_login')->default(false);
            $table->string('phone')->limit(10);
            $table->string('address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('status');
            $table->dropColumn('first_loin');
            $table->dropColumn('phone');
            $table->dropColumn('address');
        });
    }
};
