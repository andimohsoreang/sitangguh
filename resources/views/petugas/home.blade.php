@extends('partials.app', ['title' => '| Dashboard'])
@section('section')
<div class="d-flex align-items-center justify-content-between">
    <div>
        <h3>Dashboard</h3>
    </div>
</div>
<section class="section">
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="card bg-primary">
                <div class="card-body p-4">
                    <div class="d-flex flex-column">
                        <div class='px-3 d-flex align-items-center justify-content-between'>
                            <div>
                                <h3 class='card-title m-0 mb-1 text-white'>Total Laporan</h3>
                            </div>
                            <div class="card-right d-flex align-items-center">
                                <h1 class="m-0 text-white" style="font-size: 80px;">{{ $lb_total }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card bg-danger">
                <div class="card-body p-4">
                    <div class="d-flex flex-column">
                        <div class='px-3 d-flex align-items-center justify-content-between'>
                            <div>
                                <h3 class='card-title m-0 mb-1 text-white'>Laporan di Tolak</h3>
                                <a href="{{ route('petugas.verifikasi') }}" class="text-white small"><span data-feather="chevron-right"></span> Selengkapnya</a>
                            </div>
                            <div class="card-right d-flex align-items-center">
                                <h1 class="m-0 text-white" style="font-size: 80px;">{{ $lb_tolak }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card bg-info">
                <div class="card-body p-4">
                    <div class="d-flex flex-column">
                        <div class='px-3 d-flex align-items-center justify-content-between'>
                            <div>
                                <h3 class='card-title m-0 mb-1 text-white'>Laporan di Proses</h3>
                                <a href="{{ route('petugas.verifikasi') }}" class="text-white small"><span data-feather="chevron-right"></span> Selengkapnya</a>
                            </div>
                            <div class="card-right d-flex align-items-center">
                                <h1 class="m-0 text-white" style="font-size: 80px;">{{ $lb_proses }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card bg-success">
                <div class="card-body p-4">
                    <div class="d-flex flex-column">
                        <div class='px-3 d-flex align-items-center justify-content-between'>
                            <div>
                                <h3 class='card-title m-0 mb-1 text-white'>Laporan Selesai</h3>
                                <a href="{{ route('petugas.riwayat') }}" class="text-white small"><span data-feather="chevron-right"></span> Selengkapnya</a>
                            </div>
                            <div class="card-right d-flex align-items-center">
                                <h1 class="m-0 text-white" style="font-size: 80px;">{{ $lb_selesai }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection