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
                    <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm mb-3">Tambah Data+</a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Full Name</th>
                                    <th>User Name</th>
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($models as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->fullname }}</td>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->role }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>

                                            {!! Form::open([
                                            'route' => ['user.destroy', $item->id],
                                            'method' => 'DELETE',
                                            'onSubmit' => 'return confirm ("Yakin ingin menghapus data ini?")',
                                            ])
                                             !!}
                                            <a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i> Edit</a>

                                            <a href="{{ route('user.show', $item->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i> Profile</a>

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
