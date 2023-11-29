<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kursis()
    {
        return $this->hasMany(Kursi::class, 'id_studio', 'id');
    }

    public function totalKursi()
    {
        return $this->kursis()->count();
    }
}
