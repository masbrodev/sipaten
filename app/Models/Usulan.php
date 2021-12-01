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
        'kode',
        'nota_dinas',
        'berkas',
        'pagu',
        'keterangan',
     ];
}
