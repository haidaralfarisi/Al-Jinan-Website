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
                <h5 class="card-header">List User</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap Mayit</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Golongan</th>
                                    <th>Tempat lahir</th>
                                    <th>Tanggal lahir</th>
                                    <th>Tanggal meninggal</th>
                                    <th>Alamat</th>
                                    <th>Bapak Kandung</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($models as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_lengkap }}</td>
                                        <td>{{ $item->jenis_kelamin }}</td>
                                        <td>{{ $item->golongan }}</td>
                                        <td>{{ $item->tempat_lahir }}</td>
                                        <td>{{ $item->tanggal_lahir }}</td>
                                        <td>{{ $item->tanggal_meninggal }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->bapak_kandung}}</td>
                                        <td>

                                            {!! Form::open([
                                            'route' => ['mayit.destroy', $item->id],
                                            'method' => 'DELETE',
                                            'onSubmit' => 'return confirm ("Yakin ingin menghapus data ini?")',
                                            ])
                                             !!}
                                            <a href="{{ route('mayit.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i> Edit</a>

                                            {{-- <a href="{{ route('mayit.show', $item->id) }}" class="btn btn-info btn-sm">
                                                    <i class="fa fa-edit"></i> Detail</a> --}}

                                            {{-- {!! Form::submit('Hapus', ['class' => 'btn btn-danger btn-sm']) !!} --}}
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i> Hapus
                                            {!! Form::close()!!}

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
