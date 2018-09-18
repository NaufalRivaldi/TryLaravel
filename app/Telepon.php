<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telepon extends Model
{
    protected $table = 'tbtelepon';

    protected $primaryKey = 'id_siswa';

    protected $fillable = [
    	'id_siswa',
    	'no_telp'
    ];

    public function siswa(){
    	return $this->belongsTo('App\Siswa', 'id_siswa');
    }
}
