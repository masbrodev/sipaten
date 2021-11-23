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
        'kode',
        'nota_dinas',
        'berkas',
        'nilai',
        'keterangan',
    ];
}
