<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;

    protected $table = 'claims';
    protected $primaryKey = 'id';
    protected $fillable = [
        'bmn_id',
        'user_id',
        'kode_claim',
        'nota_dinas',
        'nilai',
        'keterangan',
        'tindak_lanjut',
        'status',
    ];
}
