<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function getallrole()
    {
        $role = \App\Role::all();
        return json_encode($role);
    }
}
