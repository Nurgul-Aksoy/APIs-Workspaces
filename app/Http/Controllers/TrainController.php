<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainModel;

class TrainController extends Controller
{
    //

    public function create(Request $request)
    {
        dd($request);
        return view('traincreate');
    }
    public function store(Request $request) //verileri veritabanına kaydetmek
    {
        $person = new TrainModel();
        $person->isim = $request->get('isim');
        $person->soyad = $request->get('soyad');
        $person->save();
        return redirect('person')->with('kontrol', 'Kişi başarılı şekilde eklendi.');

    }
    public function index()
    {
        $trains=TrainModel::all(); //modelden gelen tüm veriler
        return view('trainindex',compact('trains'));
    }
    public function edit($id)
    {

        $trainmodel = TrainModel::find($id);
        return view('trainedit',compact('trainmodel','id'));
    }

    public function update(Request $request, $id)
    {
        $tmodel= TrainModel::find($id);
        $tmodel->isim = $request->get('isim');
        $tmodel->soyad = $request->get('soyad');
        $tmodel->save();
        return redirect('tmodel')->with('success', 'Başarılı şekilde güncellenmiştir.');
    }

    public function destroy($id)
    {
        $trnmodel= TrainModel::find($id);
        $trnmodel->delete();
        return redirect('trnmodel')->with('success','Silindi.');
    }
}
