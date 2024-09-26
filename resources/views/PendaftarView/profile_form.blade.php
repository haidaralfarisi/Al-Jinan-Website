@extends('PendaftarView.Templates.master_index')


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10 mt-4">
            <div class="card">
                <h5 class="card-header">{{ $title }}</h5>
                <div class="card-body">

                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">

                            {{-- jadi akan muncul pesan dari key 'success' yang ada di RegisterController --}}
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {!! Form::model($model, ['route' => $route, 'method' => $method,'files' => true]) !!}
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        {!! Form::text('email', null, ['class' => 'form-control', 'autofocus']) !!}
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="foto">Foto</label>
                        {!! Form::file('profile[foto]', ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('profile.foto') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>


                        {{-- ini adalah cara untuk memanggil data tetapi data tersebut terdapat relasi tabel --}}
                        {!! Form::text('profile[nama_lengkap]', null, ['class' => 'form-control', 'autofocus']) !!}
                        <span class="text-danger">{{ $errors->first('profile.nama_lengkap') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="nik">NIK</label>
                        {!! Form::text('profile[nik]', null, ['class' => 'form-control', 'autofocus']) !!}
                        <span class="text-danger">{{ $errors->first('nik') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="umur">Umur</label>
                        {!! Form::text('profile[umur]', null, ['class' => 'form-control', 'autofocus']) !!}
                        <span class="text-danger">{{ $errors->first('umur') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="no_telepon">No Telepon</label>
                        {!! Form::text('profile[no_telepon]', null, ['class' => 'form-control', 'autofocus']) !!}
                        <span class="text-danger">{{ $errors->first('no_telepon') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        {!! Form::select('profile[jenis_kelamin]', ['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'], null, [
                            'class' => 'form-control',
                        ]) !!}
                        <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        {!! Form::text('profile[tempat_lahir]', null, ['class' => 'form-control', 'autofocus']) !!}
                        <span class="text-danger">{{ $errors->first('tempat_lahir') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tempat Lahir</label>
                        {!! Form::date('profile[tanggal_lahir]', null, ['class' => 'form-control', 'autofocus']) !!}
                        <span class="text-danger">{{ $errors->first('tanggal_lahir') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        {!! Form::text('profile[alamat]', null, ['class' => 'form-control', 'autofocus']) !!}
                        <span class="text-danger">{{ $errors->first('alamat') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan">Pekerjaan</label>
                        {!! Form::text('profile[pekerjaan]', null, ['class' => 'form-control', 'autofocus']) !!}
                        <span class="text-danger">{{ $errors->first('pekerjaan') }}</span>
                    </div>

                    {!! Form::submit($button, ['class' => 'btn btn-primary mt-3 btn-sm']) !!}


                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    @endsection
