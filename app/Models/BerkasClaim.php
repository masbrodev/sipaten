<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerkasClaim extends Model
{
    use HasFactory;

    protected $table = 'berkas_claims';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'claim_id',
        'nama_berkas',
        'lokasi',
    ];
}
