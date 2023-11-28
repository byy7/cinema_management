<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PenggunaController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'user')->get();

        return view('admin.pengguna.index', compact('users'));
    }
}
