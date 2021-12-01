<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerkasUsulan extends Model
{
    use HasFactory;
    protected $table = 'berkas_usulan';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id_claim',
        'nama_berkas',
        'lokasi',
    ];
}
