<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WMember extends Model
{
    //
    protected $fillable = ['periode_kode','user_id', 'user_name','divisi_kode','divisi_nama',
    'departemen_kode','departemen_nama','sawal','sakhir','status' ];
}
