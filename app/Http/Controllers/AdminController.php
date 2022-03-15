<?php

namespace App\Http\Controllers;
use App\Models\AdminModel;
use Illuminate\Support\Facades\Auth;

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
    public function adminpost(Request $request)
    {
     // dd($request->post());
        $user = $request->validate([
            'username' => ['required', 'username'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($user)) {
            $request->session()->regenerate();

            return redirect()->intended('admin.dashboard');
        }
        return back()->withErrors([
            'username' => 'Kullanıcı bilgileri yanlış',
        ]);

    }
    public function dashboard()
    {
        return view('master.dashboard');
    }
    public function logout()
    {
        return view('');
    }

}
