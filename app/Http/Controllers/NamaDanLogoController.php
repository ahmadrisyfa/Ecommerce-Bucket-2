<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NamaDanLogo;
use Illuminate\Support\Facades\Storage;

class NamaDanLogoController extends Controller
{
    public function index()
    {
        $data = NamaDanLogo::all();
        return view('admin.nama_dan_logo.index',compact('data'));
    }
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required',
            'gambar' => 'required|image'
        ]);
        $validasi['gambar'] = $request->file('gambar')->store('img-NamaDanLogo');
        NamaDanLogo::create($validasi);
        return redirect('admin/nama_dan_logo')->with('berhasil', 'Data Telah Berhasil Di Tambahkan');
    }
    public function update(Request $request,$id){
        $daftar=[
            'nama' => 'required',
            'gambar' => 'image'
        ];
        $validasi = $request->validate($daftar);
        if($request->file('gambar')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validasi['gambar'] = $request->file('gambar')->store('img-NamaDanLogo');        
        }
        NamaDanLogo::where('id',$id)
        ->update($validasi);
        return redirect('admin/nama_dan_logo')->with('berhasil','Data Berhasil Di Update');
    }
    public function destroy(NamaDanLogo $NamaDanLogo){
        Storage::delete($NamaDanLogo->gambar);
        NamaDanLogo::destroy($NamaDanLogo->id);
        return redirect('admin/nama_dan_logo')->with('berhasil','Data Berhasil Di Hapus');

    }
}
