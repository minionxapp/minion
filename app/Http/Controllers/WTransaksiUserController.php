<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WTransaksiUser;
use  App\WTransaksi;
use App\WPeriode;
use App\WMember;
use DataTables;
use App\User;
use Auth;
use Carbon;

class WTransaksiUserController extends Controller
{
    public function wtransaksiuser(){
        $periode = WPeriode::where('status','=','A')->get();
        $user = User::where('user_id','=',Auth::user()->user_id)->first();


        return view('/walet/wtransaksiuser',['periode'=>$periode,'user'=>$user]);//,compact('divisi'));
    }


    public function addwtransaksiuser(Request $request){
        $model = new WTransaksiUser;
        $model->periode_kode =$request->periode_kode;
        $model->user_id =$request->user_id;
        $model->jenis =$request->jenis;
        $model->keterangan =$request->keterangan;
        $model->mulai =$request->mulai;
        $model->akhir =$request->akhir;
        $model->lokasi =$request->lokasi;
        $model->jml_training =$request->jml_training;
        $model->jml_lain =$request->jml_lain;
        $model->jml_total =$request->jml_total;
        $model->nik_atasan = $request->nik_atasan;
        $model->nama_atasan =$request->nama_atasan;
        
        
        if($request->hasfile('file1')){
            $request->file('file1')
            ->move('images/',Carbon\Carbon::now()->timestamp.'_'.($request->file('file1')->getClientOriginalName()));
            $model->file1 =Carbon\Carbon::now()->timestamp.'_'.($request->file('file1')->getClientOriginalName());//$request->file1;
        }
        
        if($request->hasfile('file2')){
            $request->file('file2')->move('images/',Carbon\Carbon::now()->timestamp.'_'.($request->file('file2')->getClientOriginalName()));
            $model->file2 =Carbon\Carbon::now()->timestamp.'_'.($request->file('file2')->getClientOriginalName());//$request->file1;
        }

        if($request->hasfile('file3')){
            $request->file('file3')->move('images/',Carbon\Carbon::now()->timestamp.'_'.($request->file('file3')->getClientOriginalName()));
            $model->file3 =Carbon\Carbon::now()->timestamp.'_'.($request->file('file3')->getClientOriginalName());//$request->file1;
        }

        $model->status =$request->status;
        if($request->id == null ){//insert
            $model->save();
            //insert transaksi ke wtransaksi
            if($request->status=="AJA"){
                $trans = new WTransaksi;
                $trans->periode_kode = $request->periode_kode;
                $trans->user_id = $request->user_id;
                $trans->keterangan=$request->keterangan;
                $trans->keluar= $request->jml_total;
                $trans->id_trans = $model->id;
                $trans->masuk=0;
                $trans->save();
                // 'periode_kode','user_id','keterangan','masuk','keluar'
                // Buat pengurangan saldo ya.....................
                $member = WMember::where('periode_kode','=',$request->periode_kode)
                ->where('user_id','=',$request->user_id)->first();
                $saldo_akhir = $member->sakhir - $request->jml_total;
                $member->sakhir = $saldo_akhir;
                $member->update($member->toArray());
            }
        }else{//update
            if($request->status=="AJA"){
                $trans = new WTransaksi;
                $trans->periode_kode = $request->periode_kode;
                $trans->user_id = $request->user_id;
                $trans->keterangan=$request->keterangan;
                $trans->keluar= $request->jml_total;
                $trans->id_trans = $model->id;
                $trans->masuk=0;
                $trans->save();

                // Buat pengurangan saldo ya.....................
                $member = WMember::where('periode_kode','=',$request->periode_kode)
                ->where('user_id','=',$request->user_id)
                ->first();
                // dd($member." ".$request->periode_kode." ".$request->user_id);
                $saldo_akhir = $member->sakhir - $request->jml_total;
                $member->sakhir = $saldo_akhir;
                $member->update($member->toArray());
            }
            $modelUpdate = WTransaksiUser::find($request->id);
            $modelUpdate->update($model->toArray());
        }
//update saldo di wmember
        return redirect('/walet/wtransaksiuser')->with('sukses','Data Berhasil di Simpan');
    }





    public function getwtransaksiuser(){    
        $user = User::where('user_id','=',Auth::user()->user_id)->first();    
        // dd($user);
        return Datatables::of(WTransaksiUser::whereIn('status',['DRF','AJU'])
        ->where('user_id','=',$user->user_id)
        ->get())//kasih where draft dan pengauan hanya di gunakan di pengajuan page
        ->addColumn('action', function($row){       
            $btn = '<a href="#" onclick="viewFunction(\''.$row->id.'\');" class="edit btn btn-info btn-sm">View</a> ';
            $btn = $btn.' <a href="#" onclick="editFunction(\''.$row->id.'\');" class="edit btn btn-primary btn-sm">Edit</a>';
            $btn = $btn.' <a href="/walet/delwtransaksiuserbyid/'.$row->id.'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
            return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function getwtransaksiuser_byid($id){  
        return WTransaksiUser::find($id);
    }

    public function getwtransaksiuser_byuserid($id){  
        $periode = WPeriode::where('status','=','A')->first();
        $wmember = WMember::where('user_id','=',Auth::user()->user_id)
                            ->where('periode_kode','=',$periode->kode)->first();
        return $wmember;
    }

    public function delwtransaksiuserbyid($id)
    {
        $model =WTransaksiUser::find($id);
        if($model->user_id == (Auth::user())->user_id){
            $model->delete();
            return redirect('/walet/wtransaksiuser')->with('sukses','Data Berhasil dihapus');
        }else{
            return redirect('/walet/wtransaksiuser')->with('sukses','Hapus Gagal...........');
        }
        
    }

    

}
