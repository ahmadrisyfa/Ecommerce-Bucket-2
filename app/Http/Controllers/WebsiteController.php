<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Size;
use App\Models\Cart;
use App\Models\CustomLembar;
use App\Models\Support;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class WebsiteController extends Controller
{
    public function index() 
    {
        $dataproductcategory = DB::table('product')
        ->leftJoin('transaksi', 'product.id', '=', 'transaksi.product_id')
        ->select('product.id', 'product.nama', 'product.gambar1', 'product.deskripsi','product.harga','product.category_id', DB::raw('COUNT(transaksi.product_id) as total_calls'))
        ->groupBy('product.id', 'product.nama', 'product.gambar1', 'product.deskripsi','product.harga','product.category_id')
        ->orderBy('total_calls', 'desc')
        ->take(3)
        ->get();
        $dataproductsize = DB::table('product')
        ->leftJoin('transaksi', 'product.id', '=', 'transaksi.product_id')
        ->select('product.id', 'product.nama', 'product.gambar1', 'product.deskripsi','product.harga','product.size_id', DB::raw('COUNT(transaksi.product_id) as total_calls'))
        ->groupBy('product.id', 'product.nama', 'product.gambar1', 'product.deskripsi','product.harga','product.size_id')
        ->orderBy('total_calls', 'desc')
        ->take(3)
        ->get();
        $category =  DB::table('category')->take(6)->latest()->get();
        $dataslider = Slider::all();
        return view('website.index',compact('dataslider','dataproductcategory','category','dataproductsize'));
    }
    public function categorydetail($id)
    {
        $product = Product::where('category_id', $id)->get();

       return view('website.category-detail',compact('product'));
    }
    public function sizedetail($id)
    {
        $product = Product::where('size_id', $id)->get();

       return view('website.size-detail',compact('product'));
    }
    public function productdetail($id)
    {
        $productRandom = Product::inRandomOrder()->whereNotIn('id', [$id])->take(3)->get();     
        $data = Product::find($id);
        return view('website.product-detail',compact('data','productRandom'));
    }
    public function supportdetail($id)
    {
        $data = Support::find($id);
        return view('website.support-detail',compact('data'));
    }
    public function cart()
    {
        $hitungdata = Cart::where('user_id', auth()->user()->id)->count();
        $data = cart::where('user_id',auth()->user()->id)->get();
        return view('website.cart',compact('data','hitungdata'));
    }
    public function addtocart(Request $request)
    {
        $data = new Cart;
        $data->product_id = $request->product_id;
        $data->user_id = auth()->user()->id;
        $data->quantity = $request->quantity;
        // $data->size_id = $request->size_id;
        // $data->custom_lembar_id = $request->custom_lembar_id;
        $data->total = $request->total;        
        $data->kartu_ucapan = $request->kartu_ucapan;
        $data->warna = $request->warna;
        
        $data->save();
        return redirect()->back()->with('berhasil', 'Data Telah Berhasil Di Tambahkan Ke Keranjang');
    }
    public function deletetocart($id)
    {
        $data = Cart::find($id);
        $data->delete();
        return redirect()->back()->with('berhasil','Data Berhasil Di Hapus');
    }
    // public function getHargasize($sizeId)
    // {
    //     $size = Size::find($sizeId);
    //     return response()->json(['harga' => $size->harga]);
    // }

    // public function getHargacustomLembar($custom_lembar_id)
    // {
    //     $customLembar = CustomLembar::find($id);
    
    //     return response()->json(['harga' => $customLembar->harga]);
    // }

    public function checkout()
    {
        $data = Cart::where('user_id', auth::user()->id)->get();

        return view('website.checkout',compact('data'));
    }
    public function CheckoutData(Request $request)
    {
       

        $dataCart = Cart::where('user_id', auth()->user()->id)->get();
        $fototransaksi = $request->file('foto_transaksi');
        
        foreach ($dataCart as $cart) {
            foreach ($fototransaksi as $foto) {                         
              $fototransaksiPath = $foto->store('img-foto-transaksi');
        
            Transaksi::create([
                'product_id' => $cart['product_id'],
                'user_id' => auth()->user()->id,
                'total' => $request->input('total'),
                'quantity' => $cart['quantity'],
                'warna' => $cart['warna'],
                'kartu_ucapan' => $cart['kartu_ucapan'],
                'foto_transaksi' => $fototransaksiPath,
                'catatan' => $request->input('catatan'),                
            ]);
                    }
                        }           
            
            // Hapus data cart yang sudah dimasukkan ke transaksi
            Cart::where('user_id', auth()->user()->id)->delete();

            // Perbarui data di table_name_2
            DB::connection('mysql')->table('users')
                ->where('id', auth()->user()->id)
                ->update([
                    'name' => $request->input('name'),
                    'no_telepon' => $request->input('no_telepon'),
                    'alamat' => $request->input('alamat'),
                ]);
              
                $user = auth()->user(); 
                $checkout = Transaksi::where('user_id', auth()->user()->id)->select('foto_transaksi','total','created_at','proses','product_id')
                ->distinct()
                ->latest()                                
                ->first();
                
                $data = [
                    'user' => $user,
                    'checkout' => $checkout,
                ];
                
                Mail::send('emails', $data, function ($message) use ($user) {
                    $message->to($user->email);
                    $message->subject('Rincian Pembelian');
                });
                
            return redirect('terimakasih');
    }
     public function terimakasih()    
     {
        return view('website.terimakasih');
     }

     public function RiwayatTransaksi()
        {
            
        $data = Transaksi::where('user_id', auth()->user()->id)->select('foto_transaksi','total','created_at','proses')
        ->distinct()
        ->get();
        // dd($data);
        return view('website.riwayat-transaksi',compact('data'));
        }               

        public function RiwayatTransaksiDetail($created_at)
        {
            $data = Transaksi::where('created_at', $created_at)->get();
            // dd($data);
            if ($data) {
                // Jika transaksi ditemukan, lakukan sesuatu (misalnya tampilkan dalam view)
                return view('website.riwayat-transaksi-detail', compact('data'));
            } else {
                // Jika transaksi tidak ditemukan, tampilkan pesan error atau redirect ke halaman lain
                return redirect()->back()->with('error', 'Transaksi tidak ditemukan.');
            }
        }
}
