<?php

namespace App\Http\Controllers;

use App\Models\JadwalTayang;
use App\Models\Film;
use App\Models\Teater;
use App\Models\Studio;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JadwalTayangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Confirm Delete Alert
        $title = 'Hapus Data!';
        $text = "Apakah yakin ingin menghapus data? Data yang dihapus tidak dapat dikembalikan";
        confirmDelete($title, $text);

        $jadwalTayangs  = JadwalTayang::all();

        return view('admin.jadwal_tayang.index', compact('jadwalTayangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $films = Film::all();
        $teaters = Teater::all();
        $studios = Studio::all();

        return view('admin.jadwal_tayang.create', compact('films', 'teaters', 'studios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_film' => 'required',
            'id_teater' => 'required',
            'id_studio' => 'required',
            'tanggal_tayang' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'harga' => 'required',
        ]);

        $input = $request->all();

        JadwalTayang::create($input);

        Alert::toast('Data Berhasil Disimpan', 'success');

        return redirect()->route('jadwal_tayang.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(JadwalTayang $jadwalTayang)
    {
        return view('admin.jadwal_tayang.show', compact('jadwalTayang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JadwalTayang $jadwalTayang)
    {
        $films = Film::all();
        $teaters = Teater::all();
        $studios = Studio::all();

        return view('admin.jadwal_tayang.edit', compact('jadwalTayang', 'films', 'teaters', 'studios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JadwalTayang $jadwalTayang)
    {
        $request->validate([
            'id_film' => 'required',
            'id_teater' => 'required',
            'id_studio' => 'required',
            'tanggal_tayang' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'harga' => 'required',
        ]);

        $input = $request->all();

        $jadwalTayang->update($input);

        Alert::toast('Data Berhasil Diperbarui', 'success');

        return redirect()->route('jadwal_tayang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalTayang $jadwalTayang)
    {
        $jadwalTayang->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');

        return redirect()->route('jadwal_tayang.index');
    }
}
