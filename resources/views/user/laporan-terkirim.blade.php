@extends('partials.app', ['title' => '| Laporan Terkirim'])
@section('section')
<div class="d-flex align-items-center justify-content-between">
    <div>
        <h3>Daftar Laporan Terkirim</h3>
        <p class="text-subtitle text-muted">Informasi laporan terkirim.</p>
    </div>
</div>
<section class="section">
    @if ($laporan_bencana->count())
        <div class="row">
            @foreach ($laporan_bencana as $lb)            
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body p-0">
                        <img src="{{ asset($lb->bukti) }}" alt="" style="object-fit: cover;object-position: center;width: 100%;height: 200px;">
                        <div class="p-3">
                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($lb->kronologi), 120, '...') }}</p>
                            <table>
                                <tr>
                                    <td><p class="m-0 fw-bold small">Tanggal</p></td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><p class="m-0 small">{{ $lb->tanggal }}</p></td>
                                </tr>
                                <tr>
                                    <td><p class="m-0 fw-bold small">Jam</p></td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><p class="m-0 small">{{ $lb->waktu }}</p></td>
                                </tr>
                                <tr>
                                    <td><p class="m-0 fw-bold small">Kerusakan</p></td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><p class="m-0 small"></p></td>
                                </tr>
                                <tr>
                                    <td><p class="m-0 fw-bold small">Jumlah Kerugian</p></td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><p class="m-0 small"></p></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer p-3 border-top">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-1">
                                <span class="badge bg-success badge-pill badge-round px-0 py-1"><i data-feather="check-circle"></i></span>
                                <span>Selesai</span>
                            </div>
                            <div>
                                <a href="{{ route('user.show.laporanterkirim', $lb->id) }}" class="btn btn-sm icon btn-primary"><i data-feather="info"></i> Detail Laporan</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h1 class="mb-2  badge bg-danger badge-pill badge-round py-1 px-0"><i data-feather="alert-circle"></i></h1>
                        <h5 class="m-0">Daftar laporan terkirim tidak ditemukan.</h4>
                    </div>
                </div>
            </div>
        </div>
    @endif
</section>
@endsection