<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use Illuminate\Support\Str;
use File;

class HotelController extends Controller
{
    //

    public function index(){

        $hotel = Hotel::orderBy('created_at','DESC');

        if (request()->q != '') {
            //MAKA LAKUKAN FILTERING DATA BERDASARKAN NAME DAN VALUENYA SESUAI DENGAN PENCARIAN YANG DILAKUKAN USER
            $hotel = $hotel->where('name', 'LIKE', '%' . request()->q . '%');
        }

        $hotel = $hotel->paginate(10);

        return view('hotels.admin.index', compact('hotel'));
    }

    public function show($id){

        $hotel = Hotel::find($id);
        return view('hotels.admin.show', compact('hotel'));
    }

    public function create(){

        return view('hotels.admin.tambah');

    }

    public function store(Request $request){

        $this->validate($request, [
            'nama' => 'required|string|max:50',
            'lokasi' => 'required|string|max:100',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:png,jpeg,jpg' //GAMBAR DIVALIDASI HARUS BERTIPE PNG,JPG DAN JPEG
        ]);

        if ($request->hasFile('gambar')) {
            // buat variable $file untuk menyimpan sementara file image
            //MAKA KITA SIMPAN SEMENTARA FILE TERSEBUT KEDALAM VARIABLE FILE
            $file = $request->file('gambar');
            //kemudian buat Variable $filename 
            // kemudian rubah namanya dengan waktu . Str::slug($request->name) nama
            $filename = time() . Str::slug($request->nama) . '.' . $file->getClientOriginalExtension();
            //SIMPAN FILENYA KEDALAM FOLDER PUBLIC/PRODUCTS, DAN PARAMETER KEDUA ADALAH NAMA CUSTOM UNTUK FILE TERSEBUT
            $file->storeAs('public/hotels', $filename);

            $hotel = Hotel::create([
                'nama' => $request->nama,
                'lokasi' => $request->lokasi,
                'deskripsi' => $request->deskripsi,
                'gambar' => $filename
            ]);

            return redirect(route('hotel.index'))->with(['success' => 'Data Hotel Baru Ditambahkan']);
            // dd($hotel);
        }
    }

    public function edit($id){

        $hotel = Hotel::find($id);
        return view('hotels.admin.edit', compact('hotel'));
    }

    public function update(Request $request, $id){

        $this->validate($request, [
            'nama' => 'required|string|max:100',
            'lokasi' => 'required|string|max:200',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:png,jpeg,jpg' //GAMBAR DIVALIDASI HARUS BERTIPE PNG,JPG DAN JPEG
        ]);

        $hotel = Hotel::find($id); //AMBIL DATA PRODUK YANG AKAN DIEDIT BERDASARKAN ID
        $filename = $hotel->gambar; //SIMPAN SEMENTARA NAMA FILE IMAGE SAAT INI

        if ($request->hasFile('gambar')) {
            // buat variable $file untuk menyimpan sementara file image
            //MAKA KITA SIMPAN SEMENTARA FILE TERSEBUT KEDALAM VARIABLE FILE
            $file = $request->file('gambar');
            //kemudian buat Variable $filename 
            // kemudian rubah namanya dengan waktu . Str::slug($request->name) nama
            $filename = time() . Str::slug($request->nama) . '.' . $file->getClientOriginalExtension();
            //SIMPAN FILENYA KEDALAM FOLDER PUBLIC/PRODUCTS, DAN PARAMETER KEDUA ADALAH NAMA CUSTOM UNTUK FILE TERSEBUT
            $file->storeAs('public/hotels', $filename);

            File::delete(storage_path('app/public/hotels/' . $hotel->gambar));
        
        }

        $hotel->update([
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'gambar' => $filename
        ]);

        return redirect(route('hotel.index'))->with(['success' => 'Data hotel Berhasil Diubah!']);


    }

    public function destroy($id){

        $hotel = Hotel::find($id); //QUERY UNTUK MENGAMBIL DATA PRODUK BERDASARKAN ID

        //HAPUS FILE IMAGE DARI STORAGE PATH DIIKUTI DENGNA NAMA IMAGE YANG DIAMBIL DARI DATABASE
        // File adalah suatu model yang digunakan untuk menghapus data dari folder lokasinya
        // pada folder resouces yaitu app/public/products/namaProduk
        File::delete(storage_path('app/public/hotels/' . $hotel->gambar));

        //KEMUDIAN HAPUS DATA PRODUK DARI DATABASE
        $hotel->delete();

        //kembali ke folder products/index.blade.php
        // mengunakan route product.index
        return redirect(route('hotel.index'))->with(['success' => 'Data Hotel Sudah Dihapus']);
    }

     //untuk Customer
     public function hotel(){
        $hotels = Hotel::orderBy('created_at', 'DESC')->paginate(3);
        return view('hotels.index', compact('hotels'));
    }

    public function detail($id){
        $hoteld = Hotel::find($id);
        return view('hotels.show', compact('hoteld'));
    }





}
