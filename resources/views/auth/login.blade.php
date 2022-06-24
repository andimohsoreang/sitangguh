@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-7 col-sm-12 mx-auto">
        <div class="card pt-4">
            <div class="card-body">
                <div class="text-center mb-2">
                    <img src="{{ asset('be/assets/images/bpbdlogo.png') }}" height="100" class='mb-3'>
                    <h2 class="mb-2 text-danger fw-bold">SITANGGUH</h2>
                    <h3>Login</h3>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row">
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
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                                @error('password')                                    
                                    <div class="alert alert-light-danger color-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between">
                        <a class="color-danger" href="{{ route('register') }}">Belum punya akun? Register</a>
                        <div class="clearfix">
                            <button type="submit" class="btn btn-danger float-end">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
