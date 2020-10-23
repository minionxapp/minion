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
        // ->addColumn('action', function($row){       
        //     $btn = '<a href="#" onclick="viewFunction(\''.$row->id.'\');" class="edit btn btn-info btn-sm">View</a> ';
        //     $btn = $btn.' <a href="#" onclick="editFunction(\''.$row->id.'\');" class="edit btn btn-primary btn-sm">Edit</a>';
        //     $btn = $btn.' <a href="/walet/delwtransaksiuserbyid/'.$row->id.'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
        //     return $btn;
        // })
        ->rawColumns(['action'])      
        ->make(true);
    }
}
