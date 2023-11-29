<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalTayang;
use App\Models\Studio;
use App\Models\Pemesanan;
use App\Models\Kursi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $studios = Studio::latest()->paginate(3);
        $listFilm = JadwalTayang::latest()->paginate(12);
        $pemesanans = Pemesanan::where('id_user', Auth::user()->id)->get();

        return view('user.home', compact('studios', 'listFilm', 'pemesanans'));
    }

    public function detail_film($id)
    {
        $jadwalTayang = JadwalTayang::find($id);

        $today = Carbon::today();
        $cekKursi = Pemesanan::whereDate('created_at', $today)
            ->where('id_jadwal_tayang', $id)
            ->pluck('id_kursi');

        $kursis = Kursi::where('id_studio', $jadwalTayang->studio->id)
            ->whereNotIn('id', $cekKursi)
            ->get();

        return view('user.detail', compact('jadwalTayang', 'kursis'));
    }

    public function payment($id)
    {
        $pemesanan = Pemesanan::find($id);
        $jadwalTayang = JadwalTayang::where('id', $pemesanan->id_jadwal_tayang)->first();

        return view('user.payment', compact('jadwalTayang', 'pemesanan'));
    }

    public function update_payment($id, Request $request)
    {
        $pemesanan = Pemesanan::find($id);

        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png|max:1024'
        ]);

        $input = $request->all();

        if ($file = $request->file('file')) {
            $destinationPath = 'assets/images/';
            $fileName = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
            $input['file'] = "$fileName";
        }

        $input['status'] = Pemesanan::STATUS_ON_PROGRESS;

        $pemesanan->update($input);

        Alert::toast('Data Berhasil Disimpan', 'success');
        return redirect()->route('user');
    }

    public function store_ticket(Request $request)
    {
        $request->validate([
            'id_jadwal_tayang' => 'required',
            'id_kursi' => 'required',
        ]);

        $id_jadwal_tayang = $request->id_jadwal_tayang;
        $id_kursi = $request->id_kursi;

        Pemesanan::create([
            'id_jadwal_tayang' => $id_jadwal_tayang,
            'id_user' => Auth::user()->id,
            'id_kursi' => $id_kursi,
            'file' => 'tes',
            'status' => Pemesanan::STATUS_NOT_PAID
        ]);

        Alert::toast('Data Berhasil Disimpan', 'success');
        return redirect()->route('user');
    }
}
