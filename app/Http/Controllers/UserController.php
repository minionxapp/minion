<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use App\Divisi;
use DataTables;

class UserController extends Controller
{
    public function user(){
        $users = \App\User::all();
        $divisi = \App\Divisi::all();
        // return view('/user',compact('users'));

        return view('/user',['users'=>$users,'divisis'=>$divisi]);

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


    public function getUser(){
        return Datatables::of(User::all())
        ->addColumn('action', function($row){       
            $btn = '<a href="#" onclick="viewFunction(\''.$row->id.'\');" class="edit btn btn-info btn-sm">View</a> ';
            $btn = $btn.' <a href="#" onclick="editFunction(\''.$row->id.'\');" class="edit btn btn-primary btn-sm">Edit</a>';
            $btn = $btn.' <a href="/admin/delUserbyId/'.$row->id.'" class="edit btn btn-danger btn-sm"  onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
            return $btn;
        })
        ->addColumn('nama_divisi', function($row){  
            // alert($row);
            // dd($row);
            $divisi =$row->divisi->nama;
            return $divisi;
        })

        ->rawColumns(['action','nama_divisi'])
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
