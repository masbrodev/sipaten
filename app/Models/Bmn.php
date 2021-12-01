<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bmn extends Model
{
    use HasFactory;
    protected $table = 'bmns';
    protected $primaryKey = 'id';
    protected $fillable = [
        'pagu_id',
        'kode_barang',
        'nama_barang',
        'merk_type',
        'nilai',
        'tahun_peroleh',
        'kondisi',
        'lokasi',
        'pengurus',
        'pagu',
        'keterangan',
    ];
}
