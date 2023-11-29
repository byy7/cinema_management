<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Studio;
use App\Models\Pemesanan;

class AdminController extends Controller
{
    public function index()
    {
        $totalFilm = Film::all()->count();
        $totalPemesanan = Pemesanan::all()->count();
        $totalStudio = Studio::all()->count();
        return view('admin.home', compact('totalFilm', 'totalPemesanan', 'totalStudio'));
    }
}
