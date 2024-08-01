@extends('layouts.main')
@section('content')
<div class="card-header d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between">
    <h5 class="card-title m-0 me-2 h5"> <i class="menu-icon bx bx-user"></i> Form kategori</h5>
    <a href="{{ route('main.kategori') }}" class="btn btn-primary mt-2 mt-md-0"><i class='bx bx-left-arrow-alt'></i> Kembali</a>
</div>
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="/admin/kategori/update/{{ $kategori->id }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="">Nama kategori</label>
                            <input type="text" class="form-control" name="nama_kategori" required value="{{ $kategori->nama_kategori }}">
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection