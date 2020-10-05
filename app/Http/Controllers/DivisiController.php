<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Divisi;
use App\Services\DivisiService;

class DivisiController extends Controller
{
    public function divisi()
    {
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
        $divisi = new \App\Divisi;
        $divisi->kode =$request->kode;
        $divisi->nama =$request->nama;
        $divisi->nik_kadiv =$request->nik_kadiv;
        $divisi->nama_kadiv =$request->nama_kadiv;
        $divisi->id =$request->id;        
        $simpan = (new \App\services\DivisiService)->addDivisi($divisi);
        return redirect('/admin/divisi')->with('sukses',$simpan);
    }

    public function getdivisibyid($id)
    {
        return  (new \App\Services\DivisiService)->getdivisibyid($id);//::find($id);
    }

    public function deldivisibyid($id)
    {
        return redirect('/admin/divisi')->with('sukses', (new \App\Services\DivisiService)->deldivisibyid($id));//::find($id);
    }
        
    public function getAllDivisi()
    {
        $divisi= (new \App\Services\DivisiService)->getAllDivisi();
        return $divisi;
    }
}
