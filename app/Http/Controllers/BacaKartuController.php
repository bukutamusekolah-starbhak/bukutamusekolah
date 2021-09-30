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
    public function __construct(){
        $this->middleware("auth");
    }
    public function bacakartu(){
    $statuss = Status::paginate(2);
    $absensis = Absensi::all();
    $ruangans = Ruangan::all();
    // $tmprifds = Tmprifd::all();
    // merubah menjadi sesuai pada huruf nama
    $data_tamus = DataTamu::orderBy('nama','ASC')->get();
    return view('bacakartu.bacakartu',compact('statuss','data_tamus','absensis','ruangans'));
    }
}
