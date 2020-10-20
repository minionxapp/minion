<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WTransaksiUser;
use App\WPeriode;
use App\WMember;
use App\WTransaksi;
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
            $modelUpdate = WTransaksiUser::find($request->id);
            $modelUpdate->approve_by = (Auth::user())->user_id;
            $modelUpdate->tgl_approve = Carbon\Carbon::now();
            $modelUpdate->status = $request->status;
            if($request->status == 'TLK'){
                //kembalikan saldo 
                    $trans = new WTransaksi;
                    $trans->periode_kode = $request->periode_kode;
                    $trans->user_id = $request->user_id;
                    $trans->keterangan="Tolak ".$request->keterangan;
                    $trans->masuk= $request->jml_total;
                    $trans->keluar=0;
                    $trans->save();

                    // Buat pengurangan saldo ya.....................
                    $member = WMember::where('periode_kode','=',$request->periode_kode)
                    ->where('user_id','=',$request->user_id)->first();
                    $saldo_akhir = $member->sakhir + $request->jml_total;
                    $member->sakhir = $saldo_akhir;
                    $member->update($member->toArray());

            }     
            $modelUpdate->update($modelUpdate->toArray());
            


        return redirect('/walet/wtransaksiadmin')->with('sukses','Data Berhasil di Simpan');
    }


}
