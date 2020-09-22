<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $table='departement';
    protected $fillable = [
        'kode', 'nama','nik_kadept','nama_kadept','divisi_kode'
    ];

    // Departement - Divisi
    public function divisi()
    {
        return $this->belongsTo('App\Divisi','divisi_kode','kode');
    }

    // Departement - User
    public function user()//masternya
    {
        return $this->hasMany('App\User','departemen','kode');
    }
}
