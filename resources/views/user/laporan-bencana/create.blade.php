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
        <div class="col-12 col-lg-6">            
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.store.laporanbencana') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="tanggal">Tanggal Kejadian</label>
                            <input type="date" id="tanggal" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror"  value="{{  date('Y-m-d') }}" readonly>
                            @error('tanggal')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="waktukejadian">Waktu Kejadian</label>
                            <input type="text" id="waktukejadian" name="waktu" class="form-control @error('waktu') is-invalid @enderror" readonly>
                            @error('waktu')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kronologi">Kronologi</label>
                            <textarea id="kronologi" name="kronologi" class="form-control @error('kronologi') is-invalid @enderror" rows="10"></textarea>
                            @error('kronologi')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-9">
                                    <label for="lokasi">Lokasi Bencana</label>
                                    <input type="text" id="lokasi" name="lokasi" class="form-control @error('lokasi') is-invalid @enderror">
                                    <span class="small d-flex aling-items-center gap-1 mt-1"><i data-feather="info" width="14"></i> Dari google maps</span>
                                    @error('lokasi')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-3">
                                    <a href="https://www.google.co.id/maps/" target="_blank" class="btn icon btn-primary btn-block"><i data-feather="search"></i> Cari Lokasi</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bukti">Bukti</label>
                            <input type="file" id="bukti" name="bukti" class="form-control @error('bukti') is-invalid @enderror">
                            @error('bukti')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class='form-check'>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input form-check-danger form-check-glow" name="darurat" id="darurat">
                                    <label class="form-check-label" for="darurat">Darurat ?</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3 mb-0">
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

@section('scripts')
<script>
    const tgl = new Date();
    const jam = tgl.getHours();
    const menit = tgl.getMinutes();
    const detik = tgl.getSeconds();
    $('#waktukejadian').attr('value', `${jam}:${menit}:${detik}`);
</script>
@endsection