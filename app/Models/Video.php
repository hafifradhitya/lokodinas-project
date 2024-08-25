<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'video';
    protected $primaryKey = 'id_video';
    protected $fillable = ['id_video', 'id_playlist', 'jdl_video', 'video_seo', 'username', 'keterangan', 'tanggal', 'jam', 'hari', 'gbr_video', 'video', 'dilihat', 'youtube', 'tagvid', 'tanggal'];

    public function scopeLatest($query)
    {
        return $query->orderBy('tanggal', 'desc');
    }
    public function playlist(){
        return $this->belongsTo(Playlistvideo::class, 'id_playlist', 'id_playlist');
    }

    public function tagvideo()
    {
        return $this->belongsTo(Tagvideo::class, 'id_tag', 'id_tag');
    }

    public function komentarvideo()
    {
        return $this->belongsTo(Komentarvideo::class, 'id_komentar');
    }
}
