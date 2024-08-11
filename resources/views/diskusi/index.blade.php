@extends('layouts.app')
@push('css')
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
@endpush
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <form action="/diskusi/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-4 mb-4 order-0">
                <h5 class="fw-bold"><i class='bx bx-image-add' ></i> Gambar</h5>
                <div class="card mb-4">
                    <div class="card-body">
                        <img src="{{ asset('img/forum/forum1.jpg') }}" width="100%" alt="" class="">
                        <input type="file" class="form-control" name="img">
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mb-4 order-0">
                <h5 class="fw-bold"><i class='bx bxs-chat'></i> Posting diskusi</h5>
                @if (session('msg_forum'))
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading text-dark">Berhasil!</h4>
                            <p class="text-dark">{{ session('msg_forum') }}</p>
                            <hr>
                            <p class="text-dark">Silakan catat ID-FORUM Anda agar Anda dapat mengedit dan menghapus forum</p>
                        </div>
                    </div>
                </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="nama_universitas">Kategori topik diskusi</label>
                            <select name="id_kategori" class="form-control">
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                @endforeach
                            </select>
                            @error('nama_universitas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
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
                            <label for="judul">Judul diskusi</label>
                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror">
                            @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="konten">Konten diskusi</label>
                            <input id="x" type="hidden" name="konten">
                            <trix-editor input="x"></trix-editor>
                            @error('konten')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button class="btn btn-primary" type="submit"><i class='bx bx-paper-plane'></i> Posting</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@push('js')
<script>
    document.addEventListener("trix-attachment-add", function(event) {
        if (event.attachment.file) {
            uploadFileAttachment(event.attachment);
        }
    });

    function uploadFileAttachment(attachment) {
        const file = attachment.file;
        const formData = new FormData();
        formData.append('file', file);

        fetch('{{ route('user.trix.upload') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            attachment.setAttributes({
                url: data.url,
                href: data.url
            });
        })
        .catch(error => {
            console.error('Error uploading file:', error);
        });
    }
</script>
@endpush