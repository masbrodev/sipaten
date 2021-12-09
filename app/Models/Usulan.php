<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usulan extends Model
{
    use HasFactory;

    protected $table = 'usulans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'bmn_id',
        'user_id',
        'kode_usulan',
        'nota_dinas',
        'nilai',
        'keterangan',
        'tindak_lanjut',
        'status',
     ];
}
