@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Data Barang</strong>
        </div>
        <div class="card-body card-block">
            <form action="" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Lengkap</label>
                    <input type="text" 
                           name="name" 
                           value="{{ old('name') }}"
                           class="form-control @error('name') is-invalid @enderror"/>
                    @error('name') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="type" class="form-control-label">Alamat</label>
                    <input type="text"
                           name="type"
                           value="{{ old('type') }}"
                           class="form-control @error('type') is-invalid @enderror"/>
                    @error('type') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Tambah Barang</button>
                </div>
            </form>
        </div>
    </div>
@endsection