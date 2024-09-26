@extends('AdminView.Templates.master_index')


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
                    {!! Form::model($model, ['route' => $route, 'method' => $method,'files' => true]) !!}
                    @csrf
                    <div class="form-group">
                        <label for="nama_blok">Nama Blok</label>
                        {!! Form::text('nama_blok', null, ['class' => 'form-control', 'autofocus']) !!}
                        <span class="text-danger">{{ $errors->first('nama_blok') }}</span>
                    </div>

                    <div class="form-group mt-3">
                        <label for="role">Nama TPU</label>

                        {{-- //form select untuk memilih beberapa role --}}
                        {!! Form::select(
                            'tpu_id',
                            [
                                '1' => 'Al-Jinan',
                                '3' => 'Al-Gandari',
                            ],
                            null,
                            ['class' => 'form-control'],
                        ) !!}
                        <span class="text-danger">{{ $errors->first('tpu') }}</span>
                    </div>
                    <div>
                        <div class="form-group mt-3">
                            <label for="foto">Foto</label>
                            {!! Form::file('foto', ['class' => 'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('foto') }}</span>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="kapasitas">Kapasitas</label>
                        {!! Form::text('kapasitas', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('kapasitas') }}</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="harga_sewa">Harga Sewa</label>
                        {!! Form::text('harga_sewa', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('harga_sewa') }}</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="deskripsi">Deskripsi</label>
                        {!! Form::text('deskripsi', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                    </div>

                    <div class="form-group mt-3">
                        <label for="luas_blok">Luas Blok</label>
                        {!! Form::text('luas_blok', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('luas_blok') }}</span>
                    </div>
                    {!! Form::submit($button, ['class' => 'btn btn-primary mt-3 btn-sm']) !!}


                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    @endsection
