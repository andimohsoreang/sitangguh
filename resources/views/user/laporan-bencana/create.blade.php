@extends('partials.app', ['title' => '| Tambah Laporan Bencana'])
@section('section')
<div class="d-flex align-items-center gap-4 mb-3">
    <div>
        <a href="{{ route('user.laporanbencana') }}" class="btn icon btn-secondary"><i data-feather="arrow-left"></i></a>
    </div>
    <div>
        <h3 class="m-0">Laporan Bencana</h3>
        <p class="text-subtitle text- m-0">Form tambah laporan bencana.</p>
    </div>
</div>
<section class="section">
    <div class="row">
        <div class="col-6">            
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.store.laporanbencana') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="tanggal">Tanggal Kejadian</label>
                            <input type="date" id="tanggal" name="tanggal" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="waktu">Waktu Kejadian</label>
                            <input type="time" id="waktu" name="waktu" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="kronologi">Kronologi</label>
                            <textarea id="kronologi" name="kronologi" class="form-control" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="bukti">Bukti</label>
                            <input type="file" id="bukti" name="bukti" class="form-control">
                        </div>
                        <div class="form-group mb-0">
                            <button type="reset" class="btn btn-sm btn-light">Reset</button>
                            <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection