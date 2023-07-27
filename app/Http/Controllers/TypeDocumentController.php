<?php

namespace App\Http\Controllers;

use App\TypeDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TypeDocumentController extends Controller
{
    public function index()
    {
        $type_documents = TypeDocument::all();
        return view('Dashboard.TypeDocument.Index', compact('type_documents'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:type_document',
            'description' => 'required|unique:type_document|max:255',
        ]);

        if ($validator->fails()) {
            if ($validator->errors()->has('name')) {
                return back()->withErrors('¡No se creó el tipo de documento por que ya existe!');
            }
            if ($validator->errors()->has('description')) {
                $descriptionErrors = '¡No se creó el tipo de documento porque la descripción ';
                $descriptionErrors .= $validator->errors()->first('description');
                $descriptionErrors = str_replace('El campo ','',$descriptionErrors);
                return back()->withErrors($descriptionErrors);
            }
        }

        $type_document = new TypeDocument();
        $type_document->name = $request->name;
        $type_document->description = $request->description;
        $type_document->save();

        return back()->withSuccess('¡Tipo de documento agregado satisfactoriamente!');
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
                Rule::unique('type_document')->ignore($id),
            ],
            'description' => [
                'required',
                'max:255',
                Rule::unique('type_document')->ignore($id),
            ],
        ]);

        if ($validator->fails()) {
            if ($validator->errors()->has('name')) {
                return back()->withErrors('¡No se editó el tipo de documento por que ya existe!');
            }
            if ($validator->errors()->has('description')) {
                $descriptionErrors = '¡No se editó el tipo de documento porque la descripción ';
                $descriptionErrors .= $validator->errors()->first('description');
                $descriptionErrors = str_replace('El campo ','',$descriptionErrors);
                return back()->withErrors($descriptionErrors);
            }
        }
        $type_document = TypeDocument::findOrFail($id);
        $type_document->name = $request->name;
        $type_document->description = $request->description;
        $type_document->save();

        return back()->withSuccess('¡Tipo de documento actualizado satisfactoriamente!');
    }

    public function destroy($id)
    {
        try{
            TypeDocument::findOrFail($id)->delete();
            return back()->withSuccess('¡Tipo de documento eliminado satisfactoriamente!');
        }catch(\Exception $e){
            return back()->withErrors('¡Error al eliminar el tipo de documento!');
        }
    }
}
