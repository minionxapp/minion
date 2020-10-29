<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WPeriode;
use Auth;
use App\User;
use DataTables;
use App\WTransaksiUser;
use Carbon;

class WTransTanggungJawabController extends Controller
{
    //ss wtranstanggungjawab
    public function wtranstanggungjawab()
    {
        $periode = WPeriode::where('status','=','A')->get();
        $user = User::where('user_id','=',Auth::user()->user_id)->first();

        // $wtrans = WTransaksiUser::where('user_id','=',Auth::user()->user_id)->get();
        return view("/walet/wtranstanggungjawab",['periode'=>$periode,'user'=>$user]);
    }

    public function getwtranstanggungjawab(){    
        return Datatables::of(WTransaksiUser::where('user_id','=',Auth::user()->user_id)
        ->where('status','=','STD') 
        ->whereNotIn('status_jwb',['AJU','STD'])
        ->get())//kasih where draft dan pengauan hanya di gunakan di pengajuan page  
        ->addColumn('action', function($row){       
            $btn = '<a href="#" onclick="viewFunction(\''.$row->id.'\');" class="edit btn btn-info btn-sm">View</a> ';
            $btn = $btn.' <a href="#" onclick="editFunction(\''.$row->id.'\');" class="edit btn btn-primary btn-sm">Buat/Edit</a>';
            // $btn = $btn.' <a href="/walet/delwtransaksiuserbyid/'.$row->id.'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
            return $btn;
        })
        ->rawColumns(['action'])      
        ->make(true);
    }

    public function addwtranstanggungjawab(Request $request){
        $model = WTransaksiUser::find($request->id);
        if($request->hasfile('file1_jwb')){
            $request->file('file1_jwb')
            ->move('images/',Carbon\Carbon::now()->timestamp.'_'.($request->file('file1_jwb')->getClientOriginalName()));
            $model->file1_jwb =Carbon\Carbon::now()->timestamp.'_'.($request->file('file1_jwb')->getClientOriginalName());//$request->file1;
        }
        
        if($request->hasfile('file2_jwb')){
            $request->file('file2_jwb')->move('images/',Carbon\Carbon::now()->timestamp.'_'.($request->file('file2_jwb')->getClientOriginalName()));
            $model->file2_jwb =Carbon\Carbon::now()->timestamp.'_'.($request->file('file2_jwb')->getClientOriginalName());//$request->file1;
        }

        if($request->hasfile('file3_jwb')){
            $request->file('file3_jwb')->move('images/',Carbon\Carbon::now()->timestamp.'_'.($request->file('file3_jwb')->getClientOriginalName()));
            $model->file3_jwb =Carbon\Carbon::now()->timestamp.'_'.($request->file('file3_jwb')->getClientOriginalName());//$request->file1;
        }

        // $model->status =$request->status;
        $model->status_jwb = $request->status_jwb;
        $model->update($model->toArray());
        return redirect('/walet/wtranstanggungjawab')->with('sukses','Data Berhasil di Simpan');
    }



}
