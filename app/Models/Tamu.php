<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ruangan;

class Tamu extends Model
{
    use HasFactory;

    // protected $table = 'tamus';
    // //protected $primaryKey = 'tujuan_ruangan';
    protected $fillable = ['id','nama_tamu','keperluan','ruangans_id'];

    public function ruangans(){
        return $this->belongsTo(Ruangan::class);
    }
}
