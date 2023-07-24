<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class AdminUserController extends Controller
{
    public function index(){
        $data = User::all();
        return view('admin.admin_user.index',compact('data'));
    }   
  
    public function edit($id){
        $data = User::find($id);
        return view('admin.admin_user.edit',compact('data'));
    }
    public function update(Request $request,$id){
        $daftar=[
            'admin' => 'required',
        ];
        $validasi = $request->validate($daftar);       
        User::where('id',$id)
        ->update($validasi);
        return redirect('admin/admin_user')->with('berhasil','Data Berhasil Di Update');
    }  
    
}
