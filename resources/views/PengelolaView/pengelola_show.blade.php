@extends('PengelolaView.Templates.master_index')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 mt-4">
            <div class="card">
                <h5 class="card-header">{{ $title }}</h5>
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
                                <td>{{ $model->row_status }}</td>
                            </tr>
                            
                        </table>
                    </div>
                    <a href="{{ route('user_pengelola.pendaftar') }}" class="btn btn-secondary mt-3">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
