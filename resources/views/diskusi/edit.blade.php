@extends('layouts.app')
@push('css')
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
@endpush
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <form action="/diskusi/update/{{ $diskusi->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-4 mb-4 order-0">
                <h5 class="fw-bold"><i class='bx bx-image-add' ></i> Gambar</h5>
                <div class="card mb-4">
                    <div class="card-body">
                        <img src="{{ asset('storage/'. $diskusi->img) }}" width="100%" alt="" class="">
                        <input type="file" class="form-control" name="img">
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mb-4 order-0">
                {{ $diskusi->id_forum }}
                <h5 class="fw-bold"><i class='bx bxs-chat'></i> Edit diskusi</h5>
                @if (session('success'))
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading text-dark">Berhasil!</h4>
                            <p class="text-dark">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
                @endif
                @if (session('error'))
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading text-dark">Gagal!</h4>
                            <p class="text-dark">{{ session('error') }}</p>
                        </div>
                    </div>
                </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="id">ID Forum</label>
                            <input type="text" name="id_forum" class="form-control @error('id_forum') is-invalid @enderror">
                            @error('id_forum')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="nama_universitas">Nama Universitas</label>
                            <input type="text" class="form-control @error('nama_universitas') is-invalid @enderror" id="nama_universitas" name="nama_universitas" value="{{ $diskusi->nama_universitas }}">
                            @error('nama_universitas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="nim">Nomor Induk Mahasiswa (NIM)</label>
                            <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" value="{{  $diskusi->nim }}">
                            @error('nim')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="nama_mahasiswa">Nama Mahasiswa</label>
                            <input type="text" class="form-control @error('nama_mahasiswa') is-invalid @enderror" id="nama_mahasiswa" name="nama_mahasiswa" value="{{  $diskusi->nama_mahasiswa }}">
                            @error('nama_mahasiswa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{  $diskusi->email }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="judul">Judul diskusi</label>
                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{  $diskusi->judul }}">
                            @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="konten">Konten diskusi</label>
                            <input id="x" type="hidden" name="konten">
                            <trix-editor input="x">{!!  $diskusi->konten !!}</trix-editor>
                            @error('konten')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button class="btn btn-primary" type="submit"><i class='bx bx-paper-plane'></i> Simpan perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection