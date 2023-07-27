<?php

namespace App\Http\Controllers;

use App\Eps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EpsController extends Controller
{
    public function index()
    {
        $epss = Eps::all();
        return view('Dashboard.Eps.Index', compact('epss'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:eps',
        ]);

        if ($validator->fails()) {
            if ($validator->errors()->has('name')) {
                return back()->withErrors('¡No se creó la eps por que ya existe!');
            }
        }

        $eps = new Eps();
        $eps->name = $request->name;
        $eps->save();

        return back()->withSuccess('¡Eps agregado satisfactoriamente!');
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
                Rule::unique('eps')->ignore($id),
            ],
        ]);

        if ($validator->fails()) {
            if ($validator->errors()->has('name')) {
                return back()->withErrors('¡No se editó la eps por que ya existe!');
            }
        }

        $eps = Eps::findOrFail($id);
        $eps->name = $request->name;
        $eps->save();

        return back()->withSuccess('¡Eps actualizado satisfactoriamente!');
    }

    public function destroy($id)
    {
        try{
            Eps::findOrFail($id)->delete();
            return back()->withSuccess('¡Eps eliminado satisfactoriamente!');
        }catch(\Exception $e){
            return back()->withErrors('¡Error al eliminar el eps!');
        }
    }
}
