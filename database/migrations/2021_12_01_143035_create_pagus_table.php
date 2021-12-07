<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagus', function (Blueprint $table) {
            $table->id();
            $table->string("kode_pagu");
            $table->string("uraian");
            $table->string("jenis_volume");
            $table->integer("jumlah_volume");
            $table->integer("nilai");
            $table->bigInteger("pagu_anggaran");
            $table->bigInteger("sisa");
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
        Schema::dropIfExists('pagus');
    }
}
