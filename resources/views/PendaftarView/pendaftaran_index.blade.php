@extends('PendaftarView.Templates.master_index')


@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 mt-4">

            <!-- Menambahkan Flash Message -->
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

            <div class="card">
                <h5 class="card-header">{{ $title }}</h5>
                <div class="card-body">
                    <a href="{{ route('user_pendaftar.create') }}" class="btn btn-primary btn-sm mb-3">Tambah Data+</a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Mayit Name</th>
                                    <th>Blok Makam_id</th>
                                    <th>User Id</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($models as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->mayits->nama_lengkap }}</td>
                                        <td>{{ $item->blok_makams->nama_blok }}</td> <!-- Tampilkan nama_blok -->
                                        <td>{{ $item->users->fullname }}</td> <!-- Memeriksa apakah user null -->
                                        <td>
                                            @if ($item->row_status == 'Pending')
                                                <div class="bg-warning text-white text-center p-1 rounded w-auto d-inline-block">
                                                    {{ $item->row_status }}
                                                </div>
                                            @endif
                                            @if ($item->row_status == 'Ditolak')
                                                <div class="bg-danger text-white text-center p-1 rounded w-auto d-inline-block">
                                                    {{ $item->row_status }}
                                                </div>
                                            @endif
                                            @if ($item->row_status == 'Diterima')
                                                <div class="bg-success text-white text-center p-1 rounded w-auto d-inline-block">
                                                    {{ $item->row_status }}
                                                </div>
                                            @endif
                                            @if ($item->row_status == 'Review')
                                                <div class="bg-secondary text-white text-center p-1 rounded w-auto d-inline-block">
                                                    {{ $item->row_status }}
                                                </div>
                                            @endif
                                        </td>
                                        <td>

                                            @if ($item->row_status == 'Pending')
                                            <a href="{{ route('upload_bukti', $item->id) }}" class="btn btn-info btn-sm">
                                                <i class="fa fa-edit"></i> Upload Bukti Pembayaran</a>
                                                @else
                                                {!! Form::open([

                                                    ])
                                                     !!}

                                                    <a href="{{ route('user_pendaftar.show', $item->id) }}" class="btn btn-info btn-sm">
                                                            <i class="fa fa-edit"></i> Detail</a>

                                                    {!! Form::close()!!}

                                            @endif


                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="6">Data tidak ada</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {!! $models->links() !!}
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
