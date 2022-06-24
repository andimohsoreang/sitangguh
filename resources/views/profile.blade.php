@extends('partials.app', ['title' => '| Profile'])
@section('section')
@include('sweetalert::alert')
<div class="d-flex align-items-center gap-4 mb-3">
    <div>
        <a href="{{ back() }}" class="btn icon btn-secondary"><i data-feather="arrow-left"></i></a>
    </div>
    <div>
        <h3 class="m-0">Profile</h3>
    </div>
</div>
<section class="section">
    <div class="row">
        <div class="col-12 col-lg-6">            
            <div class="card">
                <div class="card-body">
                    @role('user')
                    <form action="{{ route('user.update.profile', Auth::user()->id) }}" method="post">
                    @endrole
                    @role('petugas')
                    <form action="{{ route('petugas.update.profile', Auth::user()->id) }}" method="post">
                    @endrole
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Nama</label>
                            <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_telp">Nomor Telepon</label>
                            <input type="text" id="no_telp" name="no_telp" value="{{ Auth::user()->no_telp }}" class="form-control @error('no_telp') is-invalid @enderror">
                            @error('no_telp')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3">{{ Auth::user()->alamat }}</textarea>
                            @error('alamat')
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
        <div class="col-12 col-lg-6">            
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0 fw-bold">Update Password</h6>
                </div>
                <div class="card-body">
                    @role('user')
                    <form action="{{ route('user.update.password', Auth::user()->id) }}" method="post">
                    @endrole
                    @role('petugas')
                    <form action="{{ route('petugas.update.password', Auth::user()->id) }}" method="post">
                    @endrole
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="password_sekarang">Password Sekarang</label>
                            <input type="password" id="password_sekarang" name="password_sekarang" class="form-control @error('password_sekarang') is-invalid @enderror">
                            @error('password_sekarang')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_baru">Password Baru</label>
                            <input type="password" id="password_baru" name="password_baru" class="form-control @error('password_baru') is-invalid @enderror">
                            @error('password_baru')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="konrimasi_password">Konfirmasi Password Baru</label>
                            <input type="password" id="konrimasi_password" name="konrimasi_password" class="form-control @error('konrimasi_password') is-invalid @enderror">
                            @error('konrimasi_password')
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