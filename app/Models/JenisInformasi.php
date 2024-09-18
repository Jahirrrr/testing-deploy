<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JenisInformasi extends Model
{
    protected $table = 'jenis_informasi';

    protected $fillable = [
        'nama_jenis',
    ];

    public function informasi(): HasMany
    {
        return $this->hasMany(Informasi::class, 'jenis_id');
    }
}
