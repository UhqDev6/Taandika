@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Data Sub Kriteria</strong>
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
            <form action="{{route('sub.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Kode Sub kriteria</label>
                    <input type="text" 
                           name="kode_sub" 
                           value="{{ old('kode_sub') }}"
                           class="form-control @error('kode_sub') is-invalid @enderror"/>
                    @error('kode_sub') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama kriteria</label>
                    <select class="form-control  @error('nama_kriteria') is-invalid @enderror" name="kode_kriteria">
                    @foreach($kriterias as $row)
                    @if($row->kode_kriteria==old('kode_kriteria'))
                    <option value="{{$row->kode_kriteria}}" selected="">{{$row->nama_kriteria}}</option>
                    @else
                    <option value="{{$row->kode_kriteria}}">{{$row->nama_kriteria}}</option>
                    @endif
                    @endforeach
                </select>
                    @error('nama_kriteria') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Sub kriteria</label>
                    <input type="text" 
                           name="nama_sub" 
                           value="{{ old('nama_sub') }}"
                           class="form-control @error('nama_sub') is-invalid @enderror"/>
                    @error('nama_sub') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
             

                <div class="form-group">
                    <label for="name" class="form-control-label">Nilai</label>
                    <input type="text" 
                           name="nilai" 
                           value="{{ old('nilai') }}"
                           class="form-control @error('nilai') is-invalid @enderror"/>
                    @error('nilai') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection