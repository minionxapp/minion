<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WTransaksiUser extends Model
{
    protected $table='w_transaksi_user';
    protected $fillable = ['periode_kode','user_id',
    'jenis','keterangan','mulai','akhir','lokasi',
    'jml_training','jml_lain','jml_total','file1','file2','file3',
    'status','approve_by','tgl_pengajuan','tgl_approve','nik_atasan','nama_atasan','tgl_atasan_approve',
    'file1_jwb','file2_jwb','file3_jwb','status_jwb','catatan_jwb',
    'daftar_bayar_id'
   
];
    
}
