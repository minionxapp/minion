<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WTransaksiUser;
use Auth;
use DataTables;
class WTransHistoriController extends Controller
{
    public function wtranshistori()
    {
        $wtrans = WTransaksiUser::where('user_id','=',Auth::user()->user_id)->get();
        return view("/walet/wtranshistori",['wtrans'=>$wtrans]);
    }

    public function getwtranshistoriuser(){    
        return Datatables::of(WTransaksiUser::where('user_id','=',Auth::user()->user_id)
        ->get())//kasih where draft dan pengauan hanya di gunakan di pengajuan page        
        ->make(true);
    }
}
