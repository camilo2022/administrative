<?php

namespace App\Http\Controllers;

use App\ContractType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TypeContractController extends Controller
{
    public function index()
    {
        $type_contracts = ContractType::all();
        return view('Dashboard.TypeContract.Index', compact('type_contracts'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:type_contract',
            'description' => 'required|unique:type_contract|max:255',
        ]);

        if ($validator->fails()) {
            if ($validator->errors()->has('name')) {
                return back()->withErrors('¡No se creó el tipo de contrato por que ya existe!');
            }
            if ($validator->errors()->has('description')) {
                $descriptionErrors = '¡No se creó el tipo de contrato porque la descripción ';
                $descriptionErrors .= $validator->errors()->first('description');
                $descriptionErrors = str_replace('El campo ','',$descriptionErrors);
                return back()->withErrors($descriptionErrors);
            }
        }

        $type_contract = new ContractType();
        $type_contract->name = $request->name;
        $type_contract->description = $request->description;
        $type_contract->save();

        return back()->withSuccess('¡Tipo de Contrato agregado satisfactoriamente!');
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
                Rule::unique('type_contract')->ignore($id),
            ],
            'description' => [
                'required',
                'max:255',
                Rule::unique('type_contract')->ignore($id),
            ],
        ]);

        if ($validator->fails()) {
            if ($validator->errors()->has('name')) {
                return back()->withErrors('¡No se editó el tipo de contrato por que ya existe!');
            }
            if ($validator->errors()->has('description')) {
                $descriptionErrors = '¡No se editó el tipo de contrato porque la descripción ';
                $descriptionErrors .= $validator->errors()->first('description');
                $descriptionErrors = str_replace('El campo ','',$descriptionErrors);
                return back()->withErrors($descriptionErrors);
            }
        }
        $type_contract = ContractType::findOrFail($id);
        $type_contract->name = $request->name;
        $type_contract->description = $request->description;
        $type_contract->save();

        return back()->withSuccess('¡Tipo de Contrato actualizado satisfactoriamente!');
    }

    public function destroy($id)
    {
        try{
            ContractType::findOrFail($id)->delete();
            return back()->withSuccess('¡Tipo de Contrato eliminado satisfactoriamente!');
        }catch(\Exception $e){
            return back()->withErrors('¡Error al eliminar el tipo de contrato!');
        }
    }
}
