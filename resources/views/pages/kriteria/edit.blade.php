@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Edit Data Kriteria / </strong>
            <!-- <small>{{ $data->nik }}</small> -->
        </div>
        <div class="card-body card-block">
            <form action="{{ route ('kriteria.update',$data->kode_kriteria) }}" method="POST">
                @csrf               
                @method('PUT')
                <div class="form-group">
                    <label for="name" class="form-control-label">Kode Kriteria</label>
                    <input type="text" 
                           name="kode_kriteria" 
                           value="{{ old('kode_kriteria') ? old('kode_kriteria') : $data->kode_kriteria }}"
                           readonly=""
                           class="form-control @error('kode_kriteria') is-invalid @enderror"/>
                    @error('kode_kriteria') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="type" class="form-control-label">Nama Kriteria</label>
                    <input type="text"
                           name="nama_kriteria"
                           value="{{ old('nama_kriteria') ? old('nama_kriteria') : $data->nama_kriteria }}"
                           class="form-control @error('nama_kriteria') is-invalid @enderror"/>
                    @error('nama_kriteria') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="type" class="form-control-label">Atribut</label>
                    <input type="text"
                           name="atribut"
                           value="{{ old('atribut') ? old('atribut') : $data->atribut }}"
                           class="form-control @error('atribut') is-invalid @enderror"/>
                    @error('atribut') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="type" class="form-control-label">Bobot</label>
                    <input type="text"
                           name="bobot"
                           value="{{ old('bobot') ? old('bobot') : $data->bobot }}"
                           class="form-control @error('bobot') is-invalid @enderror"/>
                    @error('bobot') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
        
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection