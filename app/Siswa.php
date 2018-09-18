<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'tbsiswa';

    protected $fillable = [
    	'nisn',
    	'nama_siswa',
    	'tgl_lahir',
    	'jk',
        'id_kelas'
    ];

    function getNamaSiswaAttribute($nama_siswa){
    	return ucwords($nama_siswa);
    }

    public function telepon(){
        return $this->hasOne('App\Telepon', 'id_siswa');
    }

    public function kelas(){
        return $this->belongsTo('App\Kelas', 'id_kelas');
    }
}
