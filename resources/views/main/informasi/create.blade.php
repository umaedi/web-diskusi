@extends('layouts.main')
@push('css')
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
<style>
    trix-editor {
        min-height: 10em !important;
    }
</style>
@endpush
@section('content')
<div class="card-header d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between">
    <h5 class="card-title m-0 me-2 h5"><i class='menu-icon bx bxs-bookmark-minus'></i> Informasi & penelitian</h5>
    <a href="{{ route('main.informasi') }}" class="btn btn-primary mt-2 mt-md-0"><i class='bx bx-left-arrow-alt'></i> Kembali</a>
</div>
<div class="content-wrapper">
    <div class="container">
        <form action="/admin/informasi/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                        <input type="file" class="form-control" name="img">
                        <img src="{{ asset('img/forum/forum1.jpg') }}" width="100%" alt="Gambar">
                    </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-8 mb-3">
                    @if (session('succeess'))
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="alert alert-success" role="alert">
                                <h4 class="alert-heading text-dark">Berhasil!</h4>
                                <p class="text-dark">{{ session('succeess') }}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <input id="x" type="hidden" name="konten">
                                <trix-editor input="x"></trix-editor>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection