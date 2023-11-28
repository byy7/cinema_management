<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FilmController extends Controller
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

        $films = Film::all();

        return view('admin.film.index', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.film.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'judul' => 'required',
            'sinopsis' => 'required',
            'durasi' => 'required',
            'gambar' => 'required|mimes:jpg,jpeg,png | max:1024'
        ]);

        $input = $request->all();

        if ($file = $request->file('gambar')) {
            $destinationPath = 'assets/images/';
            $fileName = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
            $input['gambar'] = "$fileName";
        }

        Film::create($input);

        Alert::toast('Data Berhasil Disimpan', 'success');

        return redirect()->route('film.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Film $film)
    {
        return view('admin.film.edit', compact('film'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Film $film)
    {
        $request->validate([
            'kode' => 'required',
            'judul' => 'required',
            'sinopsis' => 'required',
            'durasi' => 'required',
            'gambar' => 'mimes:jpg,jpeg,png | max:1024'
        ]);

        $input = $request->all();

        if ($file = $request->file('gambar')) {
            // Remove Old File
            if (!empty($film['gambar'])) {
                $file = 'assets/images/' . $film['gambar'];

                if (file_exists($file)) {
                    unlink($file);
                }
            }

            // Store New File
            $destinationPath = 'assets/images/';
            $fileName = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
            $input['gambar'] = $fileName;
        } else {
            unset($input['gambar']);
        }

        $film->update($input);

        Alert::toast('Data Berhasil Diperbarui', 'success');

        return redirect()->route('film.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        $file = 'assets/images/' . $film['gambar'];

        if (file_exists($file)) {
            @unlink($file);
        }

        $film->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');

        return redirect()->route('film.index');
    }
}
