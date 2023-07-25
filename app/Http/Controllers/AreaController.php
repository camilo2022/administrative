<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::all();
        return view('Dashboard.Area.Index', compact('areas'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:areas',
        ]);

        if ($validator->fails()) {
            if ($validator->errors()->has('name')) {
                return back()->withErrors('¡No se creó el area por que ya existe!');
            }
        }

        $area = new Area();
        $area->name = $request->name;
        $area->save();

        return back()->withSuccess('¡Area agregada satisfactoriamente!');
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
                Rule::unique('areas')->ignore($id),
            ],
        ]);
        
        if ($validator->fails()) {
            if ($validator->errors()->has('name')) {
                return back()->withErrors('¡No se editó el area por que ya existe!');
            }
        }

        $area = Area::findOrFail($id);
        $area->name = $request->name;
        $area->save();

        return back()->withSuccess('¡Area actualizada satisfactoriamente!');
    }

    public function destroy($id)
    {
        try{
            Area::findOrFail($id)->delete();
            return back()->withSuccess('¡Area eliminada satisfactoriamente!');
        }catch(\Exception $e){
            return back()->withErrors('¡Error al eliminar el area!');
        } 
    }
}
