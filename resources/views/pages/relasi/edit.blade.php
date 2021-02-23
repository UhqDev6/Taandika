@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Penilaian Alternatif</strong>
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
            <form action="{{ route('relasi.update', $alternatif->kode_alternatif) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Kode Alternatif</label>
                    <input type="text" 
                           name="kode_alternatif" 
                           value="{{ old('kode_alternatif', $alternatif->kode_alternatif) }}" readonly=""
                           class="form-control @error('kode_alternatif') is-invalid @enderror"/>
                    @error('kode_alternatif') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Alternatif</label>
                    <input type="text" 
                           name="nama_alternatif" 
                           value="{{ old('nama_alternatif',$alternatif->nama_alternatif) }}" readonly
                           class="form-control @error('nama_alternatif') is-invalid @enderror"/>
                    @error('nama_alternatif') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                @foreach($subs as $key => $val)
                <div class="form-group">
                    <label for="type" class="form-control-label">{{ $kriterias[$key] }}<span class="text-danger">*</span></label>
                    <select class="form-control @error('nilai') is-invalid @enderror "  name="nilai[{{ $key }}]">
                        <option value="">Pilih</option>
                        @foreach($val as $k => $v)
                        @if($k==old('nilai.'.$key, $nilais[$key]))
                        <option value="{{$k}}" selected="">{{$v}}</option>
                        @else
                        <option value="{{$k}}">{{$v}}</option>
                        @endif
                        @endforeach
                    </select>
                    @error('nilai') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                @endforeach

                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection