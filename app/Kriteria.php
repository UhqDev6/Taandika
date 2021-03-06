<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table = 'tb_kriteria';
    protected $primaryKey = 'kode_kriteria';
    public $incrementing = false;
    protected $fillable = [
        'kode_kriteria',
        'nama_kriteria',
        'bobot',
        'atribut'
    ];
}
