<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tampilabout extends Model
{
    use HasFactory;
    protected $fillable = ['img', 'judul', 'deskripsi', 'visi', 'misi', 'judulmap', 'map'];
}
