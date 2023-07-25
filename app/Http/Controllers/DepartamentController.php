<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Departament;
use App\Country;

class DepartamentController extends Controller
{
    public function index()
    {
        $departaments = Departament::with('country')->get();
        $countrys = Country::all();
        return view('Dashboard.Departament.Index', compact('departaments','countrys'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:departaments',
        ]);

        if ($validator->fails()) {
            if ($validator->errors()->has('name')) {
                return back()->withErrors('¡No se creó el departamento por que ya existe!');
            }
        }

        $departament = new Departament();
        $departament->name = $request->name;
        $departament->id_country = $request->id_country;
        $departament->save();

        return back()->withSuccess('¡Departamento agregado satisfactoriamente!');
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
                Rule::unique('departaments')->ignore($id),
            ],
        ]);
        
        if ($validator->fails()) {
            if ($validator->errors()->has('name')) {
                return back()->withErrors('¡No se editó el departamento por que ya existe!');
            }
        }
        $departament = Departament::findOrFail($id);
        $departament->name = $request->name;
        $departament->id_country = $request->id_country;
        $departament->save();

        return back()->withSuccess('¡Departamento actualizado satisfactoriamente!');
    }

    public function destroy($id)
    {
        try{
            Departament::findOrFail($id)->delete();
            return back()->withSuccess('¡Departamento eliminado satisfactoriamente!');
        }catch(\Exception $e){
            return back()->withErrors('¡Error al eliminar el departamento!');
        }  
    }
}
