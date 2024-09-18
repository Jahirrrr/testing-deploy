<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DokumentasiSekolah extends Model
{
    protected $table = 'dokumentasi_sekolah';

    protected $fillable = ['path_dokumentasi'];

    public $timestamps = false;

    public function profilSekolah(): BelongsTo {
        return $this->BelongsTo(ProfilSekolah::class, 'sekolah_id', 'id');
    }
}
