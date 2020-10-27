<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WPeriode;
use DataTables;
class WPeriodeController extends Controller

{
    public function wperiode(){

        //   $divisi = \App\Divisi::all();
        return view('/walet/wperiode');//,compact('divisi'));
    }

    public function getwperiode()
    {
        return Datatables::of(WPeriode::all())
        ->addColumn('action', function($row){       
            $btn = '<a href="#" onclick="viewFunction(\''.$row->id.'\');" class="edit btn btn-info btn-sm">View</a> ';
            $btn = $btn.' <a href="#" onclick="editFunction(\''.$row->id.'\');" class="edit btn btn-primary btn-sm">Edit</a>';
            $btn = $btn.' <a href="/walet/delwperiodebyid/'.$row->id.'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
            return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function addwperiode(Request $request){
        $model = new \App\WPeriode;
        $model->kode =$request->kode;
        $model->nama =$request->nama;
        $model->descripsi =$request->descripsi;
        $model->awal =$request->awal;
        $model->akhir =$request->akhir;
        $model->sawal =$request->sawal;
        $model->sakhir =$request->sawal; 
        $model->status =$request->status;       
        if($request->id == null ){
            $model->save();
            return redirect('/walet/wperiode')->with('sukses','Data Berhasil di Simpan');
        }else{
            // $user->id =$request->id;
            $modelUpdate = new \App\WPeriode;
            $modelUpdate = \App\WPeriode::find($request->id);
            $modelUpdate->update($request->all());
            return redirect('/walet/wperiode')->with('sukses','Data Berhasil Update');
            
        }
    }

    public function getwperiodebyid($id)
    {
        $model = \App\WPeriode::find($id);
         return $model;
    }

public function delwperiodebyid($id)
    {
        $model = \App\WPeriode::find($id);
        $model->delete();
        return redirect('/walet/wperiode')->with('sukses','Data Berhasil dihapus');
        
    }


}
