@extends('layouts.default')

@section('content')
    <div class="order">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Masukkan Pilihan Alternatif</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <form action="{{ route('perhitungan.store') }}" method="POST" id="form1">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{$kode_alternatif}}" name="kode_alternatif" />
                    <div class="list-group">
                        <div class="list-group-item">
                            <label>
                                <input type="checkbox" id="selectAll" /> Pilih Semua
                            </label>
                        </div>
                        <?php foreach ($alternatifs as $key => $val) : ?>
                            <div class="list-group-item">
                                <label>
                                    <input class="ck" type="checkbox" name="selected[<?= $key ?>]" value="<?= $key ?>" /> <?= $val ?>
                                </label>
                            </div>
                        <?php endforeach ?>
                    </div>
                    &nbsp;
                    &nbsp;
                    <div class="panel-footer">
                        <button class="btn btn-primary hitung"><i class="glyphicon glyphicon-signal"></i> Menghitung </button>
                    </div>
            </form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#form1 #selectAll").click(function(){
            $("#form1 input[type='checkbox']").prop('checked', this.checked);
        });
    });
</script>


@endsection

