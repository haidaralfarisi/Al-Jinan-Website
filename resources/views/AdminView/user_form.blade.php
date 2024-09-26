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
                    {!! Form::model($model, ['route' => $route, 'method' => $method]) !!}
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        {!! Form::text('fullname', null, ['class' => 'form-control', 'autofocus']) !!}
                        <span class="text-danger">{{ $errors->first('fullname') }}</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="username">User Name</label>

                        {{-- form text untuk mengisi text --}}
                        {!! Form::text('username', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('username') }}</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="role">Role</label>

                        {{-- //form select untuk memilih beberapa role --}}
                        {!! Form::select(
                            'role',
                            [
                                'admin' => 'Admin Website',
                                'pengelola' => 'Pengelola Makam',
                                'pendaftar' => 'Pendaftar Pemakaman',
                            ],
                            $model->role,
                            ['class' => 'form-control'],
                        ) !!}
                        <span class="text-danger">{{ $errors->first('role') }}</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="email">Email</label>
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="password">Password</label>
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    </div>
                    {!! Form::submit($button, ['class' => 'btn btn-primary mt-3 btn-sm']) !!}


                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    @endsection
