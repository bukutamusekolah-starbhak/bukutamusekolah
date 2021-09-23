<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Models\Tamu;

class Ruangan extends Model
{
    use HasFactory;

    protected $fillable = ['id','nama_ruangan'];

    // protected $table = 'ruangans';

    // protected $fillable = ['id','nama_ruangan'];

    public function tamus(){
        return $this->hasMany(Tamu::class);
    }
    public function absensis(){
        return $this->hasMany(Absensi::class);
    }
}
