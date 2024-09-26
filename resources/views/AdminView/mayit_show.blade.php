@extends('AdminView.Templates.master_index')


@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 mt-4">

            <!-- Menambahkan Flash Message -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="card">
                <h5 class="card-header">{{ $title }}</h5>
                <div class="card-body">
                    <div class="table-responsive">

                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
