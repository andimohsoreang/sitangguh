@extends('partials.app', ['title' => '| Laporan Bencana'])
@section('section')
@include('sweetalert::alert')
<div class="d-flex align-items-center justify-content-between">
    <div>
        <h3>Daftar Laporan Bencana - 
            @if (request()->routeIs('laporan.tunggu'))
                 Tunggu
            @elseif (request()->routeIs('laporan.tolak'))
                 Tolak
            @elseif (request()->routeIs('laporan.proses'))
                 Proses
            @elseif (request()->routeIs('laporan.selesai'))
                 Selesai
            @endif
        </h3>
        <p class="text-subtitle text-muted">Informasi laporan bencana.</p>
    </div>
</div>
<section class="section">
    <div class="card">
        <div class="card-body">
            <table class='table table-striped' id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kronologi</th>
                        <th>Bukti</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Dilihat</th>
                        <th>Petugas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lpb as $lp)                        
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ \Illuminate\Support\Str::limit(strip_tags($lp->kronologi), 60, '...') }}</td>
                            <td>
                                <div class="image-link">
                                    <a href="{{ asset($lp->bukti) }}" class="btn btn-sm btn-primary" target="_blank"><i data-feather="image"></i></a>
                                </div>
                            </td>
                            <td><a href="{{ $lp->url_gmaps }}" class="btn btn-sm btn-primary" target="_blank"><i data-feather="map"></i></a></td>
                            <td>
                                @if ($lp->status == "tunggu")
                                    <span class="badge bg-secondary">Tunggu</span>
                                @elseif ($lp->status == "proses")
                                    <span class="badge bg-info">Proses</span>
                                @elseif ($lp->status == "tolak")
                                    <span class="badge bg-danger">Ditolak</span>
                                @else
                                    <span class="badge bg-success">Selesai</span>
                                @endif
                            </td>
                            <td>
                                @if ($lp->read == 0)
                                    <span class="badge bg-danger badge-pill badge-round px-0 py-1"><i data-feather="circle"></i></span>
                                @else
                                    <span class="badge bg-success badge-pill badge-round px-0 py-1"><i data-feather="circle"></i></span>
                                @endif
                            </td>
                            <td>{{ $lp->petugas->name ?? '-' }}</td>
                            <td>
                                <a href="{{ route('laporan.show', $lp->id) }}" class="btn btn-sm icon btn-secondary">
                                    <i data-feather="eye"></i> Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection