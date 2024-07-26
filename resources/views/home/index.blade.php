@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-12 mb-4 order-0">
        <div class="card">
          <div class="d-flex align-items-end row">
              <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="{{ asset('img/backgrounds/bg-1.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="{{ asset('img/backgrounds/bg-2.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="{{ asset('img/backgrounds/bg-3.jpg') }}" class="d-block w-100" alt="...">
                    </div>
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
        <img loading="lazy" class="card-img-top" src="{{ asset('storage/'.$item->img) }}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{ $item->judul }}</h5>
          <div class="card-text mb-3">
            {!! $item->konten !!}
          </div>
          <a href="/informasi/{{ $item->id }}" class="btn btn-outline-primary"><i class='bx bx-folder-open'></i> Buka informasi</a>
          <a href="//api.whatsapp.com/send?phone=&amp;text={{ $item->judul }}%20%2D%20{{ url('informasi/'.$item->id) }}" target="_blank" class="btn btn-outline-primary"><i class='bx bxl-whatsapp'></i> Bagikan</a>
        </div>
      </div>
    </div>
     @empty
     <div class="col-md-12 text-center">
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
        @if (session('success'))
        <div class="alert alert-primary">{{ session('success') }}</div>
        @endif
      </div>
      @forelse ($diskusi as $item)
      <div class="col-md-6 col-lg-4 mb-3">
        <div class="card h-100">
          <img loading="lazy" class="card-img-top" src="{{ asset('storage/'.$item->img) }}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{ $item->judul }}</h5>
            <p class="card-text">
              {!! $item->konten !!}
            </p>
            <a href="/forum-diskusi/{{ $item->id }}" class="btn btn-outline-primary"><i class='bx bx-folder-open'></i> Buka diskusi</a>
            <a href="//api.whatsapp.com/send?phone=&amp;text={{ $item->judul }}%20%2D%20{{ url('forum-diskusi/'.$item->id) }}" class="btn btn-outline-primary"><i class='bx bxl-whatsapp'></i> Bagikan</a>
          </div>
        </div>
      </div>
      @empty
      <div class="col-md-12 text-center">
        <i class='bx bx-data' style="font-size: 100px"></i>
        <p>Belum ada topik diskusi</p>
      </div>
      @endforelse
      <!--/ Order Statistics -->
    </div>
    <div class="col-md-12 text-center">
      <a href="{{ route('posting-diskusi') }}" class="btn btn-primary"><i class='bx bx-message-dots'></i> Posting diskusi</a>
    </div>
  </div>
@endsection