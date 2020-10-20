<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Divisi;
use App\Departement;
use App\WMember;
use App\WPeriode;
use Auth;
use App\User;
class DashboardController extends Controller
{
    public function dashboard(){

        $epent = \App\CorpuEvent::has('departement')->get();

        // $epent = \App\CorpuEvent::all()->with('departement');//->sortBy('divisi_kode');;        
        // foreach ($epent as $ep) {
        //     dd($ep->departement->nama);
        // }
        $periode = WPeriode::where('status','=','A')->first();
        $user = User::where('user_id','=',Auth::user()->user_id)->first();
        $member = WMember::where('periode_kode','=',$periode->kode)
        ->where('user_id','=',$user->user_id)->first();
        if($member == null){
            return view('/dashboard',['epentlist'=>$epent,'saldo'=>0]);
        }else{
            return view('/dashboard',['epentlist'=>$epent,'saldo'=>$member->sakhir]);
        }
    }
}
