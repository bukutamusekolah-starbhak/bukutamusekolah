<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
// use App\Models\Tmprifd;
use App\Models\Absensi;
use App\Models\DataTamu;
use App\Models\Ruangan;

class BacaKartuController extends Controller
{
    public function bacakartu(){
    $statuss = Status::paginate(2);
    $absensis = Absensi::all();
    $ruangans = Ruangan::all();
    // $tmprifds = Tmprifd::all();
    $data_tamus = DataTamu::latest()->paginate(1);
    return view('bacakartu.bacakartu',compact('statuss','data_tamus','absensis','ruangans'));
    }
}
