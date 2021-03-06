<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerkasUsulan extends Model
{
    use HasFactory;
    protected $table = 'berkas_usulans';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'usulan_id',
        'nama_berkas',
        'lokasi',
    ];
}
