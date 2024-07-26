@extends('layouts.main')
@section('content')
<div class="card-header d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between">
    <h5 class="card-title m-0 me-2 h5"><i class='menu-icon bx bxs-bookmark-minus'></i> Informasi penelitain & pendidikan</h5>
    <a href="{{ route('main.informasi.create') }}" class="btn btn-primary mt-2 mt-md-0"><i class='bx bxs-message-square-add'></i> Buat informasi</a>
</div>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      @forelse ($informasi as $item)
      <div class="col-md-6 col-lg-4 mb-3">
        <div class="card h-100">
          <img class="card-img-top" src="{{ asset('storage/'. $item->img) }}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{ $item->judul }}</h5>
            <p class="card-text">
             <div>{!! $item->konten !!}</div>
            </p>
            <a href="/admin/informasi/show/{{ $item->id }}" class="btn btn-outline-primary"><i class='bx bx-folder-open'></i> Buka informasi</a>
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
</div>
@endsection