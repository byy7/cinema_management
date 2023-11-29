<?php

namespace App\Http\Controllers;

use App\Models\Teater;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TeaterController extends Controller
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

        $teaters = Teater::all();

        return view('admin.teater.index', compact('teaters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teater.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'gambar' => 'required|mimes:jpg,jpeg,png|max:1024'
        ]);

        $input = $request->all();

        if ($file = $request->file('gambar')) {
            $destinationPath = 'assets/images/';
            $fileName = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
            $input['gambar'] = "$fileName";
        }

        Teater::create($input);

        Alert::toast('Data Berhasil Disimpan', 'success');

        return redirect()->route('teater.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teater $teater)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teater $teater)
    {
        return view('admin.teater.edit', compact('teater'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teater $teater)
    {
        $request->validate([
            'nama' => 'required',
            'gambar' => 'mimes:jpg,jpeg,png|max:1024'
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

        $teater->update($input);

        Alert::toast('Data Berhasil Diperbarui', 'success');

        return redirect()->route('teater.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teater $teater)
    {
        $file = 'assets/images/' . $teater['gambar'];

        if (file_exists($file)) {
            @unlink($file);
        }

        $teater->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');

        return redirect()->route('teater.index');
    }
}
