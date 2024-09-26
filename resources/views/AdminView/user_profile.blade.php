<!-- resources/views/AdminView/user_profile.blade.php -->

@extends('AdminView.Templates.master_index')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 mt-4">
            <div class="card">
                <h5 class="card-header">Profile User: <b>{{ $user->fullname }}</b></h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            @if ($user->profile)
                            <tr>
                                <th>Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Foto</th>
                                <td>
                                    <img src="{{ asset($user->profile->foto) }}" alt="Profile Photo" style="max-width: 100px; max-height: 100px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#imageModal" onclick="showImageModal('{{ asset($user->profile->foto) }}')">
                                </td>
                            </tr>
                            <tr>
                                <th>Nama Lengkap</th>
                                <td>{{ $user->profile->nama_lengkap ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>NIK</th>
                                <td>{{ $user->profile->nik ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Umur</th>
                                <td>{{ $user->profile->umur ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>No Telepon</th>
                                <td>{{ $user->profile->no_telepon ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>{{ $user->profile->jenis_kelamin ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <td>{{ $user->profile->tempat_lahir ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ $user->profile->alamat ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Pekerjaan</th>
                                <td>{{ $user->profile->pekerjaan ?? '' }}</td>
                            </tr>
                            @else
                            <tr>
                                <td colspan="2">User tidak memiliki data profil.</td>
                            </tr>
                            @endif
                        </table>
                    </div>
                    <a href="{{ route('user.index') }}" class="btn btn-secondary btn-sm mt-3">Back</a>
                    {{-- <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary btn-sm mt-3">Update Profile</a> --}}
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
