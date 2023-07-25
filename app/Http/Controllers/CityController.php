<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Departament;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CityController extends Controller
{
    public function index()
    {
        $citys = City::with('departament')->get();
        $departaments = Departament::all();
        return view('Dashboard.City.Index', compact('citys','departaments'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:citys',
        ]);

        if ($validator->fails()) {
            if ($validator->errors()->has('name')) {
                return back()->withErrors('¡No se creó la ciudad por que ya existe!');
            }
        }

        $city = new City();
        $city->name = $request->name;
        $city->id_departament = $request->id_departament;
        $city->save();

        return back()->withSuccess('¡Ciudad agregada satisfactoriamente!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                Rule::unique('citys')->ignore($id),
            ],
        ]);
        
        if ($validator->fails()) {
            if ($validator->errors()->has('name')) {
                return back()->withErrors('¡No se editó la ciudad por que ya existe!');
            }
        }

        $city = City::findOrFail($id);
        $city->name = $request->name;
        $city->id_departament = $request->id_departament;
        $city->save();

        return back()->withSuccess('¡Ciudad actualizada satisfactoriamente!');
    }

    public function destroy($id)
    {
        try{
            City::findOrFail($id)->delete();
            return back()->withSuccess('¡Ciudad eliminada satisfactoriamente!');
        }catch(\Exception $e){
            return back()->withErrors('¡Error al eliminar la ciudad!');
        } 
    }
}
