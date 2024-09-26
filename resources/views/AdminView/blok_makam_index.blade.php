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
                    <a href="{{ route('blok_makam.create') }}" class="btn btn-primary btn-sm mb-3">Tambah Data+</a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Blok</th>
                                    <th>Nama TPU</th>
                                    <th>Foto</th>
                                    <th>Kapasitas</th>
                                    <th>Harga Sewa</th>
                                    <th>Deskripsi</th>
                                    <th>Luas Blok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($models as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_blok }}</td>
                                        <td>{{ $item->tpus->nama_tpu ?? 'N/A' }}</td> <!-- Tampilkan nama_tpu -->

                                        <td>
                                            @if ($item->foto)
                                            <img src="{{ asset('storage/' . $item->foto) }}" alt="Blok Photo" style="max-width: 100px; max-height: 100px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#imageModal" onclick="showImageModal('{{ asset('storage/' . $item->foto) }}')">
                                            @else
                                            No Image
                                        @endif
                                    </td>

                                        <td>{{ $item->kapasitas }}</td>
                                        <td>{{ $item->harga_sewa }}</td>
                                        <td>{{ $item->deskripsi }}</td>
                                        <td>{{ $item->luas_blok }}</td>
                                        <td>
                                            {!! Form::open([
                                                'route' => ['blok_makam.destroy', $item->id],
                                                'method' => 'DELETE',
                                                'onSubmit' => 'return confirm("Yakin ingin menghapus data ini?")',
                                            ]) !!}
                                            <a href="{{ route('blok_makam.edit', $item->id) }}" class="btn btn-warning btn-sm">
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

<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Zoom In</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img id="modalImage" src="" alt="Zoomed Image" style="width: 100%; height: auto;">
            </div>
        </div>
    </div>
</div>

<script>
    function showImageModal(imageUrl) {
        document.getElementById('modalImage').src = imageUrl;
    }
</script>

@endsection
