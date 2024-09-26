<!-- resources/views/AdminView/model_profile.blade.php -->

@extends('PendaftarView.Templates.master_index')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 mt-4">
                @if (session('message'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card">
                    <h5 class="card-header">Profile Pendaftar: <b>{{ $model->fullname }}</b></h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                @if ($model->profile)
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $model->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Foto</th>
                                        <td>
                                            <img src="{{ asset($model->profile->foto) }}" alt="Profile Photo"
                                                style="max-width: 100px; max-height: 100px; cursor: pointer;"
                                                data-bs-toggle="modal" data-bs-target="#imageModal"
                                                onclick="showImageModal('{{ asset($model->profile->foto) }}')">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nama Lengkap</th>
                                        <td>{{ $model->profile->nama_lengkap ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>NIK</th>
                                        <td>{{ $model->profile->nik ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Umur</th>
                                        <td>{{ $model->profile->umur ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>No Telepon</th>
                                        <td>{{ $model->profile->no_telepon ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td>{{ $model->profile->jenis_kelamin ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tempat Lahir</th>
                                        <td>{{ $model->profile->tempat_lahir ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{ $model->profile->alamat ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Pekerjaan</th>
                                        <td>{{ $model->profile->pekerjaan ?? '' }}</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="2">{{ $model->fullname }} Belum memiliki data profil.</td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                        <a href="{{ route('profile.edit', $model->id) }}" class="btn btn-primary btn-sm mt-3">Update
                            Profile</a>
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
