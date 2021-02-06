<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    protected $table = "tb_alternatif";
    protected $primaryKey = "kode_alternatif";
    public $incrementing = false;
    protected $fillable = 
    [
        'kode_alternatif','nama_alternatif','alamat','jk'
    ];
}
