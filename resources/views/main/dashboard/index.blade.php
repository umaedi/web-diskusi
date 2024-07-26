@extends('layouts.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-12 mb-4 order-0">
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
          <div class="d-flex align-items-end row">
            <div class="col-sm-7">
              <div class="card-body">
                <h5 class="card-title text-primary">Selamat datang {{ auth()->user()->nama }}</h5>
                <p class="mb-4">
                  Ini adalah dashboard forum diskusi, dimana Anda dapat mengelola topik diskusi dan membalas diskusi 
                </p>

                <a href="/admin/profile/{{ auth()->user()->id }}" class="btn btn-sm btn-outline-primary">Lihat profile</a>
              </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4">
                <img
                  src="{{ asset('img') }}/illustrations/man-with-laptop-light.png"
                  height="150"
                  alt="View Badge User"
                  data-app-dark-img="illustrations/man-with-laptop-dark.png"
                  data-app-light-img="illustrations/man-with-laptop-light.png"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   
    <div class="row">
      <div class="container">
       <div class="divider">
         <div class="divider-text">Informasi Penelitian dan Pendidikan</div>
       </div>
      </div>
      @forelse ($informasi as $item)
      <div class="col-md-6 col-lg-4 mb-3">
        <div class="card h-100">
          <img class="card-img-top" src="{{ asset('storage/'.$item->img) }}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{ $item->judul }}</h5>
            <p class="card-text">
             <div>{!! $item->konten !!}</div>
            </p>
            <form action="/admin/informasi/destroy/{{ $item->id }}" method="POST">
              @method('DELETE')
              @csrf
              <a href="/admin/informasi/show/{{ $item->id }}" class="btn btn-outline-primary"><i class='bx bx-folder-open'></i> Buka informsi</a>
              <button type="submit" onclick="return confirm('Yakin hapus informasi ini?')" class="btn btn-outline-danger">Hapus</button>
            </form>
          </div>
        </div>
      </div>
      @empty
      <div class="text-center">
        <i class='bx bx-data' style="font-size: 100px"></i>
        <p>Belum ada informasi</p>
      </div>
      @endforelse
     </div>
    <div class="row">
      <div class="container">
       <div class="divider">
         <div class="divider-text">Topik Diskusi</div>
       </div>
      </div>
      @forelse ($diskusi as $item)
      <div class="col-md-6 col-lg-4 mb-3">
        <div class="card h-100">
          <img class="card-img-top" src="{{ asset('storage/'.$item->img) }}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{ $item->judul }}</h5>
            <p class="card-text">
             <div>{!! $item->konten !!}</div>
            </p>
            <form action="/admin/diskusi/destroy/{{ $item->id }}" method="POST">
            <a href="/admin/informasi/show/{{ $item->id }}" class="btn btn-outline-primary"><i class='bx bx-folder-open'></i> Buka diskusi</a>
              @csrf
              <button class="btn btn-outline-danger" onclick="return confirm('Yakin hapus topik ini?')">Hapus</button>
            </form>
          </div>
        </div>
      </div>
      @empty
      <div class="text-center">
        <i class='bx bx-data' style="font-size: 100px"></i>
        <p>Belum ada topik diskusi</p>
      </div>
      @endforelse
     </div>
  </div>
@endsection