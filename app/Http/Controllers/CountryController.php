<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countrys = Country::all();
        return view('Dashboard.Country.index', compact('countrys'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tourism_code' => 'required|unique:countrys|max:9',
            'name' => 'required|unique:countrys',
            'country_code' => 'required|unique:countrys|max:9',
        ]);
        
        if ($validator->fails()) {
            if ($validator->errors()->has('tourism_code')) {
                return back()->withErrors('¡El código de turismo ya existe o excede el límite de caracteres!');
            }
        
            if ($validator->errors()->has('name')) {
                return back()->withErrors('¡No se creó el pais por que ya existe!');
            }
        
            if ($validator->errors()->has('country_code')) {
                return back()->withErrors('¡El prefijo telefonico ya existe o excede el límite de caracteres!');
            }
        }

        $country = new Country();
        $country->tourism_code = $request->tourism_code;
        $country->name = $request->name;
        $country->country_code = $request->country_code;
        $country->save();

        return back()->withSuccess('¡Pais agregado satisfactoriamente!');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tourism_code' => [
                'max:9',
                'required',
                Rule::unique('countrys')->ignore($id),
            ],
            'name' => [
                'required',
                Rule::unique('countrys')->ignore($id),
            ],
            'country_code' => [
                'max:9',
                'required',
                Rule::unique('countrys')->ignore($id),
            ],
        ]);
        
        if ($validator->fails()) {
            if ($validator->errors()->has('tourism_code')) {
                return back()->withErrors('¡El código de turismo ya existe o excede el límite de caracteres!');
            }
        
            if ($validator->errors()->has('name')) {
                return back()->withErrors('¡No se editó el pais por que ya existe!');
            }
        
            if ($validator->errors()->has('country_code')) {
                return back()->withErrors('¡El prefijo telefonico ya existe o excede el límite de caracteres!');
            }
        }

        $country = Country::findOrFail($id);
        $country->tourism_code = $request->tourism_code;
        $country->name = $request->name;
        $country->country_code = $request->country_code;
        $country->save();

        return back()->withSuccess('¡Pais actualizado satisfactoriamente!');

    }

    public function destroy($id)
    {
        try{
            Country::findOrFail($id)->delete();
            return back()->withSuccess('¡Pais eliminado satisfactoriamente!');
        }catch(\Exception $e){
            return back()->withErrors('¡Error al eliminar el pais!');
        }   
    }
}
