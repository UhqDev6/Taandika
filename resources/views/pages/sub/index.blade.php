@extends('layouts.default')

@section('content')
    <div class="order">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Data Sub Kriteria</h4>
                    </div>
                    <a href="{{ route('sub.create') }}" class="btn btn-info btn-sm">
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
                                        <th>Kode Sub Kriteria</th>
                                        <th>Nama Kriteria</th>
                                        <th>Nama Sub Kritereia</th>
                                        <th>Nilai</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @forelse ($subs as $no => $item)
                                  <tr>
                                    <td>{{ $no+1 }}</td>
                                    <td>{{ $item->kode_sub }}</td>
                                    <td>{{ $item->nama_kriteria }}</td>
                                    <td>{{ $item->nama_sub }}</td>
                                    <td>{{ $item->nilai }}</td>
                                    <td>
                                        <a href="{{ route('sub.edit', $item->kode_sub) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="{{ route('sub.destroy', $item->kode_kriteria) }}" method="POST" class="d-inline">
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
