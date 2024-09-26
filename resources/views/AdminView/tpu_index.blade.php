@extends('AdminView.Templates.master_index')


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
                    <a href="{{ route('tpu.create') }}" class="btn btn-primary btn-sm mb-3">Tambah Data+</a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama TPU</th>
                                    <th>Alamat</th>
                                    <th>User Id</th>
                                    <th>Luas Wilayah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($models as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_tpu }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->user->fullname ?? 'N/A' }}</td>
                                        <td>{{ $item->luas_wilayah }}</td>
                                        <td>
                                            {!! Form::open([
                                                'route' => ['tpu.destroy', $item->id],
                                                'method' => 'DELETE',
                                                'onSubmit' => 'return confirm("Yakin ingin menghapus data ini?")',
                                            ]) !!}
                                            <a href="{{ route('tpu.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i> Hapus
                                            </button>
                                            {!! Form::close() !!}

                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="4">Data tidak ada</td>
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
