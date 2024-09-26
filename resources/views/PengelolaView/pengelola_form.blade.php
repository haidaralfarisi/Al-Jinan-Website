@extends('PengelolaView.Templates.master_index')


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10 mt-4">
            <div class="card">
                <h5 class="card-header">Form User</h5>
                <div class="card-body">

                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">

                            {{-- jadi akan muncul pesan dari key 'success' yang ada di RegisterController --}}
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {!! Form::model($model, ['route' => ['user_pengelola.update', $model->id], 'method' => $method]) !!}
                    {{-- //form select untuk memilih beberapa role --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th class="col-3">Nama Lengkap</th>
                                    <td class="col-9">{{ $model->mayits->nama_lengkap }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td>{{ $model->mayits->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <th>Golongan</th>
                                    <td>{{ $model->mayits->golongan }}</td>
                                </tr>
                                <tr>
                                    <th>Tempat Lahir</th>
                                    <td>{{ $model->mayits->tempat_lahir }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <td>{{ $model->mayits->tanggal_lahir }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Meninggal</th>
                                    <td>{{ $model->mayits->tanggal_meninggal }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $model->mayits->alamat }}</td>
                                </tr>
                                <tr>
                                    <th>Bapak Kandung</th>
                                    <td>{{ $model->mayits->bapak_kandung }}</td>
                                </tr>
                                <tr>
                                    <th>Blok Makam</th>
                                    <td>{{ $model->blok_makams->nama_blok }}</td>
                                </tr>
                                <tr>
                                    <th>User</th>
                                    <td>{{ $model->users->fullname }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        {!! Form::select(
                                            'row_status',
                                            [
                                                'Pending'=> 'Pending',
                                                'Diterima'=> 'Diterima',
                                                'Ditolak'=> 'Ditolak',
                                            ],
                                            null,
                                            ['class' => 'form-control'],
                                        ) !!}
                                        <span class="text-danger">{{ $errors->first('row_status') }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Bukti</th>
                                    <td>
                                        <img src="{{ asset($model->bukti_pembayaran) }}" alt="Profile Photo" style="max-width: 100px; max-height: 100px;cursor: pointer;" data-bs-toggle="modal" data-bs-target="#imageModal" onclick="showImageModal('{{ asset($model->bukti_pembayaran) }}')">
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <a href="{{ route('user_pengelola.pendaftar') }}" class="btn btn-secondary mt-3">Back</a
                            >
                            {!! Form::submit($button, ['class' => 'btn btn-primary mt-3']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
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
