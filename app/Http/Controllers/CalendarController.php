<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\CorpuEvent;
class CalendarController extends Controller
{
    public function calendar()
    {
        $epent = \App\CorpuEvent::all();
        //  dd($event->all());
        return view('/calendar',['epentlist'=>$epent]);
    }
}
