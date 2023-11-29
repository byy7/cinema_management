<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const STATUS_NOT_PAID = "Belum Bayar";
    const STATUS_ON_PROGRESS = "Menunggu Konfirmasi";
    const STATUS_PAID = "Sudah Bayar";
    const STATUS_UNPAID = "Pembayaran Ditolak";

    public function jadwalTayang()
    {
        return $this->belongsTo(JadwalTayang::class, 'id_jadwal_tayang', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function kursi()
    {
        return $this->belongsTo(Kursi::class, 'id_kursi', 'id');
    }
}
