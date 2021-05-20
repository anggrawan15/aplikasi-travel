<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wisata;
use App\Resto;
use App\Hotel;
use App\Paket;
use App\HotelItem;
use App\RestoItem;
use App\WisataItem;
use Cookie;
use Illuminate\Support\Str;
use DB;
use Illuminate\Support\Arr;

class PaketController extends Controller
{
    //
    private function getCartsW()
    {
        //ambil data cart dari cookie,
        //karena bentuknya json maka kita gunakan json_decode untuk mengubahnya menjadi array
        $cartsw = json_decode(request()->cookie('paket-wisata'), true);
        //jika data tidak sama dengan kosong '' simpan sebagai variable
        //jika kosong berikan array atau $carts:[]
        $cartsw = $cartsw != '' ? $cartsw:[];
        return $cartsw;
    }

    private function getCartsH()
    {
        //ambil data cart dari cookie,
        //karena bentuknya json maka kita gunakan json_decode untuk mengubahnya menjadi array
        $cartsh = json_decode(request()->cookie('paket-hotel'), true);
        //jika data tidak sama dengan kosong '' simpan sebagai variable
        //jika kosong berikan array atau $carts:[]
        $cartsh = $cartsh != '' ? $cartsh:[];
        return $cartsh;
    }

    private function getCartsR()
    {
        //ambil data cart dari cookie,
        //karena bentuknya json maka kita gunakan json_decode untuk mengubahnya menjadi array
        $cartsr = json_decode(request()->cookie('paket-resto'), true);
        //jika data tidak sama dengan kosong '' simpan sebagai variable
        //jika kosong berikan array atau $carts:[]
        $cartsr = $cartsr != '' ? $cartsr:[];
        return $cartsr;
    }

    public function index(){

        $paket = Paket::orderBy('created_at','DESC')->paginate(10);

        return view('pakets.admin.index', compact('paket'));
    }

    public function create(){

        $wisata = Wisata::orderBy('nama','ASC')->get();
        $resto = Resto::orderBy('nama','ASC')->get();
        $hotel = Hotel::orderBy('nama','ASC')->get();

        return view('pakets.admin.buat-paket', compact('wisata', 'resto', 'hotel'));
    }

    // untuk add Wisata di Cookie
    public function addToWisata(Request $request){

        $this->validate($request, [
            'wisata_id' => 'required|exists:wisatas,id',//pastikan wisata_id nya ada di DB
            'jumlah' => 'required|integer'
        ]);

        $cartsw = $this->getCartsW();

        if ($cartsw && array_key_exists($request->wisata_id, $cartsw)) {
            $cartsw[$request->wisata_id]['jumlah'] += $request->jumlah;

        }else{

            $wisata = Wisata::find($request->wisata_id);
            

            $cartsw[$request->wisata_id]=[
                'jumlah' => $request->jumlah,
                'wisata_id' => $wisata->id,
                'wisata_nama' => $wisata->nama,
                'wisata_gambar' => $wisata->gambar

            ];

        }

        $cookie = cookie('paket-wisata', json_encode($cartsw), 2880);
        return redirect()->back()->with(['success' => 'Wisata Di Tambahkan ke Paket'])->cookie($cookie);
    }

    // untuk Add Hotel Di Cookie
    public function addToHotel(Request $request){

        $this->validate($request, [
            'hotel_id' => 'required|exists:hotels,id',//pastikan wisata_id nya ada di DB
            'jumlah' => 'required|integer'
        ]);

        $cartsh = $this->getCartsH();

        if($cartsh && array_key_exists($request->hotel_id, $cartsh)){

            $cartsh[$request->hotel_id]['jumlah'] += $request->jumlah;

        }else{

            $hotel = Hotel::find($request->hotel_id);
        
            $cartsh[$request->hotel_id]=[
                'jumlah' => $request->jumlah,
                'hotel_id' => $hotel->id,
                'hotel_nama' => $hotel->nama,
                'hotel_gambar' => $hotel->gambar

            ];

        }

        $cookie = cookie('paket-hotel', json_encode($cartsh), 2880);
        return redirect()->back()->with(['success' => 'Hotel Di Tambahkan ke Paket'])->cookie($cookie);
    }

    public function addToResto(Request $request){

        $this->validate($request, [
            'resto_id' => 'required|exists:restos,id',//pastikan wisata_id nya ada di DB
            'jumlah' => 'required|integer'
        ]);

        $cartsr = $this->getCartsR();

        if($cartsr && array_key_exists($request->resto_id, $cartsr)){

            $cartsr[$request->resto_id]['jumlah'] += $request->jumlah;

        }else{

            $resto = Resto::find($request->resto_id);
        
            $cartsr[$request->resto_id]=[
                'jumlah' => $request->jumlah,
                'resto_id' => $resto->id,
                'resto_nama' => $resto->nama,
                'resto_gambar' => $resto->gambar

            ];

        }

        $cookie = cookie('paket-resto', json_encode($cartsr), 2880);
        return redirect()->back()->with(['success' => 'Resto Di Tambahkan ke Paket'])->cookie($cookie);
    }



    public function listCart(){

        $cartsw = $this->getCartsW();
        $cartsh = $this->getCartsH();
        $cartsr = $this->getCartsR();

        return view('pakets.admin.cart-paket', compact('cartsw','cartsh','cartsr'));
        // dd($cartsw,$cartsh,$cartsr);
        
    }



    public function hapusWisata($wisata_id){

        $cartsw = $this->getCartsW();

        unset($cartsw[$wisata_id]);

         // set kembali cookie-nya seperti sebelumnya
        $cookie = cookie('paket-wisata', json_encode($cartsw), 2880);
         // dan store ke browser
        return redirect()->back()->cookie($cookie)->with(['success' => 'Wisata Berhasil Di hapus']);

    }

    public function hapusHotel($hotel_id){

        $cartsh = $this->getCartsH();

        unset($cartsh[$hotel_id]);

         // set kembali cookie-nya seperti sebelumnya
        $cookie = cookie('paket-hotel', json_encode($cartsh), 2880);
         // dan store ke browser
        return redirect()->back()->cookie($cookie)->with(['success' => 'Hotel Berhasil Di hapus']);

    }

    public function hapusResto($resto_id){

        $cartsr = $this->getCartsR();

        unset($cartsr[$resto_id]);

         // set kembali cookie-nya seperti sebelumnya
        $cookie = cookie('paket-resto', json_encode($cartsr), 2880);
         // dan store ke browser
        return redirect()->back()->cookie($cookie)->with(['success' => 'Resto Berhasil Di hapus']);

    }

    // private function endWisata(){
        
    //     $cartsw:[] = $cartsw == '';

    //     $cookie = cookie('paket-wisata',json_encode($cartsw),2880);

    //     return cookie($cookie);

    // }

    public function simpanPaket(Request $request){
        $this->validate($request, [
            
            'nama' => 'required|string|max:100',
            'max' => 'required|integer',
            'min' => 'required|integer',
            'harga' => 'required|integer',
            'gambar' => 'required|image|mimes:png,jpeg,jpg'
        ]);

        DB::beginTransaction();

        try{

            $cartsw = $this->getCartsW();
            $cartsh = $this->getCartsH();
            $cartsr = $this->getCartsR();

            if($request->min > $request->max){

                DB::rollback();
                //DAN KEMBALI KE FORM TRANSAKSI SERTA MENAMPILKAN ERROR
                // atau folder ecommerce/checkout.blade.php
                return redirect()->back()->with(['error' => 'minimal lebih besar dari maximal']);

            }

            if ($request->hasFile('gambar')) {
                // buat variable $file untuk menyimpan sementara file image
                //MAKA KITA SIMPAN SEMENTARA FILE TERSEBUT KEDALAM VARIABLE FILE
                $file = $request->file('gambar');
                //kemudian buat Variable $filename 
                // kemudian rubah namanya dengan waktu . Str::slug($request->name) nama
                $filename = time() . Str::slug($request->nama) . '.' . $file->getClientOriginalExtension();
                //SIMPAN FILENYA KEDALAM FOLDER PUBLIC/PRODUCTS, DAN PARAMETER KEDUA ADALAH NAMA CUSTOM UNTUK FILE TERSEBUT
                $file->storeAs('public/pakets', $filename);

                $paket = Paket::create([
                    'code' => time() . '-' . Str::random(4),
                    'nama' => $request->nama,
                    'min' => $request->min,
                    'max' => $request->max,
                    'harga' => $request->harga,
                    'gambar' => $filename
                ]);

            }

            foreach($cartsw as $roww){

                $wisata = Wisata::find($roww['wisata_id']);

                WisataItem::create([
                    'paket_id' => $paket->id,
                    'wisata_id' => $roww['wisata_id'],
                    'jumlah' => $roww['jumlah']
                ]);

            }

            foreach($cartsh as $rowh){

                $hotel = Hotel::find($rowh['hotel_id']);

                HotelItem::create([
                    'paket_id' => $paket->id,
                    'hotel_id' => $rowh['hotel_id'],
                    'jumlah' => $rowh['jumlah']
                ]);
            }

            foreach($cartsr as $rowr){

                $resto = Resto::find($rowr['resto_id']);

                RestoItem::create([
                    'paket_id' => $paket->id,
                    'resto_id' => $rowr['resto_id'],
                    'jumlah' => $rowr['jumlah']
                ]);
            }
            

            DB::commit();

        

        $cartsw = [];
        $cookiew = cookie('paket-wisata', json_encode($cartsw),2880);
        

        $cartsh = [];
        $cookieh = cookie('paket-hotel', json_encode($cartsh),2880);
        
        $cartsr = [];
        $cookier = cookie('paket-resto', json_encode($cartsr),2880);
       
        
        return redirect()->back()
        ->withCookie($cookieh)
        ->withCookie($cookiew)
        ->withCookie($cookier)->with(['success' => 'Paket Sukses Di Buat']);
            


        }catch (\Exception $e) {

             //JIKA TERJADI ERROR, MAKA ROLLBACK DATANYA
            DB::rollback();
             //DAN KEMBALI KE FORM TRANSAKSI SERTA MENAMPILKAN ERROR
             // atau folder ecommerce/checkout.blade.php
            return redirect()->back()->with(['error' => $e->getMessage()]);

        }


    }

     //untuk Customer
     public function paket(){
        $pakets = Paket::orderBy('created_at', 'DESC')->paginate(3);
        return view('pakets.index', compact('pakets'));
    }

    public function detail($id){
        $paketd = Paket::with(['wisataItem.wisata','hotelItem.hotel','restoItem.resto'])->find($id);
        return view('pakets.show', compact('paketd'));
    }

    



}
