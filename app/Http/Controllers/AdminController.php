<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Size;
use App\Models\User;
use App\Models\Transaksi;
use DB;
use Illuminate\Support\Facades\File;
class AdminController extends Controller
{
    public function index()
    {
        $totaluser = User::where('admin', 0)->count();
        $totaladmin = User::where('admin', 1)->count();
        $totalProduct = Product::get()->count();
        $totalCategory = Category::get()->count();
        $totalSize = Size::get()->count();
        $totalterjual = Transaksi::get()->count();
        return view('admin.dashboard.index',compact('totalProduct','totalCategory','totalSize','totaluser','totaladmin','totalterjual'));
    }

    public function transaksi()
    {
    
        $data = Transaksi::select('foto_transaksi','user_id','total','created_at','proses')
        ->distinct()
        ->get();
    
        // dd($data);
        return view('admin.transaksi.index',compact('data'));
    }
    public function transaksidetail($created_at)
    {
        $data = Transaksi::where('created_at', $created_at)->get();
        // dd($data);
        if ($data) {
            // Jika transaksi ditemukan, lakukan sesuatu (misalnya tampilkan dalam view)
            return view('admin.transaksi.detail', compact('data'));
        } else {
            // Jika transaksi tidak ditemukan, tampilkan pesan error atau redirect ke halaman lain
            return redirect()->back()->with('error', 'Transaksi tidak ditemukan.');
        }

    }

    public function KonfirmasiTransaksi($created_at)
    {
        $data = Transaksi::where('created_at', $created_at)->get();
        $kode = Transaksi::where('created_at', $created_at)->first();

        // dd($data);
      
            // Jika transaksi ditemukan, lakukan sesuatu (misalnya tampilkan dalam view)
            return view('admin.transaksi.konfirmasi-transaksi', compact('data','kode'));
       
    }

    public function Prosestransaksidetail(Request $request, $created_at)
    {
        $rules=[
            'proses'=>'required|max:255',
           
        ];

        $validatedData = $request->validate($rules);
        
    
        Transaksi::Where('created_at',$created_at)
        ->update($validatedData);
        
        return redirect('admin/transaksi')->with('berhasil','Data Berhasil Di Update');
    }
    
    public function transaksiSearch(Request $request){
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');


        $data = transaksi::select('foto_transaksi','user_id','total','created_at','proses')
                            ->distinct()
                            ->where('created_at', '>=', $fromDate)
                            ->where('created_at', '<=', $toDate)                          
                            ->get();
        return view('admin.transaksi.index',compact('data'));
    }
    public function Formtransaksidetailcetak()
    {
        return view('admin.transaksi.FormCetak');
    }
    public function TransaksiCetakSemuaData()
    {
        $data = Transaksi::select('foto_transaksi','user_id','total','created_at')
        ->distinct()
        ->get();
        // dd($data);
        return view('admin.transaksi.cetak-semua-data',compact('data'));
    }
    public function TransaksiCetakaDataPerTanggal(Request $request)
    {
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');


        $data = transaksi::select('foto_transaksi','user_id','total','created_at')
                            ->distinct()
                            ->where('created_at', '>=', $fromDate)
                            ->where('created_at', '<=', $toDate)                          
                            ->get();
        return view('admin.transaksi.cetak-semua-data',compact('data'));

    }
   
   

    public function changeProfilePicture(Request $request){
        $user = User::find(auth('web')->id());
        $path = 'fotoprofil/img/';
        $file = $request->file('file');
        $old_picture = $user->getAttributes()['picture'];
        $file_path = $path.$old_picture;
        $new_picture_name = 'AIMG'.$user->id.time().rand(1,100000).'.jpg';

        if ($old_picture != null && File::exists(public_path($file_path))){
            File::delete(public_path($file_path));
        }
        $upload = $file->move(public_path($path), $new_picture_name);
        if($upload){
            $user->update([
                'picture'=>$new_picture_name
            ]);
            return response()->json(['status'=>1, 'msg'=>'Foto Profil Berhasil Di Update!']);
        }else{
            return response()->json(['status'=>0,'Foto Profil Gagal Diperbarui!']);
        }
    }
}
