<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
class LoginController extends Controller
{
    public function login(){
        $users = User::all();
        return view('/login',['users'=>$users]);
    }

    public function loginProses(Request $request){
        if(Auth::attempt($request->only('user_id','password'))){
            return redirect('/dashboard');
        }else{
            // return redirect('admin/param')->with('sukses','Data Berhasil di Simpan');
            return redirect('/login')->with('sukses','Login Gagal, User Password tidak dikenal');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    
}
