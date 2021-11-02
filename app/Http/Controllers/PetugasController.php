<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ruangan;
use App\Models\DataTamu;
use App\Models\Absensi;

class PetugasController extends Controller
{
    public function index(){
        return Absensi::all();
        return DataTamu::all();
        return Ruangan::all();
    }
}
