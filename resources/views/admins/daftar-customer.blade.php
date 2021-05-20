@extends('admins.layout')

@section('title')
    <title>Daftar Customer</title>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <h5>Daftar Customer</h5>
                    </div>

                    <div class="card-body">
                
                        
                        <div class="table-responsive">
                            <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>NO TLP</th>
                                    <th>Alamat</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @forelse($dafCust as $row)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->no_tlp }}</td>
                                        <td>{{ $row->alamat }}</td>
                                        <td>
                                        @if ($row->status == 1)
                                            <span class="badge badge-pill badge-success">Aktif</span>
                                        @else
                                            <span class="badge badge-pill badge-warning">Tidak Aktif</span>
                                        @endif
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
                        {!! $dafCust->links() !!}
                        </div>
                    </div>

                </div>
                    
            </div>
        </div>
    </div>

@endsection