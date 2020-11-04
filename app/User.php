<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','departemen','nama_unit_kerja','role','divisi_kode',
        'foto','bank','norek'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //relasi dengan table lain
    //relasi dengan table Divisi
    public function divisi()//childnya
    {
        return $this->belongsTo('App\Divisi','divisi_kode','kode');
        // FK-->divisi_kode pada table Chlid, kode -->PK dari divisi
    }

    public function departement()//Nama sesuai Model
    {
        return $this->belongsTo('App\Departement','departemen','kode');
        // FK-->divisi_kode pada table departement, ID --> dari divisi
    }

    public function wtransaksiuser()//masternya
    {
        return $this->hasMany('App\WTransasksiUser','user_id','user_id');
    }
    // public function wtransaksiuser()//childnya
    // {
    //     return $this->belongsTo('App\WTransasksiUser','divisi_kode','kode');
    //     // FK-->divisi_kode pada table Chlid, kode -->PK dari divisi
    // }
}
