<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Endpoint;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user($id=null){
        $endpointslist = Endpoint::all();
        $categorylist = Category::all();
        $alldata=[];
        foreach ($endpointslist as $el)
        {
            foreach ($categorylist as $cl)
            {
                //endpointler ilgili kategorilere göre gruplaması yapıldı ve endpointe ait tüm verilerin alinmasi
                  if ($el['category'] ===  $cl['id']){
                   // $alldata[$cl['name']][] = $el->name;
                    $alldata[$cl['name']][$el->name] = $el->toArray();
                }
            }
        }
        //bu alanda if null sorgusu atman gerekiyor
        if ($id==null)
        {
            return view('user_dashboard', compact('categorylist','alldata'));
        } else {
            $data = Endpoint::find($id);
            $data_model=$data->toArray();
            // dd($data_model);
            return view('user_dashboard', compact('categorylist','alldata','data_model'));
        }
    }
     /*public function endpoint_data($id=null)
    {
        $data = Endpoint::find($id);
        $data_model=$data->toArray();
       // dd($data_model);
        return view('user_dashboard',compact('data_model'));
    }*/
    public function request(Request $request)
    {
        dd($request);
        if($request->ajax()){
            return "AJAX";
        }
        return "HTTP";

    }




 }
