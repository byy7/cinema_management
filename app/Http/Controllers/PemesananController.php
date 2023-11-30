<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemesanans = Pemesanan::all();

        $date = Carbon::now();

        $getStartOfMonth = $date->copy()->startOfMonth();
        $getEndOfMonth = $date->copy()->endOfMonth();

        $startOfMonth = Carbon::parse($getStartOfMonth)->format('Y-m-d');
        $endOfMonth = Carbon::parse($getEndOfMonth)->format('Y-m-d');

        return view('admin.pemesanan.index', compact('pemesanans', 'startOfMonth', 'endOfMonth'));
    }

    public function print($tgl_awal, $tgl_akhir)
    {
        $pemesanans = Pemesanan::whereBetween('created_at', [$tgl_awal, $tgl_akhir])->get();

        return view('admin.pemesanan.print', compact('pemesanans', 'tgl_awal', 'tgl_akhir'));
    }

    public function confirmation($id, Request $request)
    {
        $pemesanan = Pemesanan::find($id);

        if ($request->status == Pemesanan::STATUS_PAID) {
            $pemesanan->update([
                'status' => Pemesanan::STATUS_PAID
            ]);
        } elseif ($request->status == Pemesanan::STATUS_UNPAID) {
            $pemesanan->update([
                'status' => Pemesanan::STATUS_UNPAID
            ]);
        }

        Alert::toast('Data Berhasil Diperbarui', 'success');

        return redirect()->route('pemesanan.index');
    }
}
