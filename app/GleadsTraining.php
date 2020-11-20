<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GleadsTraining extends Model{
    protected $table ='gleads_modul';
    protected $fillable = [
        'modul_id','program_name','skill_name','modul_name','jamlat','hitung',
        'enrolled','selesai','progress','belum','modul_type','tahun','type_enroll'
    ];
}
