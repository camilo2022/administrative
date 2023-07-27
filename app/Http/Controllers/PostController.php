<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;
use App\Post;
use Illuminate\Validation\Rule;
use PhpParser\Node\Expr\AssignOp\Pow;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('area')->get();
        $areas = Area::all();
        return view('Dashboard.Post.Index', compact('posts','areas'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:posts',
            'description' => 'required|unique:posts|max:255',
        ]);

        if ($validator->fails()) {
            if ($validator->errors()->has('name')) {
                return back()->withErrors('¡No se creó el cargo por que ya existe!');
            }
            if ($validator->errors()->has('description')) {
                $descriptionErrors = '¡No se creó el cargo porque la descripción ';
                $descriptionErrors .= $validator->errors()->first('description');
                $descriptionErrors = str_replace('El campo ','',$descriptionErrors); 
                return back()->withErrors($descriptionErrors);
            }
        }

        $post = new Post();
        $post->name = $request->name;
        $post->description = $request->description;
        $post->id_area = $request->id_area;
        $post->save();

        return back()->withSuccess('¡Cargo agregado satisfactoriamente!');
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
                Rule::unique('posts')->ignore($id),
            ],
            'description' => [
                'required',
                'max:255',
                Rule::unique('posts')->ignore($id),
            ],
        ]);
        
        if ($validator->fails()) {
            if ($validator->errors()->has('name')) {
                return back()->withErrors('¡No se editó el cargo por que ya existe!');
            }
            if ($validator->errors()->has('description')) {
                $descriptionErrors = '¡No se editó el cargo porque la descripción ';
                $descriptionErrors .= $validator->errors()->first('description');
                $descriptionErrors = str_replace('El campo ','',$descriptionErrors); 
                return back()->withErrors($descriptionErrors);
            }
        }
        $post = Post::findOrFail($id);
        $post->name = $request->name;
        $post->description = $request->description;
        $post->id_area = $request->id_area;
        $post->save();

        return back()->withSuccess('¡Cargo actualizado satisfactoriamente!');
    }

    public function destroy($id)
    {
        try{
            Post::findOrFail($id)->delete();
            return back()->withSuccess('¡Cargo eliminado satisfactoriamente!');
        }catch(\Exception $e){
            return back()->withErrors('¡Error al eliminar el cargo!');
        }  
    }
}
