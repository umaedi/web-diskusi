@extends('layouts.app')
@push('css')
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
@endpush
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
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
        <div class="row">
            <div class="col-lg-6 mb-4 order-0">
                <h5 class="fw-bold"><i class='bx bx-image-add' ></i> Topik diskusi</h5>
                <div class="card mb-4">
                    <div class="card-body">
                        <img src="{{ asset('storage/'. $forum->img) }}" width="100%" alt="" class="">
                    </div>
                </div>
                <h5 class="fw-bold"><i class='bx bx-user'></i> Author</h5>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="nama_universitas">Nama Universitas</label>
                            <input type="text" class="form-control" id="nama_universitas" name="nama_universitas" value="{{ $forum->nama_universitas }}">
                            @error('nama_universitas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="nim">Nomor Induk Mahasiswa (NIM)</label>
                            <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" value="{{ $forum->nim }}">
                            @error('nim')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="nama_mahasiswa">Nama Mahasiswa</label>
                            <input type="text" class="form-control @error('nama_mahasiswa') is-invalid @enderror" id="nama_mahasiswa" name="nama_mahasiswa" value="{{ $forum->nama_mahasiswa }}">
                            @error('nama_mahasiswa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $forum->email }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="judul">Judul diskusi</label>
                            <input type="text" name="judul" value="{{ $forum->judul }}" class="form-control @error('judul') is-invalid @enderror">
                            @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="konten">Konten diskusi</label>
                            <input id="x" type="hidden" name="konten">
                            <trix-editor input="x">{!! $forum->konten !!}</trix-editor>
                            @error('konten')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <a href="/diskusi/edit/{{ $forum->id }}" class="btn btn-warning"><i class='bx bx-edit'></i> Edit</a>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class='bx bx-trash'></i> Hapus</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4 order-0">
                <h5 class="fw-bold"><i class='bx bxs-chat'></i> Posting diskusi</h5>
                @if (session('msg_forum'))
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading text-dark">Berhasil!</h4>
                            <p class="text-dark">{{ session('msg_forum') }}</p>
                        </div>
                    </div>
                </div>
                @endif
                <div class="card mb-4">
                    <form action="/forum-diskusi/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="diskusi_id" value="{{ $forum->id }}">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="nama_universitas">Nama Universitas</label>
                                <input type="text" class="form-control @error('nama_universitas') is-invalid @enderror" id="nama_universitas" name="nama_universitas" value="{{ old('nama_universitas') }}">
                                @error('nama_universitas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="nim">Nomor Induk Mahasiswa (NIM)</label>
                                <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" value="{{ old('nim') }}">
                                @error('nim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="nama_mahasiswa">Nama Mahasiswa</label>
                                <input type="text" class="form-control @error('nama_mahasiswa') is-invalid @enderror" id="nama_mahasiswa" name="nama_mahasiswa" value="{{ old('nama_mahasiswa') }}">
                                @error('nama_mahasiswa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="komentar">Komentar</label>
                                <input id="komentar" type="hidden" name="komentar">
                                <trix-editor input="komentar"></trix-editor>
                                @error('komentar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button class="btn btn-primary" type="submit"><i class='bx bx-paper-plane'></i> Posting</button>
                        </div>
                    </form>
                </div>
                <h5 class="fw-bold"><i class='bx bxs-chat'></i> Forum diskusi</h5>
                <div class="card">
                    <div class="card-body">
                        @forelse ($komentar as $komen)
                        <label class="mb-1" for="">{{strip_tags($komen->nama_mahasiswa) }} <i class='bx bx-badge-check'></i></label>
                        <div class="forum">
                           <div>{!! $komen->komentar!!}</div> 
                        </div>
                        @empty
                            <p class="text-center"><i class='bx bx-data' style="font-size: 100px"></i> <br> Belum ada diskusi</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
    <form action="/diskusi/destroy/{{ $forum->id }}" method="POST">
        @csrf
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus topik diskusi?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <label for="">ID Diskusi</label>
                <input type="text" class="form-control" name="id_forum" required>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
            </div>
        </div>
    </div>
    </form>
  </div>
</div>
@endsection