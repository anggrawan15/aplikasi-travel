@extends('wisatas.admin.layout-admin')

@section('title')
    <title>Tambah Data Wisata</title>
@endsection

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                Tambah Data Wisata
                <!-- link tambah -->
                <a href="{{ route('wisata.index') }}" class="btn btn-primary btn-sm float-right">Wisata</a>
            </h4>
        </div>

        <form action="{{ route('wisata.update', $wisata->id) }}" method="post" enctype="multipart/form-data" >
                @csrf
                <!-- KARENA UPDATE MAKA KITA GUNAKAN DIRECTIVE DIBAWAH INI -->
                @method('PUT')
            <div class="card-body">

                <div class="form-group">
                    <label for="nama">Nama Wisata</label>
                    <input type="text" name="nama" class="form-control" value="{{ $wisata->nama }}" required>
                    <p class="text-danger">{{ $errors->first('nama') }}</p>
                </div>

                <div class="form-group">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" value="{{ $wisata->lokasi }}" required>
                    <p class="text-danger">{{ $errors->first('lokasi') }}</p>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <!-- TAMBAHKAN ID YANG NNTINYA DIGUNAKAN UTK MENGHUBUNGKAN DENGAN CKEDITOR -->
                    <textarea name="deskripsi" id="deskripsi" cols="5" rows="5"  class="form-control">{{ $wisata->deskripsi }}</textarea>
                    <p class="text-danger">{{ $errors->first('deskripsi') }}</p>
                </div>



                <div class="form-group">
                    <label for="gambar">Foto Wisata</label>
                    <br>
                    <!--  TAMPILKAN GAMBAR SAAT INI -->
                    <img src="{{ asset('storage/wisatas/' . $wisata->gambar) }}" width="100px" height="100px" alt="{{ $wisata->nama }}">
                    <hr>
                    <input type="file" name="gambar" class="form-control">
                    <p><strong>Biarkan kosong jika tidak ingin mengganti gambar</strong></p>
                    <p class="text-danger">{{ $errors->first('gambar') }}</p>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-sm">Update</button>
                </div>

            </div>
        </form>
        
    </div>
</div>


@endsection