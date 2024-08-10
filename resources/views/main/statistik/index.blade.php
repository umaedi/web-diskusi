@extends('layouts.main')
@section('content')
<div class="card-header d-flex flex-column flex-md-row align-items-start align-items-md-center">
  <h5 class="card-title m-0 me-2 h5"> <i class='menu-icon bx bx-stats'></i> Statistik</h5>
  <a href="{{ route('main.kategori') }}" class="btn btn-primary mt-2 mt-md-0 ms-auto me-1">
      <i class='bx bx-left-arrow-alt'></i> Kembali
  </a>
  <a href="/admin/statistik/print" class="btn btn-primary mt-2 mt-md-0">
    Unduh topik<i class='bx bx-right-arrow-alt'></i>
  </a>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    {!! $chart->container() !!}
 
                    <script src="{{ $chart->cdn() }}"></script>
                
                    {{ $chart->script() }}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Topik diskusi</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">View</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($diskusi as $key => $item)
                          <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->kategori->nama_kategori }}</td>
                            <td>{{ $item->view }}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection