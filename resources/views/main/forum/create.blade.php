@extends('layouts.main')
@push('css')
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.1/ckeditor5.css" />
<style>
    .ck-editor__editable_inline {
        min-height: 180px;
    }
</style>
@endpush
@section('content')
<div class="card-header d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between">
    <h5 class="card-title m-0 me-2 h5"><i class='menu-icon bx bxs-bookmark-minus'></i> Informasi</h5>
    <a href="{{ route('main.topik.create') }}" class="btn btn-primary mt-2 mt-md-0"><i class='bx bx-left-arrow-alt'></i> Kembali</a>
</div>
<div class="content-wrapper">
    <div class="container">
        <form action="/topik/store" method="POST" enctype="multipart/form-data">
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
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" name="content" id="editor">
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
@push('js')
<script type="importmap">
    {
        "imports": {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/42.0.1/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/42.0.1/"
        }
    }
</script>
<script type="module">
    import {
        ClassicEditor,
        Essentials,
        Bold,
        Italic,
        Font,
        Paragraph
    } from 'ckeditor5';

    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            plugins: [ Essentials, Bold, Italic, Font, Paragraph ],
            toolbar: {
                items: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                ]
            }
        } )
        .then( /* ... */ )
        .catch( /* ... */ );
</script>
@endpush