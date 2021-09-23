<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataTamu;
// use App\Models\Tmprifd;

class Data_tamusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_tamus = DataTamu::all();
        return view('data_tamus.index',compact('data_tamus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $tmprifds = Tmprifd::latest()->paginate(1);
        return view('data_tamus.create');
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
            'nokartu' => 'required|numeric|min:10',
            'nama' => 'required'
        ]);
        DataTamu::create($request->all());
        return redirect('data_tamus')->with('status','data berhasil terkirim');
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
        $data_tamus = DataTamu::find($id);
        return view('data_tamus.edit',compact('data_tamus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'nokartu' => 'required',
            'nama' => 'required',
        ]);
        $data_tamus = DataTamu::find($id);
        $data_tamus->nokartu = $request->nokartu;
        $data_tamus->nama = $request->nama;
        $data_tamus->save();
        return redirect('data_tamus')->with('status','data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DataTamu::destroy($id);
        return redirect('data_tamus')->with('status','data berhasil terhapus');
    }
}