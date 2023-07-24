<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Support;
use Illuminate\Support\Facades\Storage;
class SupportController extends Controller
{
    public function index()
    {
        $data = Support::all();
        return view('admin.support.index',compact('data'));
    }
    public function store(Request $request)
    {
        $deskripsi = nl2br($request->input('deskripsi'));
        $data = New Support();
        $data->judul = $request->judul;
        $data->deskripsi = $deskripsi;
        $data->save();
        return redirect('admin/support')->with('berhasil', 'Data Telah Berhasil Di Tambahkan');
    }
    public function update(Request $request,$id)
    {
        $deskripsi = nl2br($request->input('deskripsi'));
        $data = Support::find($id);
        $data->judul = $request->judul;
        $data->deskripsi = $deskripsi;
        $data->save();       
        return redirect('admin/support')->with('berhasil','Data Berhasil Di Update');
    }
    public function destroy(Support $Support){
        Support::destroy($Support->id);
        return redirect('admin/support')->with('berhasil','Data Berhasil Di Hapus');

    }
}
