<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalTayang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const TYPE_EKONOMI = "Ekonomi";
    const TYPE_VIP = "VIP";

    const TYPE_SELECT = [
        self::TYPE_EKONOMI => self::TYPE_EKONOMI,
        self::TYPE_VIP => self::TYPE_VIP,
    ];

    public function film()
    {
        return $this->belongsTo(Film::class, 'id_film', 'id');
    }

    public function studio()
    {
        return $this->belongsTo(Studio::class, 'id_studio', 'id');
    }
}
