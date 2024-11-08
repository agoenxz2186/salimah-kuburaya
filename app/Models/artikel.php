<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artikel extends Model
{
    use HasFactory;
    protected $fillable = ['kategori_id', 'judul', 'slug', 'deskripsi', 'img', 'view', 'status', 'tanggal_publish'];
    //relasi ke kategori
    public function Kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }
}
