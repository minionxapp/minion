<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WDaftarBayar;
use App\WTransaksiUser;
use App\WPeriode;
use Auth;
use App\User;
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
                $btn = $btn.' <a href="/walet/delwdaftarbayarbyid/'.$row->id.'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
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

    public function delwdaftarbayarbyid($id)
    {
        $model = \App\WDaftarBayar::find($id);
        $cekModel = WTransaksiUser::where('daftar_bayar_id','=',$model->id)->get();
        if($cekModel != null){
            return redirect('/walet/wdaftarbayar')->with('sukses','Data Gagal dihapus, Daftar bayar masih ada data');
        }else{
            $model->delete();
            return redirect('/walet/wdaftarbayar')->with('sukses','Data Berhasil dihapus');
        }
    }


    public function getdaftarbayarbystatus(){ 
        $daftarbayar = \App\WDaftarBayar::where('status','=','DRF')->get();//find($status);
        return $daftarbayar;
    }

    
    public function repwdaftarbayar($id_daftar){

        $periode = WPeriode::where('status','=','A')->get();
        $user = User::where('user_id','=',Auth::user()->user_id)->first();

        // return view("/walet/wtransjwbverifikasi",['periode'=>$periode,'user'=>$user]);
        $daftarbayar = \App\WTransaksiUser::where('daftar_bayar_id','=',$id_daftar)->get();//find($status);
        return view("/walet/repwdaftarbayar",["daftar_bayar"=>$daftarbayar,'periode'=>$periode,'user'=>$user]);
    }

    public function updaterepwdaftarbayar(Request $request){
        $model = WTransaksiUser::find($request->id);
        // $model->status_jwb = $request->status_jwb;
        // $model->catatan_jwb = $request->catatan_jwb;
        $id_old = $model->daftar_bayar_id;
        $model->daftar_bayar_id = "";
        
        $model->update($model->toArray());
        return redirect('/walet/repwdaftarbayar/'.$id_old)->with('sukses','Data Berhasil di Simpan');
    }


    // ================================================================
    public function winputdaftarbayar(){

        $periode = WPeriode::where('status','=','A')->get();
        $user = User::where('user_id','=',Auth::user()->user_id)->first();
        return view("/walet/winputdaftarbayar",['periode'=>$periode,'user'=>$user]);

        // return view("/walet/winputdaftarbayar");
    }



    public function getwinputdaftarbayar(){    
        return Datatables::of(WTransaksiUser::
        where('status','=','STD') 
        ->where('status_jwb','=','STD')
        ->where('daftar_bayar_id','=','')
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

    public function updatedaftarbayar(Request $request){
            $model = WTransaksiUser::find($request->id);
            // $model->status_jwb = $request->status_jwb;
            // $model->catatan_jwb = $request->catatan_jwb;
            $model->daftar_bayar_id = $request->daftar_bayar_id;        
            $model->update($model->toArray());
            // return redirect('/walet/repwdaftarbayar/'.$model->daftar_bayar_id)->with('sukses','Data Berhasil di Simpan');

            return redirect('/walet/winputdaftarbayar')->with('sukses','Data Berhasil di Simpan');
        }

   
}
