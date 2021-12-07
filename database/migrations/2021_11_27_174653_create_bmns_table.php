<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBmnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bmns', function (Blueprint $table) {
            $table->id();
            $table->string("kode_pagu");
            $table->string("kode_barang");
            $table->string("nama_barang");
            $table->string("merk_type");
            $table->integer("tahun_peroleh");
            $table->string("kondisi");
            $table->string("lokasi")->nullable();
            $table->string("pengurus")->nullable();
            $table->string("keterangan")->nullable();
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
        Schema::dropIfExists('bmns');
    }
}
