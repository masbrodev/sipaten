<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriBmnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_bmns', function (Blueprint $table) {
            $table->id();
            $table->integer("kode_barang");
            $table->string("nama_barang");
            $table->string("merk_type");
            $table->integer("nilai");
            $table->integer("tahun_peroleh");
            $table->string("kondisi");
            $table->string("lokasi")->nullable();
            $table->string("pengurus")->nullable();
            $table->integer("pagu")->nullable();
            $table->string("keterangan")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategori_bmns');
    }
}
