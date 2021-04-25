@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de Generos <a href="genero/create"><button class="btn btn-success">Nuevo</button></a></h3>
            @include('almacen.genero.search')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                    <th>Id</th>
                    <th>Genero</th>
                    <th>Opciones</th>
                    </thead>
                    @foreach ($generos as $cat)
                        <tr>
                            <td>{{ $cat->id_genero }}</td>
                            <td>{{ $cat->nombre }}</td>
                            <td>
                                <a href="{{URL::action('GeneroController@edit',$cat->id_genero)}}"><button class="btn btn-primary">Editar</button></a>
                                <a href="" data-target="#modal-delete-{{$cat->id_genero}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                            </td>
                        </tr>
                    @include('almacen.genero.modal')
                    @endforeach
                </table>
            </div>
            {{$generos->render()}}
        </div>
    </div>
@endsection
