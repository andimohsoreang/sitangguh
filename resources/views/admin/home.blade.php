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
                                <h1 class="m-0 text-white" style="font-size: 80px;">{{ $lpb_total }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card bg-secondary">
                <div class="card-body p-4">
                    <div class="d-flex flex-column">
                        <div class='px-3 d-flex align-items-center justify-content-between'>
                            <div>
                                <h3 class='card-title m-0 mb-1 text-white'>Laporan di Tunggu</h3>
                                <a href="{{ route('laporan.tunggu') }}" class="text-white small"><span data-feather="chevron-right"></span> Selengkapnya</a>
                            </div>
                            <div class="card-right d-flex align-items-center">
                                <h1 class="m-0 text-white" style="font-size: 80px;">{{ $lpb_tunggu }}</h1>
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
                                <a href="{{ route('laporan.tolak') }}" class="text-white small"><span data-feather="chevron-right"></span> Selengkapnya</a>
                            </div>
                            <div class="card-right d-flex align-items-center">
                                <h1 class="m-0 text-white" style="font-size: 80px;">{{ $lpb_tolak }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-8">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card bg-info">
                        <div class="card-body p-4">
                            <div class="d-flex flex-column">
                                <div class='px-3 d-flex align-items-center justify-content-between'>
                                    <div>
                                        <h3 class='card-title m-0 mb-1 text-white'>Laporan di Proses</h3>
                                        <a href="{{ route('laporan.proses') }}" class="text-white small"><span data-feather="chevron-right"></span> Selengkapnya</a>
                                    </div>
                                    <div class="card-right d-flex align-items-center">
                                        <h1 class="m-0 text-white" style="font-size: 80px;">{{ $lpb_proses }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="col-12 col-md-6">
                    <div class="card bg-success">
                        <div class="card-body p-4">
                            <div class="d-flex flex-column">
                                <div class='px-3 d-flex align-items-center justify-content-between'>
                                    <div>
                                        <h3 class='card-title m-0 mb-1 text-white'>Laporan Selesai</h3>
                                        <a href="{{ route('laporan.selesai') }}" class="text-white small"><span data-feather="chevron-right"></span> Selengkapnya</a>
                                    </div>
                                    <div class="card-right d-flex align-items-center">
                                        <h1 class="m-0 text-white" style="font-size: 80px;">{{ $lpb_selesai }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card bg-light">
                        <div class="card-body p-4">
                            <div class="d-flex flex-column">
                                <div class='px-3 d-flex align-items-center justify-content-between'>
                                    <div>
                                        <h3 class='card-title m-0 mb-1 text-white'>Total Petugas</h3>
                                        {{-- <a href="{{ route('laporan.proses') }}" class="text-white small"><span data-feather="chevron-right"></span> Selengkapnya</a> --}}
                                    </div>
                                    <div class="card-right d-flex align-items-center">
                                        <h1 class="m-0 text-white" style="font-size: 80px;">{{ $lpb_petugas }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="col-12 col-md-6">
                    <div class="card bg-warning">
                        <div class="card-body p-4">
                            <div class="d-flex flex-column">
                                <div class='px-3 d-flex align-items-center justify-content-between'>
                                    <div>
                                        <h3 class='card-title m-0 mb-1 text-white'>Total Masyarakat</h3>
                                        {{-- <a href="{{ route('laporan.selesai') }}" class="text-white small"><span data-feather="chevron-right"></span> Selengkapnya</a> --}}
                                    </div>
                                    <div class="card-right d-flex align-items-center">
                                        <h1 class="m-0 text-white" style="font-size: 80px;">{{ $lpb_masyarakat }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4 d-flex align-items-stretch">
            {{-- <div class="card w-100">
                <div class="card-body p-4">
                    <div class="d-flex flex-column">
                        <div class='px-3 d-flex align-items-center justify-content-between'>
                            <div>
                                <h3 class='card-title m-0 mb-1 text-white'>Total Masyarakat</h3>
                            </div>
                            <div class="card-right d-flex align-items-center">
                                <h1 class="m-0 text-white" style="font-size: 80px;"></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

    

</section>
@endsection