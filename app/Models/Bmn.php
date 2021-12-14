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
        'kode_pagu',
        'kode_barang',
        'nama_barang',
        'merk_type',
        'tahun_peroleh',
        'kondisi',
        'lokasi',
        'pengurus',
        'keterangan',
    ];

    public function pagu()
    {
        return $this->hasOne(Pagu::class, 'kode_pagu', 'kode_pagu');
    }
}
