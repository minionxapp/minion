<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParameterController extends Controller
{
    public function parameter()
    {
        $param = \App\Parameter::all();
        return view('/admin/parameter',compact('param'));
    }
}
