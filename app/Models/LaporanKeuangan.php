<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKeuangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'laporan_id',
        'jenis',
        'nominal',
        'keterangan',
        'img'
    ];

    public function laporan()
    {
        return $this->belongsTo(Laporan::class);
    }
}
