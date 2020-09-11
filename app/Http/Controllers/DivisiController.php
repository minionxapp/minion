<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Divisi;

class DivisiController extends Controller
{
    public function divisi()
    {
        // $divisi = \App\Divisi::all();
        return view('/admin/divisi');//,compact('divisi'));
    }

    public function getdivisi()
    {
        return Datatables::of(Divisi::all())
        ->addColumn('action', function($row){       
            $btn = '<a href="#" onclick="viewFunction(\''.$row->id.'\');" class="edit btn btn-info btn-sm">View</a> ';
            $btn = $btn.' <a href="#" onclick="editFunction(\''.$row->id.'\');" class="edit btn btn-primary btn-sm">Edit</a>';
            $btn = $btn.' <a href="/admin/deldivisibyid/'.$row->id.'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
            return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function addDivisi(Request $request){
        // dd($request->all());
        $divisi = new \App\Divisi;
        $divisi->kode =$request->kode;
        $divisi->nama =$request->nama;
        $divisi->nik_kadiv =$request->nik_kadiv;
        $divisi->nama_kadiv =$request->nama_kadiv;
        if($request->id == null ){
            $divisi->save();
            return redirect('/admin/divisi')->with('sukses','Data Berhasil di Simpanxxxxxx');
        }else{
            // $user->id =$request->id;
            $divisiUpdate = new \App\Divisi;
            $divisiUpdate = \App\Divisi::find($request->id);
            $divisiUpdate->update($request->all());
            return redirect('/admin/divisi')->with('sukses','Data Berhasil Update');
            
        }
    }
    public function getdivisibyid($id)
    {
        $divisi = \App\Divisi::find($id);
         return $divisi;
    }

    public function deldivisibyid($id)
    {
        $divisi = \App\Divisi::find($id);
        $divisi->delete();
        return redirect('/admin/divisi')->with('sukses','Data Berhasil dihapus');
        
    }


    public function getAllDivisi()
    {
        $divisi = \App\Divisi::all();
        return json_encode($divisi);
    }
}
