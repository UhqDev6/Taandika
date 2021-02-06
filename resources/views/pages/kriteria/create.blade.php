@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Data Kriteria</strong>
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
            <form action="{{route('kriteria.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Kode kriteria</label>
                    <input type="text" 
                           name="kode_kriteria" 
                           value="{{ old('kode_kriteria') }}"
                           class="form-control @error('kode_kriteria') is-invalid @enderror"/>
                    @error('kode_kriteria') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama kriteria</label>
                    <input type="text" 
                           name="nama_kriteria" 
                           value="{{ old('nama_kriteria') }}"
                           class="form-control @error('nama_kriteria') is-invalid @enderror"/>
                    @error('nama_kriteria') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
               
                <div class="form-group">
                    <label for="type" class="form-control-label">Attribut</label>
                    <select class="form-control @error('atribut') is-invalid @enderror" name="atribut">
                        @foreach($atributs as $key => $val)
                        @if($key==old('atribut'))
                        <option value="{{$key}}" selected="">{{$val}}</option>
                        @else
                        <option value="{{$key}}">{{$val}}</option>
                        @endif
                        @endforeach
                    </select>
                    @error('atribut') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="name" class="form-control-label">Bobot</label>
                    <input type="text" 
                           name="bobot" 
                           value="{{ old('bobot') }}"
                           class="form-control @error('bobot') is-invalid @enderror"/>
                    @error('bobot') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection