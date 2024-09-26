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
                        <label for="foto">Foto</label>
                        {!! Form::file('bukti_pembayaran', ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('bukti_pembayaran') }}</span>
                    </div>



                    {!! Form::submit($button, ['class' => 'btn btn-primary mt-3 btn-sm']) !!}


                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    @endsection
