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
        Schema::create('infaqs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mosque')->constrained('mosques');
            $table->string('nama_donatur');
            $table->string('phone');
            $table->integer('nominalInfaq');
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
        Schema::dropIfExists('infaqs');
    }
};
