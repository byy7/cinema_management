<?php

namespace App\Http\Controllers;

use App\Models\Studio;
use App\Models\Teater;
use App\Models\Kursi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StudioController extends Controller
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

        $studios = Studio::all();

        return view('admin.studio.index', compact('studios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.studio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'denah_kursi' => 'required|mimes:jpg,jpeg,png|max:1024'
        ]);

        $input = $request->all();

        if ($file = $request->file('denah_kursi')) {
            $destinationPath = 'assets/images/';
            $fileName = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
            $input['denah_kursi'] = "$fileName";
        }

        Studio::create($input);

        Alert::toast('Data Berhasil Disimpan', 'success');

        return redirect()->route('studio.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Studio $studio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Studio $studio)
    {
        // Confirm Delete Alert
        $title = 'Hapus Data!';
        $text = "Apakah yakin ingin menghapus data? Data yang dihapus tidak dapat dikembalikan";
        confirmDelete($title, $text);

        $kursis = Kursi::where('id_studio', $studio->id)->get();

        return view('admin.studio.edit', compact('kursis', 'studio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Studio $studio)
    {
        $request->validate([
            'nama' => 'required',
            'denah_kursi' => 'required|mimes:jpg,jpeg,png|max:1024'
        ]);

        $input = $request->all();

        if ($file = $request->file('denah_kursi')) {
            // Remove Old File
            if (!empty($studio['denah_kursi'])) {
                $file = 'assets/images/' . $studio['denah_kursi'];

                if (file_exists($file)) {
                    unlink($file);
                }
            }

            // Store New File
            $destinationPath = 'assets/images/';
            $fileName = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
            $input['denah_kursi'] = $fileName;
        } else {
            unset($input['denah_kursi']);
        }

        $studio->update($input);

        Alert::toast('Data Berhasil Diperbarui', 'success');

        return redirect()->route('studio.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Studio $studio)
    {

        $file = 'assets/images/' . $studio['denah_kursi'];

        if (file_exists($file)) {
            @unlink($file);
        }

        $studio->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');

        return redirect()->route('studio.index');
    }

    public function store_kursi(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'id_studio' => 'required',
        ]);

        $input = $request->all();

        Kursi::create($input);

        Alert::toast('Data Berhasil Disimpan', 'success');

        return redirect()->back();
    }

    public function destroy_kursi($id)
    {
        $kursi = Kursi::find($id);

        $kursi->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');

        return redirect()->back();
    }
}
