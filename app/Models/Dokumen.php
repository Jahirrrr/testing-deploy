<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    protected $table = 'dokumen'; // Optional if your table name is the same as the model name

    // The attributes that are mass assignable.
    protected $fillable = [
        'nama_panduan',
        'deskripsi',
        'jenis_dokumen_id',
        'image_path',
        'dokumen_link',
    ];

    // Define the relationship with JenisDokumen
    public function jenisDokumen()
    {
        return $this->belongsTo(JenisDokumen::class, 'jenis_dokumen_id');
    }
}
