@extends('admin.partials.app')
@section('section')
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Verifikasi Bencana</h3>
        <p class="text-subtitle text-muted">Informasi laporan bencana yang baru masuk dari user !.</p>
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class='breadcrumb-header'>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Datatable</li>
            </ol>
        </nav>
    </div>
</div>
</div>
<section class="section">
    <div class="card">
        <div class="card-header">
            Simple Datatable
        </div>
        <div class="card-body">
            <table class='table table-striped' id="table1">
                <thead>
                    <tr>
                        <th>Jenis Bencana</th>
                        <th>Kronologi</th>
                        <th>Kerusakan</th>
                        <th>Jumlah kerugian</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Status</th>
                        <th class="w-1">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Kebakaran</td>
                        <td>Kronologi 1</td>
                        <td>-</td>
                        <td>-</td>
                        <td>10 November</td>
                        <td>10:00 WITA</td>
                        <td>
                            <span class="badge bg-danger">Belum ditangani</span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary">
                                Detail Laporan </span>
                            </button>
                            <button type="button" class="btn btn-warning">
                                Tangani Laporan </span>
                            </button>
                            <button type="button" class="btn btn-danger">
                                Tolak Laporan</span>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Kebakaran</td>
                        <td>Kronologi 1</td>
                        <td>-</td>
                        <td>-</td>
                        <td>10 November</td>
                        <td>10:00 WITA</td>
                        <td>
                            <span class="badge bg-danger">Belum ditangani</span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary">
                                Detail Laporan 
                            </button>
                            <button type="button" class="btn btn-warning">
                                Tangani Laporan
                            </button>
                            <button type="button" class="btn btn-danger">
                                Tolak Laporan</span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
</div>

@endsection