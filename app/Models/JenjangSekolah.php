<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JenjangSekolah extends Model
{
    use HasFactory;

    protected $table = 'jenjang_sekolah';

    public function profilSekolah (): HasMany
    {
        return $this->hasMany(ProfilSekolah::class, 'jenjang_id', 'id');
    }

}
