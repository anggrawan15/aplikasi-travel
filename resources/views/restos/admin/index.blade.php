@extends('restos.admin.layout-admin')

@section('title')
    <title>Halaman Restourand Admin</title>
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                List Restourand
                <!-- link tambah -->
                <a href="{{ route('resto.create') }}" class="btn btn-primary btn-sm float-right">Tambah</a>
            </h4>
        </div>

        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('resto.index') }}" method="post">
                @csrf
                <div class="input-group mb-3 col-md-3 float-right">
                    <!-- KEMUDIAN NAME-NYA ADALAH Q YANG AKAN MENAMPUNG DATA PENCARIAN -->
                    <input type="text" name="q" class="form-control" placeholder="Cari...">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="button">Cari</button>
                    </div>
                </div>
            </form>

            <div class="table-responsive" >
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Lokasi</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $no = 1; @endphp
                    @forelse ($resto as $row)
                        <tr>
                        

                            <td>{{ $no++ }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->lokasi }}</td>

                            <td>
                                <img src="{{ asset('storage/restos/' . $row->gambar) }}" alt="{{ $row->nama }}" width="100px" height="100px">
                            </td>

                            <td>
                                <div class="btn-group">
                                        <a href="{{ route('resto.show', $row->id) }}" class="btn btn-primary btn-sm">Detail</a>
                                        <a href="{{ route('resto.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('resto.destroy', $row->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Menghapus?')">Hapus</button>
                                    </form>
                                </div>
                                
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

            <div class="row">
                <div class="col-sm-3">
                    <!-- MEMBUAT LINK PAGINASI JIKA ADA -->
                {!! $resto->links() !!}
                </div>
            </div>
            
           
        </div>
    </div>
</div>
@endsection