<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bannerslider extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_banner';
    protected $table = 'banner';
    protected $fillable = ['id_banner', 'judul', 'gambar', 'tgl_posting', 'deskripsi', 'url']; // Kolom yang dapat diisi

    protected $attributes = [
        'url' => '#',
    ];
}
