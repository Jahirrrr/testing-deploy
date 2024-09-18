<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class ProfilSekolah extends Model
{
    use HasFactory;

    protected $table = 'profil_sekolah';

    protected $fillable = [
        'kapita_id',
        'fasilitas_id',
        'nama_sekolah',
        'NPSN',
        'alamat',
        'kecamatan',
        'jenjang_id',
        'no_telepon',
        'email',
        'link_website',
        'nama_kontak_person',
        'jabatan',
        'slug'
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = Str::slug($model->nama_sekolah);
        });
    }

    public function kapita()
    {
        return $this->belongsTo(JmlKapitaSekolah::class, 'kapita_id');
    }

    public function fasilitas()
    {
        return $this->belongsTo(FasilitasSekolah::class, 'fasilitas_id');
    }

    public function jenjang()
    {
        return $this->belongsTo(JenjangSekolah::class, 'jenjang_id', 'id');
    }

    public function dokumentasi(): HasMany
    {
        return $this->hasMany(DokumentasiSekolah::class, 'sekolah_id', 'id');
    }
}
