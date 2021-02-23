@extends('layouts.default')

@section('content')
    <div class="order">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Hasil Perhitungan </h4>
                    </div>
                </div>

<?php
class VIKOR
{
    function __construct($data, $atribut, $bobot, $index_vikor)
    {
        $this->data = $data;
        $this->atribut = $atribut;
        $this->bobot = $bobot;
        $this->index_vikor = $index_vikor;
        $this->minmax();
        $this->normalisasi();
        $this->terbobot();
        $this->total_sr();
        $this->nilai_sr();
        $this->nilai_v();
        $this->peringkat();
    }
    function peringkat()
    {
        $data = $this->nilai_v;
        asort($data);
        $no = 1;
        $this->rank = array();
        foreach ($data as $key => $value) {
            $this->rank[$key] = $no++;
        }
    }
    function nilai_v()
    {
        $this->nilai_v = array();
        foreach ($this->total_s as $key => $val) {
            $v = $this->index_vikor;
           
            $s = $this->total_s[$key];
          
            $r = $this->total_r[$key];
         
            $s_min = $this->nilai_s['max'];
           
            $s_plus = $this->nilai_s['min'];
            
            $r_min = $this->nilai_r['max'];
            
            $r_plus = $this->nilai_r['min'];
            

            //  $c = $v * ($s - $s_plus);
            //  $d = ($s_min - $s_plus) + (1 - $v) * ($r - $r_plus);
            //  $f = ($r_min - $r_plus);
            //  ($f==null) ? dd("null") : dd("tidak null");
            // dd($c." -- ".$d." -- ".$f);
            
            $this->nilai_v[$key] = (($r_min - $r_plus)==null) ? ($r_min - $r_plus) / $v * ($s - $s_plus) / ($s_min - $s_plus) + (1 - $v) * ($r - $r_plus) : ($r_min - $r_plus) / $v * ($s - $s_plus) / ($s_min - $s_plus) + (1 - $v) * ($r - $r_plus) / ($r_min - $r_plus) ;
        }
    }
    function nilai_sr()
    {
        $this->nilai_s['max'] = max($this->total_s);
        $this->nilai_s['min'] = min($this->total_s);
        $this->nilai_r['max'] = max($this->total_r);
        $this->nilai_r['min'] = min($this->total_r);
    }
    function total_sr()
    {
        foreach ($this->terbobot as $key => $val) {
            $this->total_s[$key] = array_sum($val);
            $this->total_r[$key] = max($val);
        }
    }
    function terbobot()
    {
        $arr = array();
        foreach ($this->normalisasi as $key => $val) {
            foreach ($val as $k => $v) {
                $arr[$key][$k] = $v * $this->bobot[$k];
            }
        }
        $this->terbobot = $arr;
    }
    function normalisasi()
    {
        $arr = array();
        foreach ($this->data as $key => $val) {
            foreach ($val as $k => $v) {
                $arr[$key][$k] = ($this->minmax[$k]['max'] - $v) / ($this->minmax[$k]['max'] - $this->minmax[$k]['min']);
            }
        }
        $this->normalisasi = $arr;
    }
    function minmax()
    {
        $arr = array();
        foreach ($this->data as $key => $val) {
            foreach ($val as $k => $v) {
                $arr[$k][$key] = $v;
            }
        }
        $arr2 = array();
        foreach ($arr as $key => $val) {
            if ($this->atribut[$key] == 'benefit') {
                $arr2[$key]['min'] = min($val);
                $arr2[$key]['max'] = max($val);
            } else {
                $arr2[$key]['min'] = max($val);
                $arr2[$key]['max'] = min($val);
            }
        }
        $this->minmax = $arr2;
    }
}
?>
<?php
// dd($rel_alternatif);
foreach ($kriterias as $key => $val) {
    $bobot[$key] = $val->bobot;
    $atribut_kriteria[$key] = $val->atribut;
}
$bobot  = [];
$atribut  = [];
foreach ($kriterias as $key => $val) {
    $bobot[$key] = $val->bobot;
    $atribut[$key] = $val->atribut;
}
$vikor = new VIKOR($rel_nilai, $atribut, $bobot, 0.5);

// dd($rel_nilai);
// echo '<pre>' . print_r($atribut, 1) . '</pre>';

?>
<div class="panel panel-info">
    <div class="panel-heading">
        <h6 class="panel-title">
            <a data-toggle="collapse" href="#matriks">
                Matriks
            </a>
        </h6>
    </div>
    &nbsp;
    <div class="table-responsive collapse" id="matriks">
        <table class="table table-bordered table-striped table-hover" >
            <thead>
                <tr>
                    <th>Kode Kriteria</th>
                    <th>Nama Alternatif</th>
                    <?php foreach ($kriterias as $key => $val) : ?>
                        <th><?= $val->nama_kriteria ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <?php
            $atribut = array();
            foreach ($kriterias as $key => $val) {
                $atribut[$key] = $val->atribut;
            }

            $vikor = new VIKOR($rel_nilai, $atribut, $bobot, 0.5);
            $minmax = array();
            foreach ($vikor->data as $key => $val) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <td><?= $alternatifs[$key] ?></td>
                    <?php foreach ($val as $k => $v) : $minmax[$k][$key] = $v ?>
                        <td><?= ($v) ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
            <tfoot>
                <tr>
                    <td colspan="2" class="text-right">Max</td>
                    <?php foreach ($vikor->minmax as $key => $val) : ?>
                        <td><?= ($val['max']) ?></td>
                    <?php endforeach ?>
                </tr>
                <tr>
                    <td colspan="2" class="text-right">Min</td>
                    <?php foreach ($vikor->minmax as $key => $val) : ?>
                        <td><?= ($val['min']) ?></td>
                    <?php endforeach ?>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<div class="panel panel-info">
    <div class="panel-heading">
        <h6 class="panel-title">
            <a data-toggle="collapse" href="#matriksNormal">
                Matriks Normalisasi
            </a>
        </h6>
    </div>
    &nbsp;
    <div class="table-responsive collapse" id="matriksNormal">
        <table class="table table-bordered table-striped table-hover" >
            <thead>
                <tr>
                    <th>Kode Kriteria</th>
                    <th>Nama Kriteria</th>
                    <?php foreach ($kriterias as $key => $val) : ?>
                        <th><?= $val->nama_kriteria ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <?php foreach ($vikor->normalisasi as $key => $val) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <td><?= $alternatifs[$key] ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= ($v) ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>


<div class="panel panel-info">
    <div class="panel-heading">
        <h6 class="panel-title">
            <a data-toggle="collapse" href="#terbobot">
                Mencari Nilai S & R
            </a>
        </h6>
    </div>
    &nbsp;
    <div class="table-responsive collapse" id="terbobot">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <?php foreach ($kriterias as $key => $val) : ?>
                        <th><?= $key ?></th>
                    <?php endforeach ?>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <td>Bobot Kriteria</td>
                    <?php foreach ($vikor->bobot as $key => $val) : ?>
                        <td><?= ($val) ?></td>
                    <?php endforeach ?>
                    <td>S</td>
                    <td>R</td>
                </tr>
            </thead>
            <?php foreach ($vikor->terbobot as $key => $val) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= ($v) ?></td>
                    <?php endforeach ?>
                    <td><?= ($vikor->total_s[$key]) ?></td>
                    <td><?= ($vikor->total_r[$key]) ?></td>
                </tr>
            <?php endforeach ?>
            <tfoot>
                <tr>
                    <td class="text-right" colspan="<?= count($kriterias) + 1 ?>">S*</td>
                    <td><?= ($vikor->nilai_s['max']) ?></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td class="text-right" colspan="<?= count($kriterias) + 1 ?>">S-</td>
                    <td><?= ($vikor->nilai_s['min']) ?></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td class="text-right" colspan="<?= count($kriterias) + 1 ?>">R*</td>
                    <td>&nbsp;</td>
                    <td><?= ($vikor->nilai_r['max']) ?></td>
                </tr>
                <tr>
                    <td class="text-right" colspan="<?= count($kriterias) + 1 ?>">R-</td>
                    <td>&nbsp;</td>
                    <td><?= ($vikor->nilai_r['min']) ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>


<div class="panel panel-info">
    <div class="panel-heading">
        <h6 class="panel-title">
            <a data-toggle="collapse" href="#rank">
                Pemeringkatan
            </a>
        </h6>
    </div>
    &nbsp;
    <div class="table-responsive collapse in" id="rank">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama Alternatif</th>
                    <th>Nilai Index Vikor</th>
                    <th>Peringkat</th>
                </tr>
            </thead>
            <?php foreach ($vikor->rank as $key => $val) :?>
                    <td><?= $alternatifs[$key] ?></td>
                    <td><?= ($vikor->nilai_v[$key]) ?></td>
                    <td><?= ($vikor->rank[$key]) ?></td>
                </tr>
                
            <?php endforeach ?>
        </table>
    </div>
</div>








            </div>
        </div>
    </div>
               
@endsection

