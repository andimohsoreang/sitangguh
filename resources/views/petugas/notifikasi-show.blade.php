@extends('partials.app', ['title' => '| Detail Laporan Bencana'])
@section('section')
<div class="d-flex align-items-center gap-4 mb-3">
    <div>
        <a href="{{ url()->previous() }}" class="btn icon btn-secondary"><i data-feather="arrow-left"></i></a>
    </div>
    <div>
        <h3 class="m-0">Laporan Bencana</h3>
        <p class="text-subtitle text- m-0">Detail laporan bencana.</p>
    </div>
</div>
<section class="section">
    <div class="row">
        <div class="col-12 col-lg-6">            
            <div class="card">
                <div class="card-body p-0">
                    <img src="{{ asset($lpb->bukti) }}" alt="bukti" width="100%">
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">            
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <h5>Kronologi</h5>
                        <p class="m-0">{{ $lpb->kronologi }}</p>
                    </div>
                    <div class="form-group">
                        <h5>Tanggal Kejadian</h5>
                        <p class="m-0">{{ $lpb->tanggal }}</p>
                    </div>
                    <div class="form-group">
                        <h5>Waktu Kejadian</h5>
                        <p class="m-0">{{ $lpb->waktu }}</p>
                    </div>
                    <div class="form-group">
                        <h5>Lokasi</h5>
                        <a href="{{ $lpb->url_gmaps }}" class="btn icon btn-primary" target="_blank"><i data-feather="map"></i></a>
                    </div>
                    <div class="form-group">
                        <h5>Status</h5>
                        @if ($lpb->status == "tunggu")
                            <span class="badge bg-secondary">Tunggu</span>
                        @elseif ($lpb->status == "proses")
                            <span class="badge bg-info">Proses</span>
                        @elseif ($lpb->status == "tolak")
                            <span class="badge bg-danger">Ditolak</span>
                        @else
                            <span class="badge bg-success">Selesai</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <h5>Petugas</h5>
                        <p class="m-0">{{ $lpb->petugas->name ?? '' }}</p>
                    </div>
                    <div class="form-group">
                        <h5>Pelapor</h5>
                        <p class="m-0">{{ $lpb->user->name }}</p>
                    </div>
                </div>
                @if ($lpb->darurat == 1)    
                <div class="card-footer p-0">
                    <div class="d-block bg-danger text-center py-2">
                        <h6 class="m-0 text-white">Darurat</h6>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection