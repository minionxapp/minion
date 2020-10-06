<?php
namespace App\Services;
// use Illuminate\Http\Request;
use \App\Divisi;
class DivisiService{

    public function getAllDivisi()
    {
        $divisi = \App\Divisi::all()->sortBy('nama');
        return $divisi;
    }

    public function getdivisibyid($id)
    {
        $divisi = \App\Divisi::find($id);
         return $divisi;
    }

    public function addDivisi(Divisi $divisi){
        if($divisi->id == null ){
            $divisi->id = (Divisi::max('id'))+1;
            $divisi->save();
            return 'Data Berhasil di Simpan';
        }else{
            $divisiUpdate = new \App\Divisi;
            $divisiUpdate = \App\Divisi::find($divisi->id);
            $divisiUpdate->update($divisi->toArray());
            return 'Data Berhasil Update';            
        }
    }

    public function deldivisibyid($id)
    {
        $divisi = \App\Divisi::find($id);
        $divisi->delete();
        return 'Data Berhasil dihapus';
        
    }
}