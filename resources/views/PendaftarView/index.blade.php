@extends('PendaftarView.Templates.master_index')

@section('content')
    <div class="container-xl flex-grow-1 container-p-y">
        <div class="row">

            <!-- Kartu 1 -->
            <div class="col-lg-4 col-md-6 col-12 mb-4 order-1">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('TemplateDashboard/assets/img/icons/unicons/wallet-info.png')}} "alt="Credit Card" class="rounded" />
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                            </div>
                        </div>
                        <h4>Jumlah Blok A :</h4>
                        <h4 class="card-title text-nowrap mb-1">{{ $countKapasitasBlokA }}</h4>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-4 order-1">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('TemplateDashboard/assets/img/icons/unicons/wallet-info.png')}} " alt="Credit Card" class="rounded" />
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                            </div>
                        </div>
                        <h4>Jumlah Blok B :</h4>
                        <h4 class="card-title text-nowrap mb-1">{{ $countKapasitasBlokB }}</h4>
                    </div>
                </div>
            </div>

            <!-- Kartu 2 -->
            <div class="col-lg-4 col-md-6 col-12 mb-4 order-1">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('TemplateDashboard/assets/img/icons/unicons/wallet-info.png')}} " alt="Credit Card" class="rounded" />
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                            </div>
                        </div>
                        <h4>Jumlah Blok C :</h4>
                        <h4 class="card-title text-nowrap mb-1">{{ $countKapasitasBlokC }}</h4>
                    </div>
                </div>
            </div>



            <!-- Tambahkan kartu lainnya di sini -->

        </div>
    </div>
@endsection
