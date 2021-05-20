<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wisata;
use Illuminate\Support\Str;
use File;

class WisataController extends Controller
{
    //

    public function index(){

        $wisata = Wisata::orderBy('created_at','DESC');

        if (request()->q != '') {
            //MAKA LAKUKAN FILTERING DATA BERDASARKAN NAME DAN VALUENYA SESUAI DENGAN PENCARIAN YANG DILAKUKAN USER
            $wisata = $wisata->where('nama', 'LIKE', '%' . request()->q . '%');
        }

        $wisata = $wisata->paginate(10);

        return view('wisatas.admin.index', compact('wisata'));
    }

    public function show($id){

        $wisata = Wisata::find($id);
        return view('wisatas.admin.show', compact('wisata'));
    }

    public function create(){

        return view('wisatas.admin.tambah');

    }

    public function store(Request $request){

        $this->validate($request, [
            'nama' => 'required|string|max:100',
            'lokasi' => 'required|string|max:200',
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
            $file->storeAs('public/wisatas', $filename);

            $wisata = Wisata::create([
                'nama' => $request->nama,
                'lokasi' => $request->lokasi,
                'deskripsi' => $request->deskripsi,
                'gambar' => $filename
            ]);

            return redirect(route('wisata.index'))->with(['success' => 'Objek Wisata Baru Ditambahkan']);
        }
    }

    public function edit($id){

        $wisata = Wisata::find($id);
        return view('wisatas.admin.edit', compact('wisata'));
    }

    public function update(Request $request, $id){

        $this->validate($request, [
            'nama' => 'required|string|max:100',
            'lokasi' => 'required|string|max:200',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:png,jpeg,jpg' //GAMBAR DIVALIDASI HARUS BERTIPE PNG,JPG DAN JPEG
        ]);

        $wisata = Wisata::find($id); //AMBIL DATA PRODUK YANG AKAN DIEDIT BERDASARKAN ID
        $filename = $wisata->gambar; //SIMPAN SEMENTARA NAMA FILE IMAGE SAAT INI

        if ($request->hasFile('gambar')) {
            // buat variable $file untuk menyimpan sementara file image
            //MAKA KITA SIMPAN SEMENTARA FILE TERSEBUT KEDALAM VARIABLE FILE
            $file = $request->file('gambar');
            //kemudian buat Variable $filename 
            // kemudian rubah namanya dengan waktu . Str::slug($request->name) nama
            $filename = time() . Str::slug($request->nama) . '.' . $file->getClientOriginalExtension();
            //SIMPAN FILENYA KEDALAM FOLDER PUBLIC/PRODUCTS, DAN PARAMETER KEDUA ADALAH NAMA CUSTOM UNTUK FILE TERSEBUT
            $file->storeAs('public/wisatas', $filename);

            File::delete(storage_path('app/public/wisatas/' . $wisata->gambar));
        
        }

        $wisata->update([
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'gambar' => $filename
        ]);

        return redirect(route('wisata.index'))->with(['success' => 'Objek Wisata Berhasil Diubah!']);


    }

    public function destroy($id){

        $wisata = Wisata::find($id); //QUERY UNTUK MENGAMBIL DATA PRODUK BERDASARKAN ID

        //HAPUS FILE IMAGE DARI STORAGE PATH DIIKUTI DENGNA NAMA IMAGE YANG DIAMBIL DARI DATABASE
        // File adalah suatu model yang digunakan untuk menghapus data dari folder lokasinya
        // pada folder resouces yaitu app/public/products/namaProduk
        File::delete(storage_path('app/public/Wisatas/' . $wisata->gambar));

        //KEMUDIAN HAPUS DATA PRODUK DARI DATABASE
        $wisata->delete();

        //kembali ke folder products/index.blade.php
        // mengunakan route product.index
        return redirect(route('wisata.index'))->with(['success' => 'Wisata Sudah Dihapus']);
    }

    //untuk Customer
    public function wisata(){
        $wisatas = Wisata::orderBy('created_at', 'DESC')->paginate(1);
        return view('wisatas.index', compact('wisatas'));
    }

    public function detail($id){
        $wisatad = Wisata::find($id);
        return view('wisatas.show', compact('wisatad'));
    }


}
