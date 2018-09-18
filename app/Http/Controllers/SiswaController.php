<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Siswa;
use App\Telepon;
use App\Kelas;

class SiswaController extends Controller
{
    protected $request;

    public function __construct(Request $req){
    	$this->request = $req;
    }

    public function index(){
    	$siswa_list = Siswa::orderBy('nisn', 'asc')->paginate(2);
    	$jml_siswa = Siswa::count();
    	return view('siswa.index', compact('siswa_list', 'jml_siswa'));
    }

    public function create(){
        $kelas = Kelas::all();
    	return view('siswa.create', compact('kelas'));
    }

    public function show($id){
    	$siswa = Siswa::findOrFail($id);
    	return view('siswa.show', compact('siswa'));
    }

    public function store(Request $request){
    	$input = $request->all();
        $validator = Validator::make($input, [
            'nisn' => 'required|string|size:4|unique:tbsiswa,nisn',
            'nama_siswa' => 'required|string|max:30',
            'tgl_lahir' => 'required|date',
            'jk' => 'required|in:L,P',
            'no_telp' => 'sometimes|numeric|digits_between:10,15',
            'id_kelas' => 'required'
        ]);

        if($validator->fails()){
            return redirect('siswa/create')->withErrors($validator)->withInput();
        }

        $siswa = Siswa::create($input);

        $telepon = new Telepon;
        $telepon->no_telp = $request->input('no_telp');
        $siswa->telepon()->save($telepon);
    	return redirect('/');
    }

    public function edit($id){
    	$siswa = Siswa::findOrFail($id);
        $siswa->no_telp = $siswa->telepon->no_telp;
        $kelas = Kelas::all();
    	return view('siswa.edit', compact('siswa', 'kelas'));
    }

    public function update($id, Request $request){
    	$siswa = Siswa::findOrFail($id);
        $input = $request->all();

        $validator = Validator::make($input, [
            'nama_siswa' => 'required|string|max:30',
            'tgl_lahir' => 'required|date',
            'jk' => 'required|in:L,P',
            'no_telp' => 'sometimes|numeric|digits_between:10,15'
        ]);

        if($validator->fails()){
            return redirect('siswa/'.$id.'/edit')->withInput()->withErrors($validator);
        }

    	$siswa->update($request->all());
        $telepon = $siswa->telepon;
        $telepon->no_telp = $request->input('no_telp');
        $siswa->telepon()->save($telepon);
        return redirect('/');
    }

    public function destroy($id){
    	$siswa = Siswa::findOrFail($id);
    	$siswa->delete();
    	return redirect('/');
    }

    public function tesCollection(){
        $collection = Siswa::select('nisn', 'nama_siswa')->take(3)->get();
        $array = $collection->toArray();

        foreach ($array as $data) {
            echo $data['nisn']." - ".$data['nama_siswa']."<br>";
        }
    }
}
