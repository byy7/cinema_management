<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Teater;
use App\Models\Studio;

class AdminController extends Controller
{
    public function index()
    {
        $totalFilm = Film::all()->count();
        $totalTeater = Teater::all()->count();
        $totalStudio = Studio::all()->count();
        return view('admin.home', compact('totalFilm', 'totalTeater', 'totalStudio'));
    }
}
