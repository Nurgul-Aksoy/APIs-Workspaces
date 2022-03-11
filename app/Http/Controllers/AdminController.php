<?php

namespace App\Http\Controllers;
use App\Models\AdminModel;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function user()
    {
        $user=new AdminModel;
        $user->username='admin';
        $user->password='1234';
        $user->save();
    }

    public function login()
    {
        return view('login');
    }


}
