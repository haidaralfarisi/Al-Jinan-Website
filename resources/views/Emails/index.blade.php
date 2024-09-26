<!DOCTYPE html>
<html>
<head>
    <title>Status Pendaftaran</title>
</head>
<body>
    <h1>Status Pendaftaran Anda</h1>

    @if ($status == 'Pending')
        <p>{{ $emailMessage }}</p>
        <p>{{ $status }}</p>
        <h3>Untuk Pembayaran Permohonan Pemaakaaman bisa ke Nomor Rekening berikut : </h3>
        <h4><strong>5371760000123456</strong></h4>
        <h4>Abdul Gofur Nasir</h4>
    @endif

    @if ($status == 'Diterima')
        <p>{{ $emailMessage }}</p>
        <p>{{ $status }}</p>
        <h3>Terimakasih Sudah Mempercayai Pemakaman Kami</h3>
    @endif

    @if ($status == 'Ditolak')
        <p>{{ $emailMessage }}</p>
        <p>{{ $status }}</p>
    @endif


</body>
</html>
