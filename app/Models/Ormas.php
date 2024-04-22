<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ormas extends Model
{
    use HasFactory;

    public $table = 'ormas';
    public $timestamps = false;

    protected $fillable = [
        'id_user', 'nama_ormas', 'status_legalitas','alamat_kesekretariatan','id_kecamatan','id_kelurahan','nama_ketua','no_hp_ketua','surat_permohonan'
    ];

    public function pendiri(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id_kecamatan');
    }

    public function kelurahan(): BelongsTo
    {
        return $this->belongsTo(Kelurahan::class, 'id_kelurahan', 'id_kelurahan');
    }
}
