<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalTayang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function film()
    {
        return $this->belongsTo(Film::class, 'id_film', 'id');
    }

    public function studio()
    {
        return $this->belongsTo(Studio::class, 'id_studio', 'id');
    }

    public function teater()
    {
        return $this->belongsTo(Teater::class, 'id_teater', 'id');
    }
}
