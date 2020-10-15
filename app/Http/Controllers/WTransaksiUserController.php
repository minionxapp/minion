<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WTransaksiUser;
use App\WPeriode;
use DataTables;
use App\User;
use Auth;

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
        $model->file1 =$request->file1;
        $model->file2 =$request->file2;
        $model->file3 =$request->file3;
        $model->status =$request->status;
        $model->save();
        return redirect('/walet/wtransaksiuser')->with('sukses','Data Berhasil di Simpan');
        // // $member = new WMember;
        // if($request->id == null){
        //     $member2 = \App\WMember::where('periode_kode','=',$request->periode_kode)
        //     ->where('user_id','=',$request->user_id)
        //     ->first();
        //     if ($member2 == null){
        //         $wmember->sakhir =$request->sawal;// samakan dengan saldo awal$request->sakhir;
        //         $controller = new WMemberController();
        //         if ($controller->kurangSaldo($request->periode_kode,$request->sawal,$request->user_id)){
        //             $wmember->save();
        //             return redirect('/walet/wmember')->with('sukses','Data Berhasil di Simpan');
        //         }else{
        //             return redirect('/walet/wmember')->with('sukses','Simpan Gagal');
        //         }
        //     }else{
        //         return redirect('/walet/wmember')->with('sukses','Data Sudah Ada');
        //     }
        // }else{
        //     $wmember3 = WMember::find($request->id);
        //     $wmember->sakhir =$request->sakhir;
        //     $wmember3->update($wmember->toArray());
        //     return redirect('/walet/wmember')->with('sukses','Update Sukses');
        // }
        
    }





    public function getwtransaksiuser(){        
        return Datatables::of(WTransaksiUser::all())
        ->addColumn('action', function($row){       
            $btn = '<a href="#" onclick="viewFunction(\''.$row->id.'\');" class="edit btn btn-info btn-sm">View</a> ';
            $btn = $btn.' <a href="#" onclick="editFunction(\''.$row->id.'\');" class="edit btn btn-primary btn-sm">Edit</a>';
            $btn = $btn.' <a href="/walet/delwmemberbyid/'.$row->id.'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
            return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

}
