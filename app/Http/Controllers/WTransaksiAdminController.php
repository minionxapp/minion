<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WTransaksiUser;
use App\WPeriode;
use DataTables;
use App\User;
use Auth;
use Carbon;

class WTransaksiAdminController extends Controller
{
    public function wtransaksiadmin(){
        $periode = WPeriode::where('status','=','A')->get();
        $user = User::where('user_id','=',Auth::user()->user_id)->first();
        return view('/walet/wtransaksiadmin',['periode'=>$periode,'user'=>$user]);//,compact('divisi'));
    }

    public function getwtransaksiadmin(){    
        return Datatables::of(WTransaksiUser::whereIn('status',['AJU'])
        ->get())//kasih where draft dan pengauan hanya di gunakan di pengajuan page
        ->addColumn('action', function($row){       
            $btn = '<a href="#" onclick="viewFunction(\''.$row->id.'\');" class="edit btn btn-info btn-sm">View</a> ';
            $btn = $btn.' <a href="#" onclick="editFunction(\''.$row->id.'\');" class="edit btn btn-primary btn-sm">Edit</a>';
            // $btn = $btn.' <a href="/walet/delwtransaksiuserbyid/'.$row->id.'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
            return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }








    public function addwtransaksiadmin(Request $request){
        // $model = new WTransaksiUser;
        // $model->periode_kode =$request->periode_kode;
        // $model->user_id =$request->user_id;
        // $model->jenis =$request->jenis;
        // $model->keterangan =$request->keterangan;
        // $model->mulai =$request->mulai;
        // $model->akhir =$request->akhir;
        // $model->lokasi =$request->lokasi;
        // $model->jml_training =$request->jml_training;
        // $model->jml_lain =$request->jml_lain;
        // $model->jml_total =$request->jml_total;
        
        
        // if($request->hasfile('file1')){
        //     $request->file('file1')
        //     ->move('images/',Carbon\Carbon::now()->timestamp.'_'.($request->file('file1')->getClientOriginalName()));
        //     $model->file1 =Carbon\Carbon::now()->timestamp.'_'.($request->file('file1')->getClientOriginalName());//$request->file1;
        // }
        
        // if($request->hasfile('file2')){
        //     $request->file('file2')->move('images/',Carbon\Carbon::now()->timestamp.'_'.($request->file('file2')->getClientOriginalName()));
        //     $model->file2 =Carbon\Carbon::now()->timestamp.'_'.($request->file('file2')->getClientOriginalName());//$request->file1;
        // }

        // if($request->hasfile('file3')){
        //     $request->file('file3')->move('images/',Carbon\Carbon::now()->timestamp.'_'.($request->file('file3')->getClientOriginalName()));
        //     $model->file3 =Carbon\Carbon::now()->timestamp.'_'.($request->file('file3')->getClientOriginalName());//$request->file1;
        // }

        // $model->status =$request->status;
        // if($request->id == null ){
        //     $model->save();
        // }else{
            $modelUpdate = WTransaksiUser::find($request->id);
            $modelUpdate->approve_by = (Auth::user())->user_id;
            $modelUpdate->tgl_approve = Carbon\Carbon::now();
            $modelUpdate->status = $request->status;
            $modelUpdate->update($modelUpdate->toArray());
        // }


        return redirect('/walet/wtransaksiadmin')->with('sukses','Data Berhasil di Simpan');
    }


}
