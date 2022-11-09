<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nisn extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'id_siswa',
        'nisn',
     ];


     public function siswa() {
        return $this->belongsTo(Siswa::class);
        
    }
}
