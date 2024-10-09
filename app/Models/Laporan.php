<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Laporan extends Model
{
    use HasFactory;
    protected $fillable = ['judul', 'slug', 'tanggal_kegiatan', 'donasi', 'img', 'deskripsi', 'status', 'cabang_id', 'visibility', 'user_id'];
    //relasi ke cabang
    public function Cabang(): BelongsTo
    {
        return $this->belongsTo(Cabang::class, 'cabang_id');
    }
    public function laporanKeuangans()
    {
        return $this->hasMany(LaporanKeuangan::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
