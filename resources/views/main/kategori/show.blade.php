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
    {{-- <div class="card"> --}}
        {{-- <div class="card-body"> --}}
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
                      <a href="/admin/diskusi/show/{{ $item->id }}" class="btn btn-outline-primary"><i class='bx bx-folder-open'></i> Buka diskusi</a>
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
        {{-- </div> --}}
    {{-- </div> --}}
</div>
@endsection