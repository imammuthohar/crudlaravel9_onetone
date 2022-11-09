<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'nama',
         'nis',
         'tempatlahir',
         'tanggallahir',
         'alamat',
         'jeniskelamin',
         'agama',
         'email',
         'hobi',
         'warna',
     ];
     
public function relasinisn (){	
return $this->hasOne(Nisn::class,'id_siswa');
// return $this->hasOne('App\Nisn', 'id_siswa'); 
    }

}
