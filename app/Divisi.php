<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $table ='divisi';
    protected $fillable = ['id','kode', 'nama','nik_kadiv','nama_kadiv' ];

    // public function departemen()
    // {
    //     return $this->hasMany('App\Departemen','divisi_kode','kode');
    //     // FK-->divisi_kode pada table departement, ID --> dari divisi
    // }

    public function user()//masternya
    {
        return $this->hasMany('App\User','divisi_kode','kode');
        // FK-->divisi_kode pada table departement, ID --> dari divisi
    }

    
    protected static function boot() {
        parent::boot();

        static::deleting(function($divisi) {
             if ($divisi->user()->count() > 0)
            {
                throw new Exception("Model have child records");
            }
        });
    }
}
