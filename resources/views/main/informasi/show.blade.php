@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-6 mb-4 order-0">
        <h5 class="fw-bold"><i class='bx bxs-bookmark-minus'></i> Informasi penelitian & pendidikan</h5>
        <div class="card mb-4">
            <div class="card-body">
                <img src="{{ asset('storage/' . $informasi->img ) }}" width="100%" alt="" class="">
                <h5 class="card-title">{{ $informasi->judul }}</h5>
                <div>{!! $informasi->konten !!}</div>
            </div>
        </div>
        <a href="/admin/informasi/edit/{{ $informasi->id }}" class="btn btn-warning mb-3">Edit informasi</a>
        <h5 class="fw-bold"><i class='bx bxs-chat'></i> Komentar</h5>
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
        <h5 class="fw-bold"><i class='bx bxs-chat'></i> Posting komentar</h5>
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
        <div class="card">
            <form action="/admin/komentar/store" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="nama_mahasiswa">Anda sebagai</label>
                        <input type="hidden" name="informasi_id" value="{{ $informasi->id }}">
                        <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" value="{{ auth()->user()->nama . ' | ' . auth()->user()->role}}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="komentar">Jawaban Anda</label>
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