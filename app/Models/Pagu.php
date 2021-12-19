<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagu extends Model
{
    use HasFactory;
    protected $table = 'pagus';
    protected $primaryKey = 'id';
    protected $fillable = [
        "kode_pagu",
        "uraian",
        "jenis_volume",
        "jumlah_volume",
        "nilai",
        "pagu_anggaran",
        "sisa",
        "created_at"
    ];
}
