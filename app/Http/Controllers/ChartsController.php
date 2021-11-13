<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use Illuminate\Support\Facades\DB;

class ChartsController extends Controller
{
    public function charts()
    {
        $absensis = Absensi::select(DB::raw("COUNT(*) as count"))
        ->whereYear('created_at',date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');
        $months = Absensi::select(DB::raw("Month(created_at) as month"))
        ->whereYear('created_at',date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('month');

        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach ($months as $key => $month) {
            $datas[$month] = $absensis[$key];
        }
        return view('charts',compact('datas'));
    }
}
