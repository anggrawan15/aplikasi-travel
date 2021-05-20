<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resto;
use Illuminate\Support\Str;
use File;

class RestoController extends Controller
{
    //
    public function index(Request $request){

        $resto = Resto::orderBy('created_at','DESC');

        if ($request->q != '') {
            //MAKA LAKUKAN FILTERING DATA BERDASARKAN NAME DAN VALUENYA SESUAI DENGAN PENCARIAN YANG DILAKUKAN USER
            $resto = $resto->where('name', 'LIKE', '%' . $request->q . '%');

            return view('restos.admin.index', compact('resto'));
        }

        $resto = $resto->paginate(10);

        return view('restos.admin.index', compact('resto'));
    }

    public function show($id){

        $resto = Resto::find($id);
        return view('restos.admin.show', compact('resto'));
    }

    public function create(){

        return view('restos.admin.tambah');

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
            $file->storeAs('public/restos', $filename);

            $resto = Resto::create([
                'nama' => $request->nama,
                'lokasi' => $request->lokasi,
                'deskripsi' => $request->deskripsi,
                'gambar' => $filename
            ]);

            return redirect(route('resto.index'))->with(['success' => 'Data Restourand Baru Ditambahkan']);
        }
    }

    public function edit($id){

        $resto = Resto::find($id);
        return view('restos.admin.edit', compact('resto'));
    }

    public function update(Request $request, $id){

        $this->validate($request, [
            'nama' => 'required|string|max:100',
            'lokasi' => 'required|string|max:200',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:png,jpeg,jpg' //GAMBAR DIVALIDASI HARUS BERTIPE PNG,JPG DAN JPEG
        ]);

        $resto = Resto::find($id); //AMBIL DATA PRODUK YANG AKAN DIEDIT BERDASARKAN ID
        $filename = $resto->gambar; //SIMPAN SEMENTARA NAMA FILE IMAGE SAAT INI

        if ($request->hasFile('gambar')) {
            // buat variable $file untuk menyimpan sementara file image
            //MAKA KITA SIMPAN SEMENTARA FILE TERSEBUT KEDALAM VARIABLE FILE
            $file = $request->file('gambar');
            //kemudian buat Variable $filename 
            // kemudian rubah namanya dengan waktu . Str::slug($request->name) nama
            $filename = time() . Str::slug($request->nama) . '.' . $file->getClientOriginalExtension();
            //SIMPAN FILENYA KEDALAM FOLDER PUBLIC/PRODUCTS, DAN PARAMETER KEDUA ADALAH NAMA CUSTOM UNTUK FILE TERSEBUT
            $file->storeAs('public/restos', $filename);

            File::delete(storage_path('app/public/restos/' . $resto->gambar));
        
        }

        $resto->update([
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'gambar' => $filename
        ]);

        return redirect(route('resto.index'))->with(['success' => 'Data Resturand Berhasil Diubah!']);

    }

    public function destroy($id){

        $resto = Resto::find($id); //QUERY UNTUK MENGAMBIL DATA PRODUK BERDASARKAN ID

        //HAPUS FILE IMAGE DARI STORAGE PATH DIIKUTI DENGNA NAMA IMAGE YANG DIAMBIL DARI DATABASE
        // File adalah suatu model yang digunakan untuk menghapus data dari folder lokasinya
        // pada folder resouces yaitu app/public/products/namaProduk
        File::delete(storage_path('app/public/restos/' . $resto->gambar));

        //KEMUDIAN HAPUS DATA PRODUK DARI DATABASE
        $resto->delete();

        //kembali ke folder products/index.blade.php
        // mengunakan route product.index
        return redirect(route('resto.index'))->with(['success' => 'Data Restourand Sudah Dihapus']);
    }

     //untuk Customer
     public function resto(){
        $restos = Resto::orderBy('created_at', 'DESC')->paginate(3);
        return view('restos.index', compact('restos'));
    }

    

    public function detail($id){
        $restod = Resto::find($id);
        return view('restos.show', compact('restod'));
    }


}
