<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Endpoint;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function user()
    {
        $user = new User();
        $user->name = 'admin';
        $user->password = Hash::make('1234');//laravel'de şifrenin hashlenmesi
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
        return view('dashboard');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('admin.login');
    }

    //Login Authentication işlemlerin de password'un hashlenmesi gerekiyor.Hashlenen password veritabanında hasslenmiş olarak tutulduğu için bu iişlem authentication'da gerekli.
    public function katekle()
    {
        return view('kategori');
    }

    public function katliste()
    {
        return view('katliste');
    }

    public function store(Request $request)
    {
        $cat = new Category();
        $cat->name = $request->get('name');
        $cat->order = $request->get('order');
        $cat->description = $request->get('description');
        $cat->save();
        Alert::toast('Kategori başarılı şekilde eklendi', 'success');
        //Alert::success('Kategori başarılı şekilde eklendi.');
        return redirect()->route('katekle');

    }

    public function show()
    {
        $categories = Category::all();
        return view('katliste', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $cat = Category::find($id);
        $cat->name = $request->get('name');
        $cat->order = $request->get('order');
        $cat->description = $request->get('description');
        $cat->save();
        Alert::toast('Kategori başarılı şekilde güncellendi', 'success');
        // Alert::success('Kategori başarılı şekilde güncellendi.');
        return redirect()->route('show');
    }

    public function edit($id)
    {
        $cat = Category::find($id);
        return view('cat_update', compact('cat', 'id'));
    }

    public function destroy($id)
    {
        $cat = Category::find($id);
        $cat->delete();
        Alert::toast('Kategori başarılı şekilde silindi', 'success');
        //Alert::success('Kategori başarılı şekilde silindi.');
        return redirect('admin/showcategories');
    }

    //Endpoint
    public function endpointstore()
    {
        $cat_names= Category::all();
        return view('endpointstore', compact('cat_names'));

    }

    public function endpointlist()
    {
        return view('endpointlist');
    }

    public function get_ajax_endpoint(Request $request)
    {
        Endpoint::create($request->endpoint);
        //Alert::toast('Endpoint başarılı şekilde veritabanına eklendi.', 'success');
        return redirect()->to('/admin/endpointstore');
        //return redirect()->route('endpointstore');

    }

    public function endpointshow()
    {
        $endpoints = Endpoint::all();
        $category = Category::all()->toArray();
        $category_names = [];
       /* foreach ($category as $c) {
            $category_names[(string) $c->_id] = $c->name;
        }*/
        $category_names = array_column($category, 'name', '_id');
        return view('endpointlist', compact('endpoints', 'category_names'));
    }


}

