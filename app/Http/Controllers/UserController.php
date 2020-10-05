<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\User;
use App\Divisi;
use App\Departement;
use App\Role;
use DataTables;
// use App\Http\Controllers\DivisiController;

class UserController extends Controller
{
    public function user(){
        $users = \App\User::all();
        $divisi = (new \App\Services\DivisiService)->getAllDivisi();
        $roles = \App\Role::all();
        return view('/user',['users'=>$users,'divisis'=>$divisi,'roles'=>$roles]);

    }

    public function addUser(Request $request){
        $user = new \App\User;
        $user->user_id =$request->userid;
        $user->name =$request->name;
        $user->email =$request->email;
        $user->nama_unit_kerja =$request->nama_unit_kerja;
        $user->role =$request->role;
        $user->departemen =$request->departemen;
        $user->divisi_kode =$request->divisi_kode;
        
        if($request->id == null  ){
            $user->password =bcrypt('123');
            $user->save();
            return redirect('admin/user')->with('sukses','Data Berhasil di Simpan');
        }else{
            // $user->id =$request->id;
            $userUpdate = new \App\User;
            $userUpdate = \App\User::find($request->id);
            $userUpdate->update($request->all());
            return redirect('/admin/user')->with('sukses','Data Berhasil Update');
            
        }
    }

    //buat menjadi library
    public function tombol($row_id){
            $btn = '<a href="#" onclick="viewFunction(\''.$row_id.'\');" class="edit btn btn-info btn-sm">View</a> ';
            $btn = $btn.' <a href="#" onclick="editFunction(\''.$row_id.'\');" class="edit btn btn-primary btn-sm">Edit</a>';
            $btn = $btn.' <a href="/admin/delUserbyId/'.$row_id.'" class="edit btn btn-danger btn-sm"  onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
            return $btn;
        }

    public function getUser(){
        // dd($users = \App\User::all());
        return Datatables::of(User::all())
        // untuk btn. sebaiknya di bikin function biarb bisa dipakai/reuse
        ->addColumn('action', function($row){       
            $userController = new UserController();
            return $userController->tombol($row->id);
        })
        ->addColumn('nama_divisi', function($row){  
            $divisi =$row->divisi->nama;
            return $divisi;
        })
        ->addColumn('nama_departement', function($row){  
            $departemen =$row->departement->nama;
            return $departemen;
            // $divisi =$row->divisi->nama;
            // return "gggg";
        })       

        ->rawColumns(['action','nama_divisi','nama_departement'])
        ->make(true);
    }


    public function getUserbyUserId($id)
    {
        $user = \App\User::find($id);
         return $user;
    }

    public function delUserbyId($id)
    {
        $user = \App\User::find($id);
        $user->delete();
        return redirect('/admin/user')->with('sukses','Data Berhasil dihapus');
    }


}
