<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teater;
use App\Models\JadwalTayang;
use App\Models\Film;
use App\Models\Studio;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $teaters = Teater::latest()->paginate(3);
        $listFilm = JadwalTayang::latest()->paginate(12);
        $films = Film::all();
        $getTeaters = Teater::all();
        $studios = Studio::all();
        $pemesanans = Pemesanan::where('id_user', Auth::user()->id)->get();

        return view('user.home', compact('teaters', 'listFilm', 'films', 'getTeaters', 'studios', 'pemesanans'));
    }

    public function store_ticket(Request $request)
    {
    }
}
