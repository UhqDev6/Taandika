@extends('layouts.default')

@section('content')
    <div class="order">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Data alternatif</h4>
                    </div>
                    <a href="{{ route('alternatif.create') }}" class="btn btn-info btn-sm">
                            <i class="fa fa-plus-square"></i>
                            Tambah Data
                    </a>
                    &nbsp
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Kode Alternatif</th>
                                        <th>No Kartu Keluarga</th>
                                        <th>No Nik</th>
                                        <th>Nama Alternatif</th>
                                        <th>Tempat Lahir</th>
                                        <th>Alamat</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @forelse ($data as $no => $item)
                                  <tr>
                                    <td>{{ $item->kode_alternatif }}</td>
                                    <td>{{ $item->nokk }}</td>
                                    <td>{{ $item->nik }}</td>
                                    <td>{{ $item->nama_alternatif }}</td>
                                    <td>{{ $item->tempat_lahir }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->jk }}</td>
                                    <td>
                                        <a href="{{ route('alternatif.edit', $item->kode_alternatif) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="{{ route('alternatif.destroy', $item->kode_alternatif) }}" method="POST" class="d-inline">
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