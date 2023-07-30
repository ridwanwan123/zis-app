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
        Schema::create('penyaluran_danas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mosque')->constrained('mosques');
            $table->foreignId('id_mustahik')->constrained('mustahiks');
            $table->enum('jenis_dana', ['zakat', 'infaq', 'sedekah']);
            $table->date('tanggal_penyaluran');
            $table->integer('jumlah_penyaluran');
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
        Schema::dropIfExists('penyaluran_danas');
    }
};
