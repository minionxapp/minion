<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WTransaksi extends Model
{
    protected $table='w_transaksi';
    protected $fillable = ['periode_kode','user_id','keterangan','masuk','keluar','id_trans'];
    
}
