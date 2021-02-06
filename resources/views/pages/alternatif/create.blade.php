@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Data Barang</strong>
        </div>
        <div class="card-body card-block">
        @if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
            <form action="{{route('alternatif.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Kode Alternatif</label>
                    <input type="text" 
                           name="kode_alternatif" 
                           value="{{ old('kode_alternatif') }}"
                           class="form-control @error('kode_alternatif') is-invalid @enderror"/>
                    @error('kode_alternatif') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="type" class="form-control-label">Nama Lengkap</label>
                    <input type="text"
                           name="nama_alternatif"
                           value="{{ old('nama_alternatif') }}"
                           class="form-control @error('nama_alternatif') is-invalid @enderror"/>
                    @error('nama_alternatif') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="type" class="form-control-label">Alamat</label>
                    <input type="text"
                           name="alamat"
                           value="{{ old('alamat') }}"
                           class="form-control @error('alamat') is-invalid @enderror"/>
                    @error('alamat') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="type" class="form-control-label">Jenis Kelamin</label>
                    <input type="text"
                           name="jk"
                           value="{{ old('jk') }}"
                           class="form-control @error('jk') is-invalid @enderror"/>
                    @error('jk') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Tambah Barang</button>
                </div>
            </form>
        </div>
    </div>
@endsection