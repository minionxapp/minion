<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WDaftarBayar extends Model
{
    protected $table ='w_daftar_bayar';
    protected $fillable = ['judul','keterangan','status','jml_total','tgl_pembayaran'];
}
