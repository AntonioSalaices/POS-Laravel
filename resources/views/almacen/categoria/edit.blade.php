@extends('layouts.admin')
@section('contenido')
    <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <h3>Editar Categoría: {{$categorias->nombre}}</h3>
                @if(count($errors)>0)
                <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>
                                {{$error}}
                            </li>
                            @endforeach
                        </ul>
                    </div>    
                @endif
                {!! Form::model($categorias,['method'=>'PATCH', 'route'=>['categoria.update', $categorias->id]])!!}
                {{Form::token()}}
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="{{$categorias->nombre}}" placeholder="Nombre...">
                </div>
                <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" value="{{$categorias->descripcion}}" name="descripcion" placeholder="Descripción...">
                </div>
                <div class="form-group">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button type="reset" class="btn btn-danger">Cancelar</button>
                        </span>
                </div>
                {{Form::close()}}
                
            </div>
    </div>
@endsection