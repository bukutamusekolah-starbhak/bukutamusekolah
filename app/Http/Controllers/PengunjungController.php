<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tamu;
use App\Models\Ruangan;

class PengunjungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tamus = Tamu::with('ruangans')->paginate();
        return view('tamu.index',compact('tamus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ruangans = Ruangan::all();
        return view('tamu.create',compact('ruangans'));
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
            'nama_tamu' => 'required',
            'keperluan' => 'required',
            'ruangans_id' => 'required'
        ]);
        Tamu::create($request->all());
        return redirect('tamu')->with('status','berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ruangans = Ruangan::all();
        $tamus = Tamu::with('ruangans')->find($id);
        return view('tamu.edit',compact('tamus','ruangans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_tamu' => 'required',
            'keperluan' => 'required',
            'ruangans_id' => 'required'
        ]);

        $tamu = Tamu::find($id);
        $tamu->nama_tamu = $request->nama_tamu;
        $tamu->keperluan = $request->keperluan;
        $tamu->ruangans_id = $request->ruangans_id;
        $tamu->save();
        return redirect('tamu')->with('status','berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $tamus = Tamu::find($id);
    $tamus->delete();
    return redirect('/tamu')->with('status','berhasil');
    }
}
