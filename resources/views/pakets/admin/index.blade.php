@extends('pakets.admin.layout-admin')

@section('title')
    <title>Halaman Paket Admin</title>
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                List Paket Wisata
                <!-- link tambah -->
                <a href="{{ route('paket.create') }}" class="btn btn-primary btn-sm float-right">Tambah</a>
            </h4>
        </div>

        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('resto.index') }}" method="get">
                <div class="input-group mb-3 col-md-3 float-right">
                    <!-- KEMUDIAN NAME-NYA ADALAH Q YANG AKAN MENAMPUNG DATA PENCARIAN -->
                    <input type="text" name="q" class="form-control" placeholder="Cari..." value="{{ request()->q }}">
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
                            <th>Gambar</th>
                            <th>Code</th>
                            <th>nama</th>
                            <th>Minimal</th>
                            <th>maximal</th>
                            <th>Harga</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $no = 1; @endphp
                    @forelse ($paket as $row)
                        <tr>
                        

                            <td>{{ $no++ }}</td>
                            <td>
                                <img src="{{ asset('storage/pakets/' . $row->gambar) }}" alt="{{ $row->nama }}" width="100px" height="100px">
                            </td>
                            <td>{{ $row->code }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->min }}</td>
                            <td>{{ $row->max }}</td>
                            <td>Rp {{number_format($row->harga)}}</td>
                            <td>
                                <a href="{{route('paket.detail', $row->id) }}" class="btn btn-info">Detail</a>
                            
                            </td>

                            
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="text-center">Tidak ada data</td>
                        </tr>
                        @endforelse
                    
                    
                    </tbody>

                
                </table>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <!-- MEMBUAT LINK PAGINASI JIKA ADA -->
                {!! $paket->links() !!}
                </div>
            </div>
            
           
        </div>
    </div>
</div>
@endsection