<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::all();
        return view('admin.category.index',compact('data'));
    }
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required',
            'gambar' => 'required|image'
        ]);
        $validasi['gambar'] = $request->file('gambar')->store('img-category');
        Category::create($validasi);
        return redirect('admin/category')->with('berhasil', 'Data Telah Berhasil Di Tambahkan');
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
            $validasi['gambar'] = $request->file('gambar')->store('img-category');        
        }
        Category::where('id',$id)
        ->update($validasi);
        return redirect('admin/category')->with('berhasil','Data Berhasil Di Update');
    }
    public function destroy(category $category){
        Storage::delete($category->gambar);
        Category::destroy($category->id);
        return redirect('admin/category')->with('berhasil','Data Berhasil Di Hapus');

    }
}
