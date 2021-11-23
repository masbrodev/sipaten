<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    use HasFactory;

    protected $table = 'berkas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_berkas',
        'lokasi',
        'surat_type',
        'surat_id'
    ];
}
