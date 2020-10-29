<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WDaftarBayarController extends Controller
{
    public function wdaftarbayar(){

        // $periode = WPeriode::where('status','=','A')->get();
        // $user = User::where('user_id','=',Auth::user()->user_id)->first();

        // return view("/walet/wtransjwbverifikasi",['periode'=>$periode,'user'=>$user]);

        return "Daftar Bayar on Progress";
    }
}
