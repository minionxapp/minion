<?php
namespace App\Services;
// use Illuminate\Http\Request;
use \App\Divisi;
use \App\Departement;
class DepartementService{
    public function getAllDepartement()
    {
        $departement = \App\Departement::all()->sortBy('nama');
        return $departement;
    }

    public function addDepartement(Departement $departement){
        if($departement->id == null ){
            $departement->save();
            return 'Data Berhasil di Simpan';
        }else{
            $departementUpdate = new \App\Departement;
            $departementUpdate = \App\Departement::find($departement->id);
            $departementUpdate->update($departement->toArray());
            return 'Data Berhasil Update';            
        }
    }

    public function deldepartementbyid($id)
    {
        $departement = \App\Departement::find($id);
        if ($departement!== null){
            $departement->delete();
            return 'Data Berhasil dihapus';

        }else{
            return 'HAPUS GAGAL...............';
        }
    }

    // public function getalldepartement()
    // {
    //     $departement = \App\Departement::all();
    //     return json_encode($departement);
    // }

}
