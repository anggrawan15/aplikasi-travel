@extends('pakets.admin.layout-admin')

@section('title')
    <title>List Buat Paket Wisata</title>
@endsection

@section('content')

<div class="container">

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="text-light mb-2">
        <a href="{{route('paket.create')}}" class="btn btn-primary btn-md">Kembali</a>
    </div>

    
    <div class="row">
        <div class="col-md-6">
        
            <div class="card">
            <!-- card -->
                <div class="card-header">
                    <h3 class="card-title">
                        Wisata
                    </h3>
                </div>

                <div class="card-body">
                    <!-- card body -->
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>Gambar</th>
                                    <th>Nama Wisata</th>
                                    <th>Jumlah</th>
                                    <th>Tools</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($cartsw as $row)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/wisatas/' . $row['wisata_gambar']) }}" alt="{{ $row['wisata_nama']}}" width="100px" height="100px" >
                                    </td>

                                    <td>{{$row['wisata_nama']}}</td>
                                    <td>{{$row['jumlah']}}</td>

                                    <td>
                                        <form action="{{ route('paket.hapus.wisata', $row['wisata_id']) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-danger">hapus</button>
                                        </form>
                                    </td>
                                </tr>

                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data</td>
                                </tr>
                                
                                @endforelse
                            </tbody>
                            
                        </table>
                    </div>
                <!-- end card body -->
                </div>
            <!-- end card -->
            </div>

            <br>

            <!-- ini untuk Hotel -->
            <div class="card">
            <!-- card -->
                <div class="card-header">
                    <h3 class="card-title">
                        Hotel
                    </h3>
                </div>

                <div class="card-body">
                <!-- card body -->
                    <div class="table-responsive">
                        <table class="table table-hover">

                            <thead class="thead-light">
                                <tr>
                                    <th>Gambar</th>
                                    <th>Nama Hotel</th>
                                    <th>Jumlah</th>
                                    <th>Tools</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($cartsh as $row)

                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/hotels/'. $row['hotel_gambar'])}}" alt="{{ $row['hotel_nama']}}" width="100px" height="100px" >
                                    </td>

                                    <td>{{$row['hotel_nama']}}</td>
                                    <td>{{$row['jumlah']}}</td>

                                    <td>
                                        <form action="{{ route('paket.hapus.hotel', $row['hotel_id']) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-danger">hapus</button>
                                        </form>
                                    
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data</td>
                                </tr>
                                
                                @endforelse
                            </tbody>
                            
                        </table>
                    </div>
                <!-- end card body -->
                </div>
            <!-- end card -->
            </div>

            <br>
            <!-- ini untuk Resto -->
            <div class="card">
            <!-- card  -->
                <div class="card-header">
                    <h3 class="card-title">
                        Restorand
                    </h3>
                </div>

                <div class="card-body">
                <!-- card body -->
                    <div class="table-responsive">
                        <table class="table table-hover">

                            <thead class="thead-light">
                                <tr>
                                    <th>Gambar</th>
                                    <th>Nama Resto</th>
                                    <th>jumlah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($cartsr as $row)

                                <tr>

                                    <td>
                                        <img src="{{ asset('storage/restos/'. $row['resto_gambar'])}}" alt="{{ $row['resto_nama']}}" width="100px" height="100px" >
                                    </td>

                                    <td>{{$row['resto_nama']}}</td>
                                    <td>{{$row['jumlah']}}</td>

                                    <td>
                                        <form action="{{ route('paket.hapus.resto', $row['resto_id'])}}" method="POST">
                                            @csrf
                                            <button class="btn btn-danger">hapus</button>
                                        </form>
                                    </td>
                                
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data</td>
                                </tr>
                                
                                @endforelse
                            </tbody>
                            
                        </table>
                    </div>
                <!-- end card body -->
                </div>
            <!-- end card -->
            </div>

            <br>

        <!-- ini adalah bagian row -->
        </div>

        <div class="col-md-6">
        <!-- awal row -->
            <div class="card">
            <!-- card -->
                <div class="card-header">
                    <h3 class="card-title">
                        Paket Tour
                    </h3>
                </div>

                <form action="{{ route('paket.simpan') }}" method="POST" enctype="multipart/form-data" novalidate="novalidate">
                @csrf

                    <div class="card-body">
                    <!-- card body -->
                        <div class="form-group">
                            <label for="nama">Nama Paket Wisata</label>
                            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                            <p class="text-danger">{{ $errors->first('nama') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="min">Jumlah Minimum Paket</label>
                            <input type="number" name="min" class="form-control" value="1" required>
                            <p class="text-danger">{{ $errors->first('min') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="max">Jumlah Maximum Paket</label>
                            <input type="number" name="max" class="form-control" value="1" required>
                            <p class="text-danger">{{ $errors->first('max') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" name="harga" class="form-control" value="{{ old('harga') }}" required>
                            <p class="text-danger">{{ $errors->first('harga') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="gambar">Foto Paket</label>
                            <input type="file" name="gambar" class="form-control" value="{{ old('gambar') }}" required>
                            <p class="text-danger">{{ $errors->first('gambar') }}</p>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    <!-- end card body -->
                    </div>
                </form>
            <!-- end card -->
            </div>
        <!-- end row -->
        </div>
    </div>
</div>

    


@endsection