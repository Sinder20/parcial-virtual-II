@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Cliente: {{$cliente->nombre}}</h3>
            @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::model($cliente,['method'=>'PATCH', 'route'=>['cliente.update',$cliente->id_cliente]])!!}
            {{Form::token()}}
            <div class="form-group">
                <label for="nit">NIT</label>
                <input type="text" name="nit" class="form-control" value="{{$cliente->nit}}" placeholder="Nit...">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{$cliente->nombre}}" placeholder="Nombre...">
                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                <input type="text" name="fecha_nacimiento" class="form-control" value="{{$cliente->fecha_nacimiento}}" placeholder="Fecha de Nacimiento...">
                <label for="edad">Edad</label>
                <input type="text" name="edad" class="form-control" value="{{$cliente->edad}}" placeholder="Edad...">
                <label for="correo">Correo</label>
                <input type="text" name="correo" class="form-control" value="{{$cliente->correo}}" placeholder="Correo...">
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" class="form-control" value="{{$cliente->telefono}}" placeholder="Telefono...">

                <label>Categoria</label>
                <select name="id_categoria" class="form-control">
                    @foreach  ($categoria as $cat)
                        @if($cat->id_categoria==$cliente->id_categoria)
                            <option value="{{$cat->id_categoria}}" selected>{{$cat->nombre}}</option>
                        @else
                            <option value="{{$cat->id_categoria}}">{{$cat->nombre}}</option>
                        @endif
                    @endforeach
                </select>
                <label>Genero</label>
                <select name="id_genero" class="form-control">
                    @foreach  ($genero as $gen)
                        @if($gen->id_genero==$cliente->id_genero)
                            <option value="{{$gen->id_genero}}" selected>{{$gen->nombre}}</option>
                        @else
                            <option value="{{$gen->id_genero}}">{{$gen->nombre}}</option>
                @endif
                @endforeach
                </select>
                <label>Departamento</label>
                <select name="id_departamento" class="form-control">
                @foreach  ($departamento as $dep)
                    @if($dep->id_departamento == $cliente->id_departamento)
                         <option value="{{$dep->id_departamento}}" selected>{{$dep->nombre}}</option>
                    @else
                         <option value="{{$dep->id_departamento}}">{{$dep->nombre}}</option>
                    @endif
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
