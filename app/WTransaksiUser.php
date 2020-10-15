<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WTransaksiUser extends Model
{
    protected $table='w_transaksi_user';
    protected $fillable = ['periode_kode','user_id',
    'jenis','keterangan','mulai','akhir','lokasi',
    'jml_training','jml_lain','jml_total','file1','file2','file3'];
    
}
