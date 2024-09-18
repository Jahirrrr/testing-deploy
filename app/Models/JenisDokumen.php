<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JenisDokumen extends Model
{
    use HasFactory;

    protected $table = 'jenis_dokumen'; // Optional if your table name is the same as the model name
    public $timestamps = false;
    // The attributes that are mass assignable.
    protected $fillable = [
        'nama_jenis',
    ];

    // Define the relationship with Dokumen
    public function dokumen(): HasMany
    {
        return $this->hasMany(Dokumen::class, 'jenis_dokumen_id');
    }
}
