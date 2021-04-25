<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Genero;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\GeneroFormRequest;
use DB;

class GeneroController extends Controller
{
    public function __construct()
    {

    }
    public  function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $generos=DB::table('genero')->where('nombre','LIKE','%'.$query.'%')->orderBy('id_genero','asc')->paginate(7);
            return view('almacen.genero.index',["generos"=>$generos,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("almacen.genero.create");
    }
    public function store(GeneroFormRequest $request)
    {
        $genero=new Genero;
        $genero->nombre=$request->get('nombre');
        $genero->save();
        return Redirect::to('almacen/genero');
    }
    public function show($id)
    {
        return view("almacen.genero.show",["genero"=>Genero::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.genero.edit",["genero"=>Genero::findOrFail($id)]);
    }
    public function update(GeneroFormRequest $request,$id)
    {
        $genero=Genero::findOrFail($id);
        $genero->nombre=$request->get('nombre');
        $genero->update();
        return Redirect::to('almacen/genero');
    }
    public function destroy($id)
    {
        $genero=Genero::findOrFail($id);
        $genero->delete();
        $genero->update();
        return Redirect::to('almacen/genero');
    }
}

