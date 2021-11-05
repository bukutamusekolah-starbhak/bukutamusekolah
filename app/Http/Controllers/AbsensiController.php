<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\DataTamu;
use App\Models\Ruangan;
use App\Exports\AbsensiExport;
use Maatwebsite\Excel\Facades\Excel;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct(){
    //     $this->middleware("auth");
    // }
    public function index()
    {
        return Absensi::with('ruangans','data_tamus')->get();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nokartu' => 'required|numeric',
            'keperluan'=>'required'
        ]);
        $time_now = time();
        date_default_timezone_set('Asia/Jakarta');
        $absensi = new Absensi;
        $absensi->tanggal = date('Y-m-d');
        $absensi->nokartu = $request->nokartu;
        $absensi->keperluan = $request->keperluan;
        $absensi->waktu_kedatangan = date('H:i:s');
        // $absensi->waktu_kepulangan = date("H:i:s",strtotime("+1 hours",$time_now));
        $absensi->data_tamus_id = $request->data_tamus_id;
        $absensi->ruangans_id = $request->ruangans_id;
        // $absensi->save();
        if ($request->nokartu == $absensi->data_tamus->nokartu) {
            $absensi->nokartu = $request->nokartu;
            $absensi->save();
            // return redirect('bacakartu')->with('status','selamat datang');
        } else {
            $absensi->nokartu = $request->nokartu;
            // return redirect('bacakartu')->with('erorr','maaf kartu tidak terdaftar');
        }
        // return redirect('bacakartu')->with('status','selamat datang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $absensis = Absensi::find($id);
        return response()->json($absensis);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        date_default_timezone_set('Asia/Jakarta');
        $absensis = Absensi::find(request()->id);
        if (request()->nokartu == $absensis->data_tamus->nokartu) {
            $absensis->data_tamus_id = request()->data_tamus_id;
            $absensis->nokartu = request()->nokartu;
            $absensis->waktu_kepulangan = date('H:i:s');
            $absensis->update();
            // return redirect('bacakartu')->with('status','selamat jalan dan hati hati di jalan');
        } else {
            $absensis->nokartu = request()->nokartu;
            // return redirect('bacakartu')->with('erorr','maaf kartu tidak terdaftar');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function export_excel(){
        return Excel::download(new AbsensiExport,'absensi.xlsx');
    }
}
