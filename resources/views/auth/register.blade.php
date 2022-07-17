@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-7 col-sm-12 mx-auto">
        <div class="card pt-4">
            <div class="card-body">
                <div class="text-center mb-2">
                    <img src="{{ asset('be/assets/images/bpbdlogo.png') }}" height="100" class='mb-3'>
                    <h2 class="mb-2 text-new-warning fw-bold">SITANGGUH</h2>
                    <h3>Registrasi</h3>
                    <p>Silahkan isi formulir registrasi.</p>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
                                @error('name')                                    
                                    <div class="alert alert-light-danger color-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror">
                                @error('email')                                    
                                    <div class="alert alert-light-danger color-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="no_telp">Nomor Telepon</label>
                                <input type="text" name="no_telp" id="no_telp" class="form-control @error('no_telp') is-invalid @enderror">
                                @error('no_telp')                                    
                                    <div class="alert alert-light-danger color-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror">
                                @error('alamat')                                    
                                    <div class="alert alert-light-danger color-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                                @error('password')                                    
                                    <div class="alert alert-light-danger color-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="password_confirmation">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                                @error('password_confirmation')                                    
                                    <div class="alert alert-light-danger color-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between">
                        <a class="text-new-dark" href="{{ route('login') }}">Sudah punya akun? Login</a>
                        <div class="clearfix">
                            <button type="submit" class="btn btn-danger float-end" style="background-color: #ff990b;border-color: #ff990b;">Registrasi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection