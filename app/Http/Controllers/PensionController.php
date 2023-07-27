<?php

namespace App\Http\Controllers;

use App\Pension;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PensionController extends Controller
{
    public function index()
    {
        $pensions = Pension::all();
        return view('Dashboard.Pension.Index', compact('pensions'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:pensions',
            'description' => 'required|unique:pensions|max:255',
        ]);

        if ($validator->fails()) {
            if ($validator->errors()->has('name')) {
                return back()->withErrors('¡No se creó el fondo de pensión por que ya existe!');
            }
            if ($validator->errors()->has('description')) {
                $descriptionErrors = '¡No se creó el fondo de pensión porque la descripción ';
                $descriptionErrors .= $validator->errors()->first('description');
                $descriptionErrors = str_replace('El campo ','',$descriptionErrors); 
                return back()->withErrors($descriptionErrors);
            }
        }

        $pension = new Pension();
        $pension->name = $request->name;
        $pension->description = $request->description;
        $pension->save();

        return back()->withSuccess('¡Fondo de pensión creada satisfactoriamente!');
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
                Rule::unique('pensions')->ignore($id),
            ],
            'description' => [
                'required',
                'max:255',
                Rule::unique('pensions')->ignore($id),
            ],
        ]);
        
        if ($validator->fails()) {
            if ($validator->errors()->has('name')) {
                return back()->withErrors('¡No se editó el fonod de pensión por que ya existe!');
            }
            if ($validator->errors()->has('description')) {
                $descriptionErrors = '¡No se editó el fonod de pensión por que la descripción ';
                $descriptionErrors .= $validator->errors()->first('description');
                $descriptionErrors = str_replace('El campo ','',$descriptionErrors); 
                return back()->withErrors($descriptionErrors);
            }
        }
        $pension = Pension::findOrFail($id);
        $pension->name = $request->name;
        $pension->description = $request->description;
        $pension->save();

        return back()->withSuccess('¡Fondo de pensión actualizado satisfactoriamente!');
    }

    public function destroy($id)
    {
        try{
            Pension::findOrFail($id)->delete();
            return back()->withSuccess('¡Fondo de pensión eliminado satisfactoriamente!');
        }catch(\Exception $e){
            return back()->withErrors('¡Error al eliminar el fondo de pensión!');
        }  
    }
}
