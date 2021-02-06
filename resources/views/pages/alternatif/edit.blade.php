@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Edit Data / </strong>
            <small>{{ $items->name }}</small>
        </div>
        <div class="card-body card-block">
            <form action="" method="POST">
                @csrf               
                @method('PUT')
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Lengkap</label>
                    <input type="text" 
                           name="name" 
                           value="{{ old('name') ? old('name') : $items->name }}"
                           class="form-control @error('name') is-invalid @enderror"/>
                    @error('name') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="type" class="form-control-label">Alamat</label>
                    <input type="text"
                           name="type"
                           value="{{ old('type') ? old('type') : $items->type }}"
                           class="form-control @error('type') is-invalid @enderror"/>
                    @error('type') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="description" class="form-control-label">Deskripsi Barang</label>
                    <textarea name="description"
                              rows="10"
                              class="ckeditor form-control @error('description') is-invalid @enderror"> {{ old('description') ? old('description') : $items->description }}
                    </textarea>
                    @error('description') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="price" class="form-control-label">Harga Barang</label>
                    <input type="number" 
                           name="price" 
                           value="{{ old('price') ? old('price') : $items->price }}"
                           class="form-control @error('price') is-invalid @enderror"/>
                    @error('price') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="quantity" class="form-control-label">Kuantitas Barang</label>
                    <input type="number" 
                           name="quantity" 
                           value="{{ old('quantity') ? old('quantity') : $items->quantity }}"
                           class="form-control @error('quantity') is-invalid @enderror"/>
                    @error('quantity') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Edit Barang</button>
                </div>
            </form>
        </div>
    </div>
@endsection