<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Departement;//modelnya
use DataTables;


class DepartementController extends Controller
{
    public function departement()
    {
        $divisi = \App\Divisi::all();
        return view('/admin/departement',['divisis'=>$divisi]);//,compact('divisi'));
    }

    public function adddepartement(Request $request){
        $departement = new \App\Departement;
        $departement->kode =$request->kode;
        $departement->nama =$request->nama;
        $departement->nik_kadept =$request->nik_kadept;
        $departement->nama_kadept =$request->nama_kadept;
        $departement->divisi_kode =$request->divisi_kode;
        if($request->id == null ){
            $departement->save();
            return redirect('/admin/departement')->with('sukses','Data Berhasil di Simpan');
        }else{
            $departementUpdate = new \App\Departement;
            $departementUpdate = \App\Departement::find($request->id);
            $departementUpdate->update($request->all());
            return redirect('/admin/departement')->with('sukses','Data Berhasil Update');
        }
    }

    public function getdepartementbyid($id)
    {
        $departement = \App\Departement::find($id);
         return $departement;
    }

    public function getdepartement()
    {
        return Datatables::of(Departement::all())
        ->addColumn('action', function($row){       
            $btn = '<a href="#" onclick="viewFunction(\''.$row->id.'\');" class="edit btn btn-info btn-sm">View</a> ';
            $btn = $btn.' <a href="#" onclick="editFunction(\''.$row->id.'\');" class="edit btn btn-primary btn-sm">Edit</a>';
            $btn = $btn.' <a href="/admin/deldepartementbyid/'.$row->id.'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
            return $btn;
        })
        ->addColumn('nama_divisi', function($row){  
            $departement =$row->divisi->nama;
            return $departement;
        })
        ->rawColumns(['action','nama_divisi'])
        ->make(true);
    }

    public function getalldepartement()
    {
        $departement = \App\Departement::all();
        return json_encode($departement);
    }

    public function getdepartementbydivisi($divisi_kode)
    {
        $user = Auth::user();
        // dd($user->role);
        if($user->role == 'ADM'){
            $departement = \App\Departement::where('divisi_kode','=',$divisi_kode)->get();;
            return json_encode($departement);
        }else{
            $departement = \App\Departement::where('kode','=',$user->departemen)->get();;
            return json_encode($departement);
        }
    }

    public function deldepartementbyid($id)
    {
        $departement = \App\Departement::find($id);
        $departement->delete();
        return redirect('/admin/departement')->with('sukses','Data Berhasil dihapus');
        
    }
    
}
