@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Genero: {{$genero->nombre}}</h3>
            @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::model($genero,['method'=>'PATCH', 'route'=>['genero.update',$genero->id_genero]])!!}
            {{Form::token()}}
            <div class="form-group">
                <label for="nombre">Genero</label>
                <input type="text" name="nombre" class="form-control" value="{{$genero->nombre}}" placeholder="Genero...">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="submit">Cancelar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection