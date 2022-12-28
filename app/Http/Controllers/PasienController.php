<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index(){
        $pasiens = Pasien::get();
        return view('pasien.index', ['pasiens'=>$pasiens]);
    }

    public function create(){
        return view('pasien.create');
    }

    public function store(Request $request){
        $validatepasien = $request->validate([
            'nik'=>'required|numeric',
            'nama'=>'required|min:3',
            'jenis_kelamin'=>'required',
            'alamat'=>'required|min:10'
        ]);
        $biaya = $request->validate([
            'biaya_obat'=>'required|numeric',
            'biaya_konsultasi'=>'required|numeric',
            'biaya_administrasi'=>'required|numeric',
            'biaya_lain'=>'required|numeric'
        ]);

        $pasien = Pasien::create($validatepasien);
        $pasien -> tagihan()->create($biaya);
        return redirect()->route('pasien.index')->with('message', "Data pasien {$validatepasien['nama']} berhasil ditambahkan");
    }

    public function destroy(Pasien $pasien){
        $pasien->tagihan()->delete($pasien->id);
        $pasien->delete($pasien->id);
        return redirect()->route('pasien.index')->with('message', "Data pasien $pasien->nama berhasil dihapus");
    }

    public function edit(Pasien $pasien){
        return view('pasien.edit', ['pasien'=>$pasien]);
    }

    public function update(Request $request, Pasien $pasien){
        $validatepasien = $request->validate([
            'nik'=>'required|numeric',
            'nama'=>'required|min:3',
            'jenis_kelamin'=>'required',
            'alamat'=>'required|min:10'
        ]);

        $biaya = $request->validate([
            'biaya_obat'=>'required|numeric',
            'biaya_konsultasi'=>'required|numeric',
            'biaya_administrasi'=>'required|numeric',
            'biaya_lain'=>'required|numeric'
        ]);

        $pasien1 = Pasien::find($pasien->id);
        $pasien1->update($validatepasien);
        $pasien1->tagihan()->update($biaya);

        return redirect()->route('pasien.index')->with('message', "Data pasien $pasien->nama berhasil diubah");
    }
}
