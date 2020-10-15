<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\WMember;
use App\WPeriode;
use \App\WTransaksi;
class WMemberController extends Controller
{
    public function wmember(){
        $periode = WPeriode::where('status','=','A')->get();
        return view('/walet/wmember',['periode'=>$periode]);
    }


    public function getwmember(){        
        return Datatables::of(WMember::all())
        ->addColumn('action', function($row){       
            $btn = '<a href="#" onclick="viewFunction(\''.$row->id.'\');" class="edit btn btn-info btn-sm">View</a> ';
            $btn = $btn.' <a href="#" onclick="editFunction(\''.$row->id.'\');" class="edit btn btn-primary btn-sm">Edit</a>';
            $btn = $btn.' <a href="/walet/delwmemberbyid/'.$row->id.'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
            return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function addwmember(Request $request){
       
        $wmember = new WMember;
        $wmember->periode_kode =$request->periode_kode;
        $wmember->user_id =$request->user_id;
        $wmember->user_name =$request->user_name;
        $wmember->divisi_kode =$request->divisi_kode;
        $wmember->divisi_nama =$request->divisi_nama;
        $wmember->departemen_kode =$request->departemen_kode;
        $wmember->departemen_nama =$request->departemen_nama;
        $wmember->sawal =$request->sawal;
        $wmember->status =$request->status;          
        // $member = new WMember;
        if($request->id == null){
            $member2 = \App\WMember::where('periode_kode','=',$request->periode_kode)
            ->where('user_id','=',$request->user_id)
            ->first();
            if ($member2 == null){
                $wmember->sakhir =$request->sawal;// samakan dengan saldo awal$request->sakhir;
                $controller = new WMemberController();
                if ($controller->kurangSaldo($request->periode_kode,$request->sawal,$request->user_id)){
                    $wmember->save();
                    return redirect('/walet/wmember')->with('sukses','Data Berhasil di Simpan');
                }else{
                    return redirect('/walet/wmember')->with('sukses','Simpan Gagal');
                }
            }else{
                return redirect('/walet/wmember')->with('sukses','Data Sudah Ada');
            }
        }else{
            $wmember3 = WMember::find($request->id);
            $wmember->sakhir =$request->sakhir;
            $wmember3->update($wmember->toArray());
            return redirect('/walet/wmember')->with('sukses','Update Sukses');
        }
        
    }

    public function kurangSaldo($idPeriode,$jumlah,$user_id){
        $wperiode = \App\WPeriode::where('kode','=',$idPeriode)->first();//find($idPeriode);
        $saldo = $wperiode->sakhir;
        $saldo_akhir = $saldo - $jumlah;
        $wperiode->sakhir = $saldo_akhir;
        $data = $wperiode->toArray();
        $wtransaksi = new \App\WTransaksi();
        $wtransaksi->periode_kode =$wperiode->kode;
        $wtransaksi->user_id =$user_id;
        $wtransaksi->keterangan ="Saldo Awal ".$idPeriode;
        $wtransaksi->masuk =$jumlah;
        $wtransaksi->keluar =0;
        $wtransaksi->save();        
        return $wperiode->update($data);
    }

    public function delwmemberbyid($id)
    {
        $wmember = \App\WMember::find($id);
        if ($wmember!== null){
            $wmember->delete();
            return redirect('/walet/wmember')->with('sukses','Data Berhasil dihapus');
        }else{
            return redirect('/walet/wmember')->with('sukses','HAPUS GAGAL...............');
        }
    }


    public function getwmemberbyid($id)
    {
        $wmember = \App\WMember::find($id);
        return $wmember;
    }


    
    
}
