<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataTamu;
use Illuminate\Support\Facades\Validator;
use Dflydev\DotAccessData\Data;

// use App\Models\Tmprifd;

class Data_tamusController extends Controller
{
    // public function __construct(){
    //     $this->middleware("auth");
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_tamus = DataTamu::latest()->get();
        return response([
            'success' => true,
            'message' => 'mendapatkan semua data tamu',
            'data' => $data_tamus
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     // $tmprifds = Tmprifd::latest()->paginate(1);
    //     return view('data_tamus.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nokartu' => 'required|numeric|min:10',
            'nama' => 'required'
        ],
            [
                'nokartu.required' => 'Masukkan No kartu yang ingin di daftarkan',
                'nama.required' => 'Masukkan nama tamu yang didaftarkan',
            ]
        );
        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],400);
        } else {
            $data_tamus = DataTamu::create([
                'nokartu'     => $request->input('nokartu'),
                'nama'   => $request->input('nama')
            ]);

            if ($data_tamus) {
                return response()->json([
                    'success' => true,
                    'message' => 'Tamu Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Tamu Gagal Disimpan!',
                ], 400);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_tamus = DataTamu::where('id',$id)->first();
        if ($data_tamus) {
            return response()->json([
                "success" => true,
                "message" => "data ada",
                'data' => $data_tamus
            ],200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Tamu Tidak Ditemukan!',
                'data'    => null
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
    //     $data_tamus = DataTamu::find($id);
    //     return view('data_tamus.edit',compact('data_tamus'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'nokartu' => 'required|numeric|min:10',
            'nama' => 'required'
        ],
            [
                'nokartu.required' => 'Masukkan No kartu yang ingin di daftarkan',
                'nama.required' => 'Masukkan nama tamu yang didaftarkan',
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Silahkan di isi yang kosong',
                'data' => $validator->errors()
            ],400);
        } else {
            $data_tamus = DataTamu::whereId($request->input('id'))->update([
                'nokartu' => $request->input('nokartu'),
                'nama'   => $request->input('nama')
            ]);
        }
        if ($data_tamus) {
        return response()->json([
            'success'=>true,
            'message'=>'data berhasil di update'
        ],200);
        } else {
        return response()->json([
            'success'=>true,
            'message'=>'data berhasil di update'
        ],500);
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
    $data_tamus =  DataTamu::findorFail($id);
    $data_tamus->delete();

    if ($data_tamus) {
        return response()->json([
            'success' => true,
            'message' => 'Data Tamu Berhasil Dihapus!',
        ], 200);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Data Tamu Gagal Dihapus!',
        ], 500);
    }
    }
}