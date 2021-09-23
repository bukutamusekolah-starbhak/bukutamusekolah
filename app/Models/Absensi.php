<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function data_tamus(){
        return $this->belongsTo(DataTamu::class);
    }
    public function ruangans(){
        return $this->belongsTo(Ruangan::class);
    }
}
