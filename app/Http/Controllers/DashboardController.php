<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Divisi;
use App\Departement;
class DashboardController extends Controller
{
    public function dashboard(){

        $epent = \App\CorpuEvent::has('departement')->get();

        // $epent = \App\CorpuEvent::all()->with('departement');//->sortBy('divisi_kode');;        
        // foreach ($epent as $ep) {
        //     dd($ep->departement->nama);
        // }
        // dd($epent);
        return view('/dashboard',['epentlist'=>$epent]);
    }
}
