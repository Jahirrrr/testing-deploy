<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JmlKapitaSekolah extends Model
{
    use HasFactory;

    protected $table = 'jml_kapita_sekolah';

    protected $fillable = [
        'jml_guru',
        'jml_guru_pendidikan_khusus',
        'jml_peserta_didik',
        'jml_peserta_didik_disabilitas',
        'jml_netra',
        'jml_rungu',
        'jml_wicara',
        'jml_daska',
        'jml_lumpuh_layu',
        'jml_paraplegi',
        'jml_celebral_palsy',
        'jml_kesulitan_belajar',
        'jml_autis',
        'jml_hiperaktif',
        'jml_rungu_wicara',
        'jml_netra_rungu',
        'jml_lainnya'
    ];

    public function profil_sekolah()
    {
        return $this->hasOne(ProfilSekolah::class, 'kapita_id');
    }
}
