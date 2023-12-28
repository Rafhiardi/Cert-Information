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

        Schema::create('data_cert', function (Blueprint $table){
            $table->id();
            $table->text('nama');
            $table->text('skema');
            $table->text('nomor_sertifikat')->unique();
            $table->text('masa_aktif');
            $table->timestamp('tanggal_input')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_cert');
    }
};
