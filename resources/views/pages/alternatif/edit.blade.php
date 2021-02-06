@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Edit Data Alternatif / </strong>
            <small>{{ $data->nik }}</small>
        </div>
        <div class="card-body card-block">
            <form action="{{ route ('alternatif.update',$data->kode_alternatif) }}" method="POST">
                @csrf               
                @method('PUT')
                <div class="form-group">
                    <label for="name" class="form-control-label">Kode Alternatif</label>
                    <input type="text" 
                           name="kode_alternatif" 
                           value="{{ old('kode_alternatif') ? old('kode_alternatif') : $data->kode_alternatif }}"
                           readonly=""
                           class="form-control @error('kode_alternatif') is-invalid @enderror"/>
                    @error('kode_alternatif') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="type" class="form-control-label">No Kartu Keluarga</label>
                    <input type="text"
                           name="nokk"
                           value="{{ old('nokk') ? old('nokk') : $data->nokk }}"
                           class="form-control @error('nokk') is-invalid @enderror"/>
                    @error('nokk') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="type" class="form-control-label">No Nik</label>
                    <input type="text"
                           name="nik"
                           value="{{ old('nik') ? old('nik') : $data->nik }}"
                           class="form-control @error('nokk') is-invalid @enderror"/>
                    @error('nik') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="type" class="form-control-label">Nama Lengkap</label>
                    <input type="text"
                           name="nama_alternatif"
                           value="{{ old('nama_alternatif') ? old('nama_alternatif') : $data->nama_alternatif }}"
                           class="form-control @error('nama_alternatif') is-invalid @enderror"/>
                    @error('nama_alternatif') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="type" class="form-control-label">Tempat Lahir</label>
                    <input type="text"
                           name="tempat_lahir"
                           value="{{ old('tempat_lahir') ? old('tempat_lahir') : $data->tempat_lahir }}"
                           class="form-control @error('nama_alternatif') is-invalid @enderror"/>
                    @error('tempat_lahir') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="type" class="form-control-label">Alamat</label>
                    <input type="text"
                           name="alamat"
                           value="{{ old('alamat') ? old('alamat') : $data->alamat }}"
                           class="form-control @error('alamat') is-invalid @enderror"/>
                    @error('alamat') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
               
                <div class="form-group">
                    <label for="price" class="form-control-label">Jenis Kelamin</label>
                    <input type="text" 
                           name="jk" 
                           value="{{ old('jk') ? old('jk') : $data->jk }}"
                           class="form-control @error('jk') is-invalid @enderror"/>
                    @error('jk') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
        
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection