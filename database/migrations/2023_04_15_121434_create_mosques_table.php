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
        Schema::create('mosques', function (Blueprint $table) {
            $table->id();
            $table->string('name_mosque');
            $table->string('address_mosque');  
            $table->integer('totalZakat')->default(0);
            $table->integer('totalPengeluaranZakat')->default(0);
            $table->integer('totalZakatBelumDisalurkan')->default(0);
            $table->integer('totalInfaq')->default(0);
            $table->integer('totalPengeluaranInfaq')->default(0);
            $table->integer('totalInfaqBelumDisalurkan')->default(0);
            $table->integer('totalSedekah')->default(0);
            $table->integer('totalPengeluaranSedekah')->default(0);
            $table->integer('totalSedekahBelumDisalurkan')->default(0);
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
        Schema::dropIfExists('mosques');
    }
};
