@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Edit Data Sub Kriteria / </strong>

        </div>
        <div class="card-body card-block">
            <form action="{{ route ('sub.update',$sub->kode_sub) }}" method="POST">
                @csrf               
                @method('PUT')
                <div class="form-group">
                    <label for="name" class="form-control-label">Kode Sub Kriteria</label>
                    <input type="text" 
                           name="kode_sub" 
                           value="{{ old('kode_sub') ? old('kode_sub') : $sub->kode_sub }}"
                           readonly=""
                           class="form-control @error('kode_sub') is-invalid @enderror"/>
                    @error('kode_sub') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="type" class="form-control-label">Kode Kriteria</label>
                    <select class="form-control @error('kode_kriteria') is-invalid @enderror" name="kode_kriteria">
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
                    <label for="type" class="form-control-label">Nama Sub Kriteria</label>
                    <input type="text"
                           name="nama_sub"
                           value="{{ old('nama_sub') ? old('nama_sub') : $sub->nama_sub }}"
                           class="form-control @error('nama_sub') is-invalid @enderror"/>
                    @error('nama_sub') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="type" class="form-control-label">Nilai</label>
                    <input type="text"
                           name="nilai"
                           value="{{ old('nilai') ? old('nilai') : $sub->nilai }}"
                           class="form-control @error('nilai') is-invalid @enderror"/>
                    @error('nilai') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
        
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection