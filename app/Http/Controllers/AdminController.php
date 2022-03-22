<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function user()
    {
        $user=new User();
        $user->name='admin';
        $user->password= Hash::make('1234');//laravel'de şifrenin hashlenmesi
        $user->save();
    }
    public function login()
    {
        return view('login');
    }

    public function adminpost(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
                return redirect()->to('/admin/dashboard');
        }
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function dashboard()
    {
        return view('master.dashboard');
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('admin.login');
    }
    //Login Authentication işlemlerin de password'un hashlenmesi gerekiyor.Hashlenen password veritabanında hasslenmiş olarak tutulduğu için bu iişlem authentication'da gerekli.
    public function katekle()
    {

    }

}
