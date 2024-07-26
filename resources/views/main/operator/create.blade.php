@extends('layouts.main')
@section('content')
<div class="card-header d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between">
    <h5 class="card-title m-0 me-2 h5"> <i class="menu-icon bx bx-user"></i> List operator</h5>
    <a href="{{ route('main.operator.create') }}" class="btn btn-primary mt-2 mt-md-0"><i class="menu-icon bx bx-user"></i> Tambah operator</a>
</div>
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('main.operator.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">No tlp/WhatsApp</label>
                            <input type="text" class="form-control" name="no_tlp" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" class="form-control" name="password" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Role</label>
                            <select name="role" id="" class="form-control" required>
                                <option value="">--pilih role--</option>
                                <option value="admin">Admin</option>
                                <option value="admin">Operator</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection