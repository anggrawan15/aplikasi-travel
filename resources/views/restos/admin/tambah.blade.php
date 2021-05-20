@extends('restos.admin.layout-admin')

@section('title')
    <title>Tambah Data Restorand</title>
@endsection

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                Tambah Data Restorand
                <!-- link tambah -->
                <a href="{{ route('resto.index') }}" class="btn btn-primary btn-sm float-right">Back</a>
            </h4>
        </div>

        <form action="{{ route('resto.store') }}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label for="nama">Nama Restorand</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                    <p class="text-danger">{{ $errors->first('nama') }}</p>
                </div>

                <div class="form-group">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi') }}" required>
                    <p class="text-danger">{{ $errors->first('lokasi') }}</p>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <!-- TAMBAHKAN ID YANG NNTINYA DIGUNAKAN UTK MENGHUBUNGKAN DENGAN CKEDITOR -->
                    <textarea name="deskripsi" id="deskripsi" cols="5" rows="5"  class="form-control">{{ old('deskripsi') }}</textarea>
                    <p class="text-danger">{{ $errors->first('deskripsi') }}</p>
                </div>

                <div class="form-group">
                    <label for="gambar">Foto Wisata</label>
                    <input type="file" name="gambar" class="form-control" value="{{ old('gambar') }}" required>
                    <p class="text-danger">{{ $errors->first('gambar') }}</p>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-sm">Tambah</button>
                </div>

            </div>
        </form>
        
    </div>
</div>


@endsection