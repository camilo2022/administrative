<?php

namespace App\Http\Controllers;

use App\Rank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RankController extends Controller
{
    public function index()
    {
        $ranks = Rank::all();
        return view('Dashboard.Rank.Index', compact('ranks'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:ranks',
        ]);

        if ($validator->fails()) {
            if ($validator->errors()->has('name')) {
                return back()->withErrors('¡No se creó el rango por que ya existe!');
            }
        }

        $rank = new Rank();
        $rank->name = $request->name;
        $rank->save();

        return back()->withSuccess('¡Rango agregado satisfactoriamente!');
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
                Rule::unique('ranks')->ignore($id),
            ],
        ]);
        
        if ($validator->fails()) {
            if ($validator->errors()->has('name')) {
                return back()->withErrors('¡No se editó el rango por que ya existe!');
            }
        }

        $rank = Rank::findOrFail($id);
        $rank->name = $request->name;
        $rank->save();

        return back()->withSuccess('¡Rango actualizado satisfactoriamente!');
    }

    public function destroy($id)
    {
        try{
            Rank::findOrFail($id)->delete();
            return back()->withSuccess('¡Rango eliminado satisfactoriamente!');
        }catch(\Exception $e){
            return back()->withErrors('¡Error al eliminar el rango!');
        } 
    }
}
