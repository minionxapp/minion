<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WPeriode;
use Auth;
use App\User;
use DataTables;
use App\WTransaksiUser;
use Carbon;
class WTransJwbVerifikasiController extends Controller
{
    public function wtransjwbverifikasi(){

        $periode = WPeriode::where('status','=','A')->get();
        $user = User::where('user_id','=',Auth::user()->user_id)->first();

        return view("/walet/wtransjwbverifikasi",['periode'=>$periode,'user'=>$user]);
    }


    public function getwtransjwbverifikasi(){    
        return Datatables::of(WTransaksiUser::
        where('status','=','STD') 
        ->where('status_jwb','=','AJU')
        ->get())//kasih where draft dan pengauan hanya di gunakan di pengajuan page  
        ->addColumn('action', function($row){       
            $btn = '<a href="#" onclick="viewFunction(\''.$row->id.'\');" class="edit btn btn-info btn-sm">View</a> ';
            $btn = $btn.' <a href="#" onclick="editFunction(\''.$row->id.'\');" class="warning btn btn-warning btn-sm">Verifikasi</a>';
            // $btn = $btn.' <a href="/walet/delwtransaksiuserbyid/'.$row->id.'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
            return $btn;
        })
        ->rawColumns(['action'])      
        ->make(true);
    }


    public function addwtransjwbverifikasi(Request $request){
        $model = WTransaksiUser::find($request->id);
        $model->status_jwb = $request->status_jwb;
        $model->catatan_jwb = $request->catatan_jwb;
        $model->daftar_bayar_id = $request->daftar_bayar_id;
        
        $model->update($model->toArray());
        return redirect('/walet/wtransjwbverifikasi')->with('sukses','Data Berhasil di Simpan');
    }



    public function getwdaftarbayar(){    
        return Datatables::of(WTransaksiUser::
        where('status','=','STD') 
        ->where('status_jwb','=','STD')
        ->get())//kasih where draft dan pengauan hanya di gunakan di pengajuan page  
        ->addColumn('action', function($row){       
            $btn = '<a href="#" onclick="viewFunction(\''.$row->id.'\');" class="edit btn btn-info btn-sm">View</a> ';
            $btn = $btn.' <a href="#" onclick="editFunction(\''.$row->id.'\');" class="warning btn btn-warning btn-sm">Verifikasi</a>';
            // $btn = $btn.' <a href="/walet/delwtransaksiuserbyid/'.$row->id.'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
            return $btn;
        })
        ->rawColumns(['action'])      
        ->make(true);
    }



}
