@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de Clientes <a href="cliente/create"><button class="btn btn-success">Nuevo</button></a></h3>
            @include('almacen.cliente.search')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                    <th>Id</th>
                    <th>NIT</th>
                    <th>Nombre</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Edad</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Categoria</th>
                    <th>Genero</th>
                    <th>Departamento</th>
                    <th>Opciones</th>
                    </thead>
                    @foreach ($clientes as $cl)
                        <tr>
                            <td>{{ $cl->id_cliente }}</td>
                            <td>{{ $cl->nit }}</td>
                            <td>{{ $cl->nombre_cliente }}</td>
                            <td>{{ $cl->fecha_nacimiento }}</td>
                            <td>{{ $cl->edad }}</td>
                            <td>{{ $cl->correo }}</td>
                            <td>{{ $cl->telefono }}</td>
                            <td>{{ $cl->nombre_categoria }}</td>
                            <td>{{ $cl->nombre_genero }}</td>
                            <td>{{ $cl->nombre_departamento }}</td>
                            <td>
                                <a href="{{URL::action('ClienteController@edit',$cl->id_cliente)}}"><button class="btn btn-primary">Editar</button></a>
                                <a href="" data-target="#modal-delete-{{$cl->id_cliente}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                            </td>
                        </tr>
                    @include('almacen.cliente.modal')
                    @endforeach
                </table>
            </div>
            {{$clientes->render()}}
        </div>
    </div>
@endsection
