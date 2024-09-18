<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasSekolah extends Model
{
    use HasFactory;

    protected $table = 'fasilitas_sekolah';

    protected $fillable = [
        'fasilitas_pendukung',
        'dukungan_untuk_siswa',
        'kegiatan_lainnya',
        'dokumentasi',
        'kualifikasi_yang_dimiliki',
        'dokumentasi_fasilitas',
    ];
}
