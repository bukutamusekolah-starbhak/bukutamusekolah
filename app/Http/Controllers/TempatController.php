<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;

class TempatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $ruangans = Ruangan::all();
        // return view('ruangan.index',compact('ruangans'));
        return Ruangan::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('ruangan.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ruangans = new Ruangan;
        $ruangans->nama_ruangan = $request->nama_ruangan;
        $ruangans->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ruangans = Ruangan::find($id);
        if ($ruangans) {
            return response()->json([
                "success" => true,
                "message" => "data ada",
                'data' => $ruangans
            ],200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Tamu Tidak Ditemukan!',
                'data'    => ''
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $ruangans = Ruangan::find($id);
    //     return response()->json([
    //         'ruangans' => $ruangans
    //     ],200);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ruangans = Ruangan::find($id);
        $ruangans->nama_ruangan = $request->nama_ruangan;
        $ruangans->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ruangans = Ruangan::find($id);
        $ruangans->delete();
        if ($ruangans) {
            return response()->json([
                'success' => true,
                'message' => 'ruangans Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'ruangans Gagal Dihapus!',
            ], 500);
        }
    }
}
?>