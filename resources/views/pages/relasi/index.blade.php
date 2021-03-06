@extends('layouts.default')

@section('content')
    <div class="order">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Penilaian</h4>
                    </div>

                <div class="panel-body">
			    <div class="panel panel-default">
				<div class="panel-heading">
					<form action="{{ route('relasi.index') }}" class="form-inline" method="POST">
						{{ csrf_field() }}
						<div class="form-group">
							<select class="form-control" name="kode_alternatif">
								<option value="">Pilih Alternatif</option>
								@foreach($alternatifs as $key => $val)
								@if($key==old('kode_alternatif'))
								<option value="{{$key}}" selected="">{{$val}}</option>
								@else
								<option value="{{$key}}">{{$val}}</option>
								@endif
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambahkan </button>
						</div>
					</form>
				</div>
                </div>
                </div>
                &nbsp
				<div class="card-body--">
                    <div class="table-stats order-table ov-h">
                    <table class="table">
                                <thead>
                                    <tr>
                                        <th>Kode Alternatif</th>
                                        <th>Nama Alternatif</th>
                                        @foreach($kriterias as $key => $val)
                                        <th>{{ $val }}</th>
                                        @endforeach
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @forelse ($nilais as $key => $val)
                                  <tr>
                                    <td>{{ $key }}</td>
                                    <td>{{ $alternatifs[$key] }}</td>
                                    @foreach($val as $k => $v)
                                    <td><?= isset($subs[$v]) ? $subs[$v] : '' ?></td>
                                    @endforeach
                                    <td>
                                        <a href="{{ route('relasi.edit', $key) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="{{ URL("relasi/$key?kode_alternatif=$kode_alternatif") }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
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
