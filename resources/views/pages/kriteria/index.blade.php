@extends('layouts.default')

@section('content')
    <div class="order">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Data Kriteria</h4>
                    </div>
                    <a href="{{ route('kriteria.create') }}" class="btn btn-info btn-sm">
                            <i class="fa fa-plus-square"></i>
                            Tambah Data
                    </a>
                    &nbsp
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Kriteria</th>
                                        <th>Nama Kriteria</th>
                                        <th>Atribut</th>
                                        <th>Bobot</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @forelse ($kriteria as $no => $item)
                                  <tr>
                                    <td>{{ $no+1 }}</td>
                                    <td>{{ $item->kode_kriteria }}</td>
                                    <td>{{ $item->nama_kriteria }}</td>
                                    <td>{{ $item->atribut }}</td>
                                    <td>{{ $item->bobot }}</td>
                                    <td>
                                        <a href="{{ route('kriteria.edit', $item->kode_kriteria) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="{{ route('kriteria.destroy', $item->kode_kriteria) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                    </tr>
                                  @empty
                                      <tr>
                                          <td colspan="6" class="text-center p-5">
                                              Data Tidak Tersedia
                                          </td>
                                      </tr>
                                  @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
