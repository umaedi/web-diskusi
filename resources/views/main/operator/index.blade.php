@extends('layouts.main')
@section('content')
<div class="card-header d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between">
    <h5 class="card-title m-0 me-2 h5"> <i class="menu-icon bx bx-user"></i> List operator</h5>
    <a href="{{ route('main.operator.create') }}" class="btn btn-primary mt-2 mt-md-0"><i class="menu-icon bx bx-user"></i> Tambah operator</a>
</div>
<div class="container-xxl flex-grow-1">
    @if (session('success'))
    <div class="alert alert-primary">{{ session('success') }}</div>
    @endif
    <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table">
            <thead>
                <tr class="text-nowrap">
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No Tlp/WhatsApp</th>
                <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $key => $user)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->no_tlp }}</td>
                    <td>
                        <a href="/admin/profile/{{ $user->id }}" class="btn btn-primary btn-sm">Lihat</a>
                        <a onclick="return confirm('Hapus data ini?')" href="/admin/operator/delete/{{ $user->id }}" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                    @empty
                </tr>
                @endforelse
            </tbody>
            </table>
        </div>
    </div>
</div>
@endsection