<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CorpuEvent;
use App\Divisi;
use App\Departement;
use DataTables;
use Carbon\Carbon;
class CorpuEventController extends Controller
{
    public function corpuevent()
    {
        $divisi = \App\Divisi::all();
        $events = \App\CorpuEvent::all();
        
        // dd($events->all());
        return view('/corpuevent',['divisis'=>$divisi,'events'=>$events]);
    }

    public function geteventbyid($id) {
        $event = \App\CorpuEvent::find($id);
        return $event;
    }




    public function getallevent()
    {
        $events = \App\CorpuEvent::all();
        // dd($events->divisi->nama);
        return Datatables::of(CorpuEvent::all())
        ->addColumn('action', function($row){       
            $btn = '<a href="#" onclick="viewFunction(\''.$row->id.'\');" class="edit btn btn-info btn-sm">View</a> ';
            $btn = $btn.' <a href="#" onclick="editFunction(\''.$row->id.'\');" class="edit btn btn-primary btn-sm">Edit</a>';
            $btn = $btn.' <a href="/deleventbyid/'.$row->id.'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
            return $btn;
        })
        ->addColumn('nama_divisi', function($row){  
            $divisi =$row->divisi->nama;
            return $divisi;
        })
        ->addColumn('nama_departement', function($row){  
            $departemen =$row->departement->nama;
            return $departemen;
        })   
        ->rawColumns(['action','nama_divisi','nama_departement'])
        ->make(true);
    }

//add event
    public function addevent(Request $request){
        $event = new \App\CorpuEvent;
        $event->jenis =$request->jenis;
        $event->divisi_kode =$request->divisi_kode;
        $event->departement_kode =$request->departement_kode;
        $event->judul =$request->judul;
        $event->deskripsi =$request->deskripsi;
        $event->mulai =$request->mulai;
        $event->selesai =$request->selesai;
        $tahun = new Carbon( $event->mulai ); 
        $event->tahun =$tahun->year;

        if($request->id == null  ){
            $event->save();
            return redirect('corpuevent')->with('sukses','Data Berhasil di Simpan');
        }else{
            $eventUpdate = new \App\CorpuEvent;
            $eventUpdate = \App\corpuevent::find($request->id);
            $eventUpdate->update($request->all());
            return redirect('corpuevent')->with('sukses','Data Berhasil Update');
            
        }
    }



    public function deleventbyid($id)
    {
        $divisi = \App\CorpuEvent::find($id);
        $divisi->delete();
        return redirect('/corpuevent')->with('sukses','Data Berhasil dihapus');
        
    }
}
