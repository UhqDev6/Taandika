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
                <form action="{{ route('perhitungan.store') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{$kode_alternatif}}" name="kode_alternatif" />
                    <div class="list-group">
                        <div class="list-group-item">
                            <label>
                                <input type="checkbox" id="checkAll" /> Pilih Semua Item
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
                        <div class="panel-footer">
                            <button class="btn btn-primary hitung" ><i class="glyphicon glyphicon-signal"></i>Menghitung</button>
                        </div>
                </form>


    <script>
        $(function() {
            $("#checkAll").click(function() {
                $('input:checkbox').not(this).prop('checked', this.checked);
            });
            $('input[type=checkbox]').click(function() {
                var total = 0;
                $('.ck').each(function(key, val) {
                    if ($(val).prop('checked')) {
                        total++;
                    }
                });
                $('.hitung').prop('disabled', total < 2);
            });
    
        });
    </script>
@endsection

