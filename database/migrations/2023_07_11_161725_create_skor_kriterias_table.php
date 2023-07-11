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
        Schema::create('skor_kriterias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mustahik')->constrained('mustahiks');
            $table->foreignId('id_kriteria')->constrained('kriterias');
            $table->float('NR', 10, 2);
            $table->float('NH', 10, 2);
            $table->float('NK', 10, 2);
            $table->float('HA', 10, 2);
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
        Schema::dropIfExists('skor_kriterias');
    }
};
