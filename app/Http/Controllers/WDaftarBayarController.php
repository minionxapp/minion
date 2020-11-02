<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WDaftarBayar;
use App\WTransaksiUser;
use DataTables;

class WDaftarBayarController extends Controller
{
    public function wdaftarbayar(){

        // $periode = WPeriode::where('status','=','A')->get();
        // $user = User::where('user_id','=',Auth::user()->user_id)->first();

        // return view("/walet/wtransjwbverifikasi",['periode'=>$periode,'user'=>$user]);

        return view("/walet/wdaftarbayar");
    }

    // 
    public function addwdaftarbayar(Request $request){
        // ['judul','keterangan','status','jml_total','tgl_pembayaran'];       
        $model = new WDaftarBayar;
        // $model->id =$request->id;
        $model->judul =$request->judul;
        $model->keterangan =$request->keterangan;
        $model->status =$request->status;
        $model->jml_total =$request->jml_total;
        $model->tgl_pembayaran =$request->tgl_pembayaran;
        if($request->id == null){
            $model->save();
            return redirect('/walet/wdaftarbayar')->with('sukses','Update Sukses');
        }else{
            $modelupdate = WDaftarBayar::find($request->id);
            $modelupdate->update($model->toArray());
            return redirect('/walet/wdaftarbayar')->with('sukses','Update Sukses');
        }
        
    }

    public function getwdaftarbayar(Request $request){ 
        // if(Auth::user()->role =='ADM'){
            return Datatables::of(WDaftarBayar::all())//whereIn('status_jwb',['STD'])
            // ->get())//kasih where draft dan pengauan hanya di gunakan di pengajuan page
            ->addColumn('action', function($row){       
                $btn = '<a href="#" onclick="viewFunction(\''.$row->id.'\');" class="edit btn btn-info btn-sm">Info</a> ';
                $btn = $btn.' <a href="#" onclick="editFunction(\''.$row->id.'\');" class="warning btn btn-warning btn-sm">Edit</a>';
                $btn = $btn.' <a href="/walet/delwdaftarbayar/'.$row->id.'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
                $btn = $btn.' <a href="#" onclick="daftarFunction(\''.$row->id.'\');" class="warning btn btn-warning btn-sm">Daftar</a>';
 
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function getwdaftarbayarbyid($id){ 
        $daftarbayar = \App\WDaftarBayar::find($id);
        return $daftarbayar;
    }

    public function getdaftarbayarbystatus(){ 
        $daftarbayar = \App\WDaftarBayar::where('status','=','DRF')->get();//find($status);
        return $daftarbayar;
    }

    
    public function repwdaftarbayar($id_daftar){

        // $periode = WPeriode::where('status','=','A')->get();
        // $user = User::where('user_id','=',Auth::user()->user_id)->first();

        // return view("/walet/wtransjwbverifikasi",['periode'=>$periode,'user'=>$user]);
        $daftarbayar = \App\WTransaksiUser::where('daftar_bayar_id','=',$id_daftar)->get();//find($status);
        return view("/walet/repwdaftarbayar",["daftar_bayar"=>$daftarbayar]);
    }



}
