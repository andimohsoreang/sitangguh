@extends('partials.app', ['title' => '| Rekap Laporan'])
@section('section')
@include('sweetalert::alert')
<div class="d-flex align-items-center justify-content-between">
    <div>
        <h3>Rekap Laporan</h3>
        <p class="text-subtitle text-muted">Rekap laporan bencana.</p>
    </div>
</div>
<div class="section">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card bg-primary">
                <div class="card-body text-center">
                    <span class="badge bg-white text-primary badge-pill badge-round px-0 py-1"><i data-feather="download"></i></span>
                    <h5 class="m-0 mt-2 mb-3 text-white">
                        Download Data
                        Laporan Bencana
                    </h5>
                    <a href="{{ route('rekap.semua') }}" class="btn btn-dark btn-block">Download</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card bg-info">
                <div class="card-body text-center">
                    <span class="badge bg-white text-info badge-pill badge-round px-0 py-1"><i data-feather="download"></i></span>
                    <h5 class="m-0 mt-2 mb-3 text-white">
                        Download Data
                        Laporan Bencana Berdasarkan Status
                    </h5>
                    <form action="{{ route('rekap.perstatus') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <select name="status" class="form-control">
                                <option value="">--Pilih Status--</option>
                                <option value="selesai">Selesai</option>
                                <option value="proses">Diproses</option>
                                <option value="tolak">Ditolak</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-dark btn-block">Download</button>
                    </form>
                </div>
            </div>
        </div>
        {{-- <div class="col-12 col-md-4">
            <a href="">
                <div class="card bg-success">
                    <div class="card-body text-center">
                        <span class="badge bg-white text-success badge-pill badge-round px-0 py-1"><i data-feather="download"></i></span>
                        <h5 class="m-0 mt-2 text-white">
                            Download Data <br>
                            Laporan Bencana Berdasarkan Bulan
                        </h5>
                    </div>
                </div>
            </a>
        </div> --}}
    </div>
</div>
@endsection