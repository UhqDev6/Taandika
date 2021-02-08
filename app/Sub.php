<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub extends Model
{
    protected $table = 'tb_sub';
    protected $primaryKey = 'kode_sub';
    public $incrementing = false;
    protected $fillable = ['kode_kriteria','nama_sub','nilai'];
}
