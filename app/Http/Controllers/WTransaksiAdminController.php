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
        if(Auth::user()->role =='ADM'||Auth::user()->role =='ADLW'){
            return Datatables::of(WTransaksiUser::whereIn('status',['STA'])
            ->get())//kasih where draft dan pengauan hanya di gunakan di pengajuan page
            ->addColumn('action', function($row){       
                $btn = '<a href="#" onclick="viewFunction(\''.$row->id.'\');" class="edit btn btn-info btn-sm">Info</a> ';
                $btn = $btn.' <a href="#" onclick="editFunction(\''.$row->id.'\');" class="warning btn btn-warning btn-sm">Approve</a>';
                // $btn = $btn.' <a href="/walet/delwtransaksiuserbyid/'.$row->id.'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }else{//unutk atasan
            return Datatables::of(WTransaksiUser::whereIn('status',['AJA'])
            ->where('nik_atasan','=',Auth::user()->user_id)
            ->get())//kasih where draft dan pengauan hanya di gunakan di pengajuan page
            ->addColumn('action', function($row){       
                $btn = '<a href="#" onclick="viewFunction(\''.$row->id.'\');" class="edit btn btn-info btn-sm">Info</a> ';
                $btn = $btn.' <a href="#" onclick="editFunction(\''.$row->id.'\');" class="warning btn btn-warning btn-sm">Persetujuan</a>';
                // $btn = $btn.' <a href="/walet/delwtransaksiuserbyid/'.$row->id.'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
    }

    public function addwtransaksiadmin(Request $request){
            $modelUpdate = WTransaksiUser::find($request->id);
            $modelUpdate->approve_by = (Auth::user())->user_id;
            if($request->status == 'TLA'||$request->status == 'STA'){
                $modelUpdate->tgl_atasan_approve = Carbon\Carbon::now();
            }
            if($request->status == 'TLD' || $request->status == 'STD'){
                $modelUpdate->tgl_approve = Carbon\Carbon::now();
            }

            $modelUpdate->status = $request->status;
            if($request->status == 'TLA' ||$request->status == 'TLD'){//pengembalian saldo
                //kembalikan saldo 
                    $trans = new WTransaksi;
                    $trans->periode_kode = $request->periode_kode;
                    $trans->user_id = $request->user_id;
                    $trans->keterangan="Tolak ".$request->keterangan;
                    $trans->masuk= $request->jml_total;
                    $trans->keluar=0;
                    $trans->id_trans = $modelUpdate->id;
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
