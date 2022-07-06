@extends('partials.app', ['title' => '| Verifikasi Bencana'])
@section('section')
<div class="d-flex align-items-center gap-4 mb-3">
    <div>
        <a href="{{ route('petugas.verifikasi') }}" class="btn icon btn-secondary"><i data-feather="arrow-left"></i></a>
    </div>
    <div>
        <h3 class="m-0">Verifikasi Bencana</h3>
        <p class="text-subtitle text- m-0">Form laporan bencana yang akan di beri tindakan.</p>
    </div>
</div>
<section class="section">
    <div class="row">
        <div class="col-12 col-lg-6">            
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('petugas.update.verifikasiform', $lpb->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="tanggal">Tanggal Kejadian</label>
                            <input type="date" id="tanggal" name="tanggal" value="{{ $lpb->tanggal }}" class="form-control @error('tanggal') is-invalid @enderror" readonly>
                        </div>
                        <div class="form-group">
                            <label for="waktukejadian">Waktu Kejadian</label>
                            <input type="text" id="waktukejadian" name="waktu" value="{{ $lpb->waktu }}" class="form-control @error('waktu') is-invalid @enderror" readonly>
                        </div>
                        <div class="form-group">
                            <label for="kronologi">Kronologi</label>
                            <textarea id="kronologi" name="kronologi" class="form-control @error('kronologi') is-invalid @enderror" rows="8">{{ $lpb->kronologi }}</textarea>
                            @error('kronologi')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kerusakan">Kerusakan</label>
                            <textarea id="kerusakan" name="kerusakan" class="form-control @error('kerusakan') is-invalid @enderror" rows="8"></textarea>
                            @error('kerusakan')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kerugian">Jumlah Kerugian</label>
                            <input type="text" id="kerugian" name="kerugian" class="form-control @error('kerugian') is-invalid @enderror">
                            @error('kerugian')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3 mb-0">
                            <button type="reset" class="btn btn-sm btn-light">Reset</button>
                            <button type="submit" class="btn btn-sm btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection