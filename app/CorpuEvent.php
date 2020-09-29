<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CorpuEvent extends Model
{
    protected $table='corpu_events';
    protected $fillable = ['id','jenis', 'divisi_kode','departement_kode','judul','deskripsi','mulai','selesai','tahun' ];

    public function divisi()
    {
        return $this->belongsTo('App\Divisi','divisi_kode','kode');
    }

    public function departement()
    {
        return $this->belongsTo('App\Departement','departement_kode','kode');
    }
}
