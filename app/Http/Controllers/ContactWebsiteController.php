<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactWebsite;
use Illuminate\Support\Facades\Storage;

class ContactWebsiteController extends Controller
{
    public function index()
    {
        $data = ContactWebsite::all();
        return view('admin.contact_website.index',compact('data'));
    }
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'alamat' => 'required',
            'no_telp1' => 'required',
            'no_telp2' => 'max:20',
            'email' => 'required',
        ]);
        ContactWebsite::create($validasi);
        return redirect('admin/contact_website')->with('berhasil', 'Data Telah Berhasil Di Tambahkan');
    }
    public function update(Request $request,$id)
    {
        $daftar=[
            'alamat' => 'required',
            'no_telp1' => 'required',
            'no_telp2' => 'max:20',
            'email' => 'required',
        ];
        $validasi = $request->validate($daftar);      
        contactwebsite::where('id',$id)
        ->update($validasi);
        return redirect('admin/contact_website')->with('berhasil','Data Berhasil Di Update');
    }

    public function destroy(contactWebsite $contactWebsite)
    {
        contactwebsite::destroy($contactWebsite->id);
        return redirect('admin/contact_website')->with('berhasil','Data Berhasil Di Hapus');
    }
}
