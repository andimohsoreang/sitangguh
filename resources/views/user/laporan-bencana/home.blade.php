@extends('partials.app', ['title' => '| Laporan Bencana'])
@section('section')
@include('sweetalert::alert')
<div class="d-flex align-items-center justify-content-between">
    <div>
        <h3>Daftar Laporan Bencana</h3>
        <p class="text-subtitle text-muted">Informasi laporan bencana.</p>
    </div>
    <div>
        <a href="{{ route('user.create.laporanbencana') }}" class="btn btn-sm btn-primary"><i data-feather="plus"></i> Tambah Laporan Bencana</a>
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
                    @foreach ($laporan_bencana as $lp)                        
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
                            <td>{{ $lp->petugas->name }}</td>
                            <td>
                                <form action="{{ route('user.destroy.laporanbencana', $lp->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('user.show.laporanbencana', $lp->id) }}" class="btn btn-sm icon btn-secondary">
                                        <i data-feather="eye"></i>
                                    </a>
                                    @if ($lp->read == 0)
                                        <a href="{{ route('user.edit.laporanbencana', $lp->id) }}" class="btn btn-sm icon btn-warning">
                                            <i data-feather="edit"></i>
                                        </a>  
                                    @endif
                                    <button type="submit" class="btn btn-sm icon btn-danger" onclick="return confirm('Yakin menghapus data ini?')">
                                        <i data-feather="trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection