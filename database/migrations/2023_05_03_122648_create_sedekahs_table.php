<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sedekahs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('id_mosque')->constrained('mosques');
            $table->string('nama_donatur');
            $table->string('phone');
            $table->integer('nominal');
            $table->enum('status', ['Belum Bayar', 'Bayar']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sedekahs');
    }
};
