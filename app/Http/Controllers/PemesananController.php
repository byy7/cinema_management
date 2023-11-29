<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemesanans = Pemesanan::all();

        return view('admin.pemesanan.index', compact('pemesanans'));
    }

    public function print()
    {
        $pemesanans = Pemesanan::all();

        return view('admin.pemesanan.print', compact('pemesanans'));
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
