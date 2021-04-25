@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nuevo Cliente</h3>
            @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::open(array('url'=>'almacen/cliente','method'=>'POST', 'autocomplete'=>'off', 'files'=>'true')) !!}
            {{Form::token()}}
            <div class="form-group">
                <label for="nit">NIT</label>
                <input type="text" name="nit" class="form-control" placeholder="Nit...">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre...">
                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                <input type="date" name="fecha_nacimiento" class="form-control" placeholder="Fecha de Nacimiento...">
                <label for="edad">Edad</label>
                <input type="text" name="edad" class="form-control" placeholder="Edad...">
                <label for="correo">Correo</label>
                <input type="text" name="correo" class="form-control" placeholder="Correo...">
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" class="form-control" placeholder="Telefono...">

                <label>Categoria</label>
                <select name="id_categoria" class="form-control">
                    @foreach($categorias as $cat)
                        <option value="{{$cat->id_categoria}}">{{$cat->nombre}}</option>
                    @endforeach
                </select>
                <label>Genero</label>
                <select name="id_genero" class="form-control">
                    @foreach($generos as $gen)
                        <option value="{{$gen->id_genero}}">{{$gen->nombre}}</option>
                    @endforeach
                </select>
                <label>Departamento</label>
                <select name="id_departamento" class="form-control">
                    @foreach($departamentos as $dep)
                        <option value="{{$dep->id_departamento}}">{{$dep->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
