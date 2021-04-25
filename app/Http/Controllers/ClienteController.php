<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Cliente;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ClienteFormRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use DB;

class ClienteController extends Controller
{
    public function __construct()
    {

    }
    public  function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $clientes=DB::table('cliente as c')
            ->join('categoria as ca','c.id_categoria','=','ca.id_categoria')
            ->join('genero as g','c.id_genero','=','g.id_genero')
            ->join('departamento as d','c.id_departamento','=','d.id_departamento')
            ->select('c.id_cliente','c.nit','c.nombre as nombre_cliente','c.fecha_nacimiento','c.edad','c.correo','c.telefono','ca.nombre as nombre_categoria','g.nombre as nombre_genero','d.nombre as nombre_departamento')
            ->where('c.nombre','LIKE','%'.$query.'%')
            ->orderBy('id_cliente','asc')
            ->paginate(7);
            return view('almacen.cliente.index',["clientes"=>$clientes,"searchText"=>$query]);
        }
    }
    public function create()
    {
        $categorias=DB::table('categoria')->get();
        $generos=DB::table('genero')->get();
        $departamentos=DB::table('departamento')->get();
        return view("almacen.cliente.create",["categorias"=>$categorias,"generos"=>$generos,"departamentos"=>$departamentos]);
    }
    public function store(ClienteFormRequest $request)
    {
        $cliente=new Cliente;
        $cliente->nit=$request->get('nit');
        $cliente->nombre=$request->get('nombre');
        $cliente->fecha_nacimiento=$request->get('fecha_nacimiento');
        $cliente->edad=$request->get('edad');
        $cliente->correo=$request->get('correo');
        $cliente->telefono=$request->get('telefono');
        $cliente->id_categoria=$request->get('id_categoria');
        $cliente->id_genero=$request->get('id_genero');
        $cliente->id_departamento=$request->get('id_departamento');
        $cliente->save();
        return Redirect::to('almacen/cliente');
    }
    public function show($id)
    {
        return view("almacen.cliente.show",["cliente"=>Cliente::findOrFail($id)]);
    }
    public function edit($id)
    {
        $clientes=Cliente::findOrFail($id);
        $categoria=DB::table('categoria')->get();
        $genero=DB::table('genero')->get();
        $departamento=DB::table('departamento')->get();
        return view("almacen.cliente.edit",["cliente"=>$clientes::findOrFail($id),"categoria"=>$categoria,"genero"=>$genero, "departamento"=>$departamento]);
    }
    public function update(ClienteFormRequest $request,$id)
    {
        $cliente=Cliente::findOrFail($id);
        $cliente->nit=$request->get('nit');
        $cliente->nombre=$request->get('nombre');
        $cliente->fecha_nacimiento=$request->get('fecha_nacimiento');
        $cliente->edad=$request->get('edad');
        $cliente->correo=$request->get('correo');
        $cliente->telefono=$request->get('telefono');
        $cliente->id_categoria=$request->get('id_categoria');
        $cliente->id_genero=$request->get('id_genero');
        $cliente->id_departamento=$request->get('id_departamento');
        $cliente->update();
        return Redirect::to('almacen/cliente');
    }
    public function destroy($id)
    {
        $cliente=Cliente::findOrFail($id);
        $cliente->delete();
        $cliente->update();
        return Redirect::to('almacen/cliente');
    }
}


