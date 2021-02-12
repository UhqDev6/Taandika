<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waktu extends Model
{
    protected $table = 'tb_waktu';
    protected $primaryKey = 'kode_waktu';
    public $incrementing = false;
    protected $fillable = [
        'kode_waktu', 'nama_waktu', 'bobot'
    ];
}
