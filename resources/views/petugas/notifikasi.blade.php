@extends('partials.app', ['title' => '| Notifikasi'])
@section('section')
@include('sweetalert::alert')
<div class="d-flex align-items-center justify-content-between">
    <div>
        <h3>Notifikasi</h3>
        <p class="text-subtitle text-muted">Daftar laporan bencana yang belum diverifikasi.</p>
    </div>
</div>
<section class="section">
    @if ($laporan_bencana->count())
    <div class="row">
        @foreach ($laporan_bencana as $lb)    
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card @if($lb->darurat == 1) border border-danger @endif">
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
                    <div class="d-flex align-items-center flex-column flex-wrap gap-3">
                        <div class="d-flex gap-2">
                            <div class="d-flex align-items-center gap-1">
                                <span class="badge bg-secondary badge-pill badge-round px-0 py-1"><i data-feather="clock"></i></span>
                                <span>Tunggu</span>
                            </div>
                            @if ($lb->darurat == 1)                                
                                <div class="d-flex align-items-center gap-1">
                                    <span class="badge bg-danger badge-pill badge-round px-0 py-1"><i data-feather="alert-triangle"></i></span>
                                    <span>Darurat</span>
                                </div>
                            @endif
                        </div>
                        <div class="d-flex gap-2">
                            <a href="{{ route('petugas.show.notifikasi', $lb->id) }}" class="btn btn-sm icon btn-primary"><i data-feather="info"></i> Detail Laporan</a>
                            <form action="{{ route('petugas.tangani', $lb->id) }}" method="post" onsubmit="return confirm('Konfirmasi untuk tangani laporan.')">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-sm icon btn-success"><i data-feather="check-circle"></i> Tangani Laporan</button>
                            </form>
                            <button type="button" class="btn btn-sm icon btn-danger" data-bs-toggle="modal" data-bs-target="#modalTolak{{ $lb->id }}"><i data-feather="x-circle"></i> Tolak Laporan</button>
                            {{-- <form action="{{ route('petugas.tolak', $lb->id) }}" method="post" onsubmit="return confirm('Konfirmasi untuk tolak laporan.')">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-sm icon btn-danger"><i data-feather="x-circle"></i> Tolak Laporan</button>
                            </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalTolak{{ $lb->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Penolakan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('petugas.tolak', $lb->id) }}" method="post" onsubmit="return confirm('Konfirmasi untuk tolak laporan.')">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="fw-bold">Kronologi</label>
                                <p>{{ $lb->kronologi }}</p>
                            </div>
                            <div class="form-group">
                                <label class="fw-bold">Tanggal</label>
                                <p>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $lb->tanggal)->isoFormat('D MMMM Y')  }}</p>
                            </div>
                            <div class="form-group">
                                <label class="fw-bold">Kejadian</label>
                                <p>{{ $lb->waktu }}</p>
                            </div>
                            <div class="form-group">
                                <label class="fw-bold">Alasan Laporan Ditolak</label>
                                <textarea name="alasan" class="form-control" rows="5" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Kirim Penolakan</button>
                        </div>
                    </form>
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
                    <h5 class="m-0">Daftar laporan bencana tidak ditemukan.</h4>
                </div>
            </div>
        </div>
    </div>
    @endif
</section>
@endsection