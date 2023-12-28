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
        Schema::table('data_cert', function (Blueprint $table) {
            $table->timestamp('created_at')->nullable(); // Timestamp terisi otomatis
            $table->timestamp('updated_at')->nullable(); // Timestamp terisi otomatis
            $table->dropColumn('tanggal_input');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_cert', function (Blueprint $table) {
            $table->timestamp('created_at')->nullable(); // Timestamp terisi otomatis
            $table->timestamp('updated_at')->nullable(); // Timestamp terisi otomatis
            $table->dropColumn('tanggal_input');
        });
    }
};
