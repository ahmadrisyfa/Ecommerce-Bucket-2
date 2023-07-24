<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $data = Slider::all();
        return view('admin.slider.index',compact('data'));
    }
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image'
        ]);
        $validasi['gambar'] = $request->file('gambar')->store('img-slider');
        Slider::create($validasi);
        return redirect('admin/slider')->with('berhasil', 'Data Telah Berhasil Di Tambahkan');
    }
    public function update(Request $request,$id){
        $daftar=[
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image'
        ];
        $validasi = $request->validate($daftar);
        if($request->file('gambar')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validasi['gambar'] = $request->file('gambar')->store('img-slider');        
        }
        Slider::where('id',$id)
        ->update($validasi);
        return redirect('admin/slider')->with('berhasil','Data Berhasil Di Update');
    }
    public function destroy(slider $slider){
        Storage::delete($slider->gambar);
        Slider::destroy($slider->id);
        return redirect('admin/slider')->with('berhasil','Data Berhasil Di Hapus');

    }
}
