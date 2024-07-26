@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-6 mb-4 order-0">
        <h5 class="fw-bold"><i class='bx bxs-bookmark-minus'></i> Informasi penelitian</h5>
        <div class="card mb-4">
            <div class="card-body">
                <img loading="lazy" src="{{ asset('storage/'. $informasi->img) }}" width="100%" alt="" class="">
                <h5 class="card-title">{{ $informasi->judul }}</h5>
                <div>{!! $informasi->konten !!}</div>
            </div>
        </div>
        <h5 class="fw-bold"><i class='bx bxs-chat'></i> Forum diskusi</h5> 
        <div class="card">
            <div class="card-body">
                @forelse ($comments as $comment)
                <label class="mb-1" for="">{{ $comment->nama_mahasiswa }} <i class='bx bx-badge-check'></i></label>
                <div class="forum">
                    {{ $comment->komentar }}
                </div>
                @empty
                    <p class="text-center"><i class='bx bx-data' style="font-size: 100px"></i> <br> Belum ada diskusi</p>
                @endforelse
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
        <div class="card">
            <form action="/informasi/store" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group mb-3">
                        <input type="hidden" name="informasi_id" value="{{ $informasi->id }}">
                        <label for="nama_universitas">Nama Universitas</label>
                        <input type="hidden" name="topic_id" value="1">
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
                        <textarea name="komentar" rows="5" class="form-control @error('komentar') is-invalid @enderror">{{ old('komentar') }}</textarea>
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
      </div>
    </div>
</div>
@endsection