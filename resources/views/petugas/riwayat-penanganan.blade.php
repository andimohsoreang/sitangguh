@extends('partials.app', ['title' => '| Riwayat Penanganan'])
@section('section')
<div class="d-flex align-items-center justify-content-between">
    <div>
        <h3>Riwayat Penanganan</h3>
        <p class="text-subtitle text-muted">Daftar laporan bencana yang telah selesai ditangani.</p>
    </div>
</div>
<div class="section">
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
                                <td><p class="m-0 small">{{ $lb->kerusakan }}</p></td>
                            </tr>
                            <tr>
                                <td><p class="m-0 fw-bold small">Jumlah Kerugian</p></td>
                                <td>&nbsp;:&nbsp;</td>
                                <td><p class="m-0 small">{{ $lb->kerugian }}</p></td>
                            </tr>
                            <tr>
                                <td><p class="m-0 fw-bold small">Petugas</p></td>
                                <td>&nbsp;:&nbsp;</td>
                                <td><p class="m-0 small">{{ $lb->petugas->name }}</p></td>
                            </tr>
                            <tr>
                                <td><p class="m-0 fw-bold small">Pelapor</p></td>
                                <td>&nbsp;:&nbsp;</td>
                                <td><p class="m-0 small">{{ $lb->user->name }}</p></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card-footer p-3 border-top">
                    <div class="d-flex align-items-center flex-column flex-wrap gap-3">
                        <div class="d-flex gap-2">
                            @if ($lb->status == "selesai")                            
                                <div class="d-flex align-items-center gap-1">
                                    <span class="badge bg-success badge-pill badge-round px-0 py-1"><i data-feather="check"></i></span>
                                    <span>Selesai</span>
                                </div>
                            @else
                                <div class="d-flex align-items-center gap-1">
                                    <span class="badge bg-danger badge-pill badge-round px-0 py-1"><i data-feather="x"></i></span>
                                    <span>Ditolak</span>
                                </div>
                            @endif
                            @if ($lb->darurat == 1)
                                <div class="d-flex align-items-center gap-1">
                                    <span class="badge bg-danger badge-pill badge-round px-0 py-1"><i data-feather="alert-triangle"></i></span>
                                    <span>Darurat</span>
                                </div>
                            @endif
                        </div>
                        <div class="d-flex gap-2">
                            <a href="{{ route('petugas.show.riwayat', $lb->id) }}" class="btn btn-sm icon btn-primary"><i data-feather="info"></i> Detail Laporan</a>
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
                    <h5 class="m-0">Daftar laporan bencana yang sudah ditangani tidak ditemukan.</h4>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection