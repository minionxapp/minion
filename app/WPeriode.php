<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WPeriode extends Model
{
    protected $table='w_periode';
    protected $fillable = ['id','kode','nama','descripsi','awal','akhir','sawal','sakhir','status' ];
}

