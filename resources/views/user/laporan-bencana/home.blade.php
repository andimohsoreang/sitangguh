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
                        <th>Nama</th>
                        <th>Email</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($petugas as $p)                        
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->name }}</td>
                            <td>{{ $p->email }}</td>
                            <td>
                                <form action="{{ route('admin.destroy.petugas', $p->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('admin.edit.petugas', $p->id) }}" class="btn btn-sm icon btn-warning">
                                        <i data-feather="edit"></i>
                                    </a>
                                    <button type="submit" class="btn btn-sm icon btn-danger" onclick="return confirm('Yakin menghapus data ini?')">
                                        <i data-feather="trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection