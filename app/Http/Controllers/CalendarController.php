<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function calendar()
    {
        // $divisi = \App\Divisi::all();
        return view('/calendar');//,compact('divisi'));
    }
}
