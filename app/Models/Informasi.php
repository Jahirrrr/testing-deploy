<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    protected $table = 'informasi';

    protected $fillable = [
        'jenis_id',
        'gambar',
        'judul',
        'body',
    ];

    public function jenisInformasi()
    {
        return $this->belongsTo(JenisInformasi::class, 'jenis_id', 'id');
    }
}
