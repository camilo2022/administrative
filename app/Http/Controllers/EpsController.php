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
        $banks = Eps::all();
        return view('Dashboard.Bank.Index', compact('banks'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:banks',
        ]);

        if ($validator->fails()) {
            if ($validator->errors()->has('name')) {
                return back()->withErrors('¡No se creó el banco por que ya existe!');
            }
        }

        $bank = new Bank();
        $bank->name = $request->name;
        $bank->save();

        return back()->withSuccess('¡Banco agregado satisfactoriamente!');
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
                Rule::unique('banks')->ignore($id),
            ],
        ]);
        
        if ($validator->fails()) {
            if ($validator->errors()->has('name')) {
                return back()->withErrors('¡No se editó el banco por que ya existe!');
            }
        }

        $bank = Bank::findOrFail($id);
        $bank->name = $request->name;
        $bank->save();

        return back()->withSuccess('¡Banco actualizado satisfactoriamente!');
    }

    public function destroy($id)
    {
        try{
            Bank::findOrFail($id)->delete();
            return back()->withSuccess('¡Banco eliminado satisfactoriamente!');
        }catch(\Exception $e){
            return back()->withErrors('¡Error al eliminar el bancoo!');
        } 
    }
}
