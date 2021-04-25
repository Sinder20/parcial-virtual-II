<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Departamento;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\DepartamentoFormRequest;
use DB;

class DepartamentoController extends Controller
{
    public function __construct()
    {

    }
    public  function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $departamentos=DB::table('departamento')->where('nombre','LIKE','%'.$query.'%')->orderBy('id_departamento','asc')->paginate(7);
            return view('almacen.departamento.index',["departamentos"=>$departamentos,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("almacen.departamento.create");
    }
    public function store(DepartamentoFormRequest $request)
    {
        $departamento=new Departamento;
        $departamento->nombre=$request->get('nombre');
        $departamento->save();
        return Redirect::to('almacen/departamento');
    }
    public function show($id)
    {
        return view("almacen.departamento.show",["departamento"=>Departamento::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.departamento.edit",["departamento"=>Departamento::findOrFail($id)]);
    }
    public function update(DepartamentoFormRequest $request,$id)
    {
        $departamento=Departamento::findOrFail($id);
        $departamento->nombre=$request->get('nombre');
        $departamento->update();
        return Redirect::to('almacen/departamento');
    }
    public function destroy($id)
    {
        $departamento=Departamento::findOrFail($id);
        $departamento->delete();
        $departamento->update();
        return Redirect::to('almacen/departamento');
    }
}

