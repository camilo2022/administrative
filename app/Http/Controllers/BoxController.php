<?php

namespace App\Http\Controllers;

use App\Box;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class BoxController extends Controller
{
    public function index()
    {
        $boxes = Box::all();
        return view('Dashboard.Box.Index', compact('boxes'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:boxes',
            'description' => 'required|unique:boxes|max:255',
        ]);

        if ($validator->fails()) {
            if ($validator->errors()->has('name')) {
                return back()->withErrors('¡No se creó la caja de compensación por que ya existe!');
            }
            if ($validator->errors()->has('description')) {
                $descriptionErrors = '¡No se creó la caja de compensación porque la descripción ';
                $descriptionErrors .= $validator->errors()->first('description');
                $descriptionErrors = str_replace('El campo ','',$descriptionErrors); 
                return back()->withErrors($descriptionErrors);
            }
        }

        $box = new Box();
        $box->name = $request->name;
        $box->description = $request->description;
        $box->save();

        return back()->withSuccess('¡Caja de compensación creada satisfactoriamente!');
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
                Rule::unique('boxes')->ignore($id),
            ],
            'description' => [
                'required',
                'max:255',
                Rule::unique('boxes')->ignore($id),
            ],
        ]);
        
        if ($validator->fails()) {
            if ($validator->errors()->has('name')) {
                return back()->withErrors('¡No se editó la caja de compensación por que ya existe!');
            }
            if ($validator->errors()->has('description')) {
                $descriptionErrors = '¡No se editó la caja de compensación por que la descripción ';
                $descriptionErrors .= $validator->errors()->first('description');
                $descriptionErrors = str_replace('El campo ','',$descriptionErrors); 
                return back()->withErrors($descriptionErrors);
            }
        }
        $box = Box::findOrFail($id);
        $box->name = $request->name;
        $box->description = $request->description;
        $box->save();

        return back()->withSuccess('¡Caja de compensación actualizado satisfactoriamente!');
    }

    public function destroy($id)
    {
        try{
            Box::findOrFail($id)->delete();
            return back()->withSuccess('¡Caja de compensación eliminado satisfactoriamente!');
        }catch(\Exception $e){
            return back()->withErrors('¡Error al eliminar la caja de compensación!');
        }  
    }
}
