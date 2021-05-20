@extends('hotels.admin.layout-admin')

@section('title')
    <title>Halaman Hotel Admin</title>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    List Hotel
                    <!-- link tambah -->
                    <a href="{{ route('hotel.create') }}" class="btn btn-primary btn-sm float-right">Tambah</a>
                </h4>
            </div>

            <div class="card-body">
                <!-- awal card body -->
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form action="{{ route('hotel.index') }}" method="get">
                    <!-- <div class="input-group mb-3 col-md-3 float-right">
                        <input type="text" name="q" class="form-control" placeholder="Cari..." value="{{ request()->q }}">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="button">Cari</button>
                            </div>
                    </div> -->
                </form>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <!-- awal -->
                            <thead class="thead-light">
                                <tr>
                                    <th >#</th>
                                    <th >Nama</th>
                                    <th >Lokasi</th>
                                    <th >Gambar</th>
                                    <th >Aksi</th>
                                </tr>
                            </thead>
                            <!-- akhir -->
                            <tbody>
                                @php $no = 1; @endphp
                                @forelse ($hotel as $row)
                                <tr>
                                    <!-- awal -->
                                    <td >{{ $no++ }}</td>
                                    <td >{{ $row->nama }}</td>
                                    <td >{{ $row->lokasi }}</td>
                                    <td>
                                        <img src="{{ asset('storage/hotels/' . $row->gambar) }}" alt="{{ $row->nama }}" width="100px" height="100px">
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <!-- awal -->
                                            <a href="{{ route('hotel.show', $row->id) }}" class="btn btn-primary btn-sm">Detail</a>
                                            <a href="{{ route('hotel.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('hotel.destroy', $row->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Menghapus?')" >Hapus</button>
                                            </form>
                                            <!-- akhir -->
                                        </div>
                                    </td>
                                    <!-- akhir -->
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>

                <div class="row">
                    <div class="col-sm-3">
                        <!-- MEMBUAT LINK JIKA ADA -->
                    {!! $hotel->links() !!}
                    </div>
                </div>
            
            <!-- akhir card body -->
            </div>
        <!-- akhir card -->
        </div>
    
        </div>
    </div>
</div>
@endsection