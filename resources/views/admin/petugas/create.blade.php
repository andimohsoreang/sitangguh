@extends('partials.app', ['title' => '| Tambah Petugas'])
@section('section')
<div class="d-flex align-items-center gap-4 mb-3">
    <div>
        <a href="{{ route('admin.petugas') }}" class="btn icon btn-secondary"><i data-feather="arrow-left"></i></a>
    </div>
    <div>
        <h3 class="m-0">Tambah Petugas</h3>
        <p class="text-subtitle text- m-0">Form tambah petugas.</p>
    </div>
</div>
<section class="section">
    <div class="row">
        <div class="col-12 col-lg-6">            
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.store.petugas') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control">
                            @error('email') 
                                <div class="alert alert-danger ">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control">
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