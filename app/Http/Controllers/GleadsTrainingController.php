<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GleadsTraining;
use DataTables;

class GleadsTrainingController extends Controller
{
    public function gleadstraining()
    
    {
        // $listTraining = GleadsTraining::all();
        // dd($listTraining);
        return view('/admin/gleads/gleadstraining');//,compact('divisi'));
    }



    public function listGleadstraining(){          
        return Datatables::of(GleadsTraining::all())
        ->addColumn('action', function($row){       
            $btn = '<a href="#" onclick="viewFunction(\''.$row->id.'\');" class="edit btn btn-info btn-sm">View</a> ';
            $btn = $btn.' <a href="#" onclick="editFunction(\''.$row->id.'\');" class="edit btn btn-primary btn-sm">Edit</a>';
            $btn = $btn.' <a href="/gleads/delGleadstraining/'.$row->id.'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
            return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }


    public function addGleadstraining(Request $request){
        $model = new \App\GleadsTraining;
        $model->modul_id = $request->modul_id;
        $model->program_name = $request->program_name;
        $model->skill_name = $request->skill_name;
        $model->modul_name = $request->modul_name;
        $model->jamlat = $request->jamlat;
        $model->hitung = $request->hitung;
        // $model->enrolled = $request->enrolled;
        // $model->selesai = $request->selesai;
        // $model->progress = $request->progress;
        // $model->belum = $request->belum;
        $model->tahun = $request->tahun;
        $model->modul_type = $request->modul_type;
        if($request->id == null ){
            $model->save();
            return redirect('/gleads/gleadstraining')->with('sukses','Data Berhasil di Simpan');
        }else{
            $modelUpdate = new \App\GleadsTraining;
            $modelUpdate = \App\GleadsTraining::find($request->id);
            $modelUpdate->update($request->all());
            return redirect('/gleads/gleadstraining')->with('sukses','Update Berhasil di Simpan');
        }

        

    }
    public function getGleadstrainingById($id){   
        $gleadsTraing = GleadsTraining::find($id);
        return $gleadsTraing;
    }

    public function delGleadstraining($id)
    {
        $model = \App\GleadsTraining::find($id);
        $model->delete();
        return redirect('/gleads/gleadstraining')->with('sukses','Data Berhasil dihapus');
        
    }
}
