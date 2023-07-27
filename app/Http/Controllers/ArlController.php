<?php

namespace App\Http\Controllers;

use App\Arl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ArlController extends Controller
{
    public function index()
    {
        $arls = Arl::all();
        return view('Dashboard.Arl.Index', compact('arls'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:arls',
        ]);

        if ($validator->fails()) {
            if ($validator->errors()->has('name')) {
                return back()->withErrors('¡No se creó la arl por que ya existe!');
            }
        }

        $arl = new Arl();
        $arl->name = $request->name;
        $arl->save();

        return back()->withSuccess('¡Arl agregado satisfactoriamente!');
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
                Rule::unique('arls')->ignore($id),
            ],
        ]);
        
        if ($validator->fails()) {
            if ($validator->errors()->has('name')) {
                return back()->withErrors('¡No se editó la arl por que ya existe!');
            }
        }

        $arl = Arl::findOrFail($id);
        $arl->name = $request->name;
        $arl->save();

        return back()->withSuccess('¡Arl actualizado satisfactoriamente!');
    }

    public function destroy($id)
    {
        try{
            Arl::findOrFail($id)->delete();
            return back()->withSuccess('¡Arl eliminado satisfactoriamente!');
        }catch(\Exception $e){
            return back()->withErrors('¡Error al eliminar la arl!');
        } 
    }
}
