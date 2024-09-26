@extends('PengelolaView.Templates.master_index')

@section('content')
    <div class="container-xl flex-grow-1 container-p-y">
        <div class="row">

            <div class="col-lg-4 col-md-6 col-12 mb-4 order-1">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('TemplateDashboard/assets/img/icons/unicons/wallet-info.png') }} "
                                    alt="Credit Card" class="rounded" />
                            </div>
                        </div>
                        <h4>Jumlah Pendaftaran Diterima :</h4>
                        <h3 class="card-title text-nowrap mb-1">{{ $countStatus }}</h3>
                    </div>
                </div>
            </div>

            <!-- Kartu 2 -->
            <div class="col-lg-4 col-md-6 col-12 mb-4 order-1">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('TemplateDashboard/assets/img/icons/unicons/wallet-info.png') }} "
                                    alt="Credit Card" class="rounded" />
                            </div>
                        </div>
                        <h4>Jumlah Pendaftaran :</h4>
                        <h3 class="card-title text-nowrap mb-1">{{ $countPendaftarans }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-4 order-1">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('TemplateDashboard/assets/img/icons/unicons/wallet-info.png') }} "
                                    alt="Credit Card" class="rounded" />
                            </div>
                        </div>
                        <h4>Jumlah Pendaftaran Ditolak :</h4>
                        <h3 class="card-title text-nowrap mb-1">{{ $countStatus2 }}</h3>
                    </div>
                </div>
            </div>



            <!-- Tambahkan kartu lainnya di sini -->

        </div>
    </div>
@endsection
