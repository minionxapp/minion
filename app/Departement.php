<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $table='departement';
    protected $fillable = [
        'kode', 'nama','nik_kadept','nama_kadept','divisi_kode'
    ];

    public function divisi()
    {
        return $this->belongsTo('App\Divisi','divisi_kode','kode');
        // FK-->divisi_kode pada table Chlid, kode -->PK dari divisi
    }
}
