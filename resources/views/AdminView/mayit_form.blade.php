@extends('AdminView.Templates.master_index')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10 mt-4">
            <div class="card">
                <h5 class="card-header">{{ $title }}</h5>
                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {!! Form::model($model, ['route' => $route, 'method' => $method]) !!}
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        {!! Form::text('nama_lengkap', null, ['class' => 'form-control', 'autofocus']) !!}
                        <span class="text-danger">{{ $errors->first('nama_lengkap') }}</span>
                    </div>

                    <div class="form-group mt-3">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        {!! Form::select('jenis_kelamin', ['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'], null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                    </div>

                    <div class="form-group mt-3">
                        <label for="golongan">Golongan</label>
                        {!! Form::select('golongan', ['dewasa' => 'Dewasa', 'anak-anak' => 'Anak-anak'], null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('golongan') }}</span>
                    </div>

                    <div class="form-group mt-3">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        {!! Form::text('tempat_lahir', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('tempat_lahir') }}</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        {!! Form::date('tanggal_lahir', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('tanggal_lahir') }}</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="tanggal_meninggal">Tanggal Meninggal</label>
                        {!! Form::date('tanggal_meninggal', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('tanggal_meninggal') }}</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="alamat">Alamat</label>
                        {!! Form::text('alamat', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('alamat') }}</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="bapak_kandung">Bapak Kandung</label>
                        {!! Form::text('bapak_kandung', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('bapak_kandung') }}</span>
                    </div>
                    {!! Form::submit($button, ['class' => 'btn btn-primary mt-3 btn-sm']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
