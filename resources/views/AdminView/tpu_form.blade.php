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
                        <label for="nama_tpu">Nama TPU</label>
                        {!! Form::text('nama_tpu', null, ['class' => 'form-control', 'autofocus']) !!}
                        <span class="text-danger">{{ $errors->first('nama_tpu') }}</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="alamat">Alamat</label>
                        {!! Form::text('alamat', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('alamat') }}</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="user_id">Pengelola</label>
                        {!! Form::select('user_id', $users->where('role', 'pengelola')->pluck('fullname', 'id')->toArray(), null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('user_id') }}</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="luas_wilayah">Luas Wilayah</label>
                        {!! Form::text('luas_wilayah', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('luas_wilayah') }}</span>
                    </div>
                    {!! Form::submit($button, ['class' => 'btn btn-primary mt-3 btn-sm']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
