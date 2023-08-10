<?php

namespace App\Http\Controllers;

use App\Area;
use App\Arl;
use App\City;
use App\Country;
use App\Departament;
use App\DocumentType;
use App\Employee;
use App\Eps;
use App\Pension;
use App\Person;
use App\Post;
use App\Rank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('person')->where('enterprise_id','=',Auth::user()->enterprises_id)->get();
        return view('Dashboard.Employee.Index',compact('employees'));
    }

    public function create()
    {
        $document_types = DocumentType::all();
        $countrys = Country::all();
        $departaments = Departament::all();
        $citys = City::all();
        $epss = Eps::all();
        $arls = Arl::all();
        $areas = Area::all();
        $posts = Post::all();
        $pensions = Pension::all();
        $ranks = Rank::all();
        return view('Dashboard.Employee.Create',compact('document_types','countrys','departaments','citys','epss','arls','areas','posts','pensions','ranks'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'document_number' => 'required|unique:persons',
        ]);

        if ($validator->fails()) {
            if ($validator->errors()->has('document_number')) {
                return back()->withErrors('¡No se creó el empleado por que el numero de cedula ya pertenece a otro!');
            }
        }

        $person = new Person();
        $person->name = $request->name;
        $person->lastname = $request->lastname;
        $person->document_type_id = $request->document_type_id;
        $person->document_number = $request->document_number;
        $person->telephone = $request->telephone;
        $person->email = $request->email;
        $person->sex = $request->sex;
        $person->address = $request->address;
        $person->neighborhood = $request->neighborhood;
        $person->type_blood = $request->type_blood;
        $person->city_id = $request->city_id;
        $person->save();

        $employee = new Employee();
        $employee->civil_state = $request->civil_state;
        $employee->date_of_birth = $request->date_of_birth;
        $employee->date_of_expedition = $request->date_of_expedition;
        $employee->arl_rate = $request->arl_rate;
        $employee->affiliation_date_eps = $request->affiliation_date_eps;
        $employee->affiliation_date_arl = $request->affiliation_date_arl;
        if($request->hasFile('photography')){
            $name_encrypt = $request->photography->store('photographyEmployee','local');
            $employee->photography = $name_encrypt;
        }
        $employee->person_id = $person->id;
        $employee->post_id = $request->post_id;
        $employee->rank_id = $request->rank_id;
        $employee->arl_id = $request->arl_id;
        $employee->eps_id = $request->eps_id;
        $employee->pension_id = $request->pension_id;
        $employee->enterprise_id = Auth::user()->enterprises_id;
        $employee->save();

        return redirect()->route('Dashboard.Employee.Index')->withSuccess('¡Empleado agregado satisfactoriamente!');
    }
}
