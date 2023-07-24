<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;
use Illuminate\Support\Facades\Storage;

class SizeController extends Controller
{
    public function index()
    {
        $data = Size::all();
        return view('admin.size.index',compact('data'));
    }
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required',
            // 'gambar' => 'required|image'
        ]);
        // $validasi['gambar'] = $request->file('gambar')->store('img-size');
        Size::create($validasi);
        return redirect('admin/size')->with('berhasil', 'Data Telah Berhasil Di Tambahkan');
    }
    public function update(Request $request,$id){
        $daftar=[
            'nama' => 'required',
            // 'gambar' => 'image'
        ];
        $validasi = $request->validate($daftar);
        // if($request->file('gambar')){
        //     if($request->oldImage){
        //         Storage::delete($request->oldImage);
        //     }
        //     $validasi['gambar'] = $request->file('gambar')->store('img-Size');        
        // }
        Size::where('id',$id)
        ->update($validasi);
        return redirect('admin/size')->with('berhasil','Data Berhasil Di Update');
    }
    public function destroy(Size $Size){
        // Storage::delete($Size->gambar);
        Size::destroy($Size->id);
        return redirect('admin/size')->with('berhasil','Data Berhasil Di Hapus');

    }
}
