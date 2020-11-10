@extends('layouts.admin')
@section('contenido')
    <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <h3>Editar Artículo: {{$articulo->nombre}}</h3>
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
            </div>
    </div>
                {!! Form::model($articulo,['method'=>'PATCH', 'route'=>['articulo.update', $articulo->id], 'files'=>'true'])!!}
                {{Form::token()}}
                <div class="row">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                    <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" required value="{{$articulo->nombre}}" name="nombre">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                    <label for="categoria">Categoría</label>
                                    <select name="idcategoria" id="" class="form-control">
                                        @foreach ($categorias as $cat)
                                        @if ($cat->id==$articulo->idcategoria)
                                        <option value="{{$cat->id}}" selected>{{$cat->nombre}}</option>
                                        @else
                                        <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                        <label for="codigo">Código</label>
                                <input type="text" value="{{$articulo->codigo}}" class="form-control" required  name="codigo" >
                                </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                        <label for="codigo">Stock</label>
                                <input type="text" class="form-control" required value="{{$articulo->stock}}" name="stock" >
                                </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                <input type="text" class="form-control" value="{{$articulo->descripcion}}"  name="descripcion">
                                </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                        <label for="descripcion">Imagen</label>
                                        @if (($articulo->imagen) != "")
                                        <img src="{{asset('imagenes/articulos/'.$articulo->imagen)}}" alt="{{$articulo->nombre}}" height="300px" width="300px">
                                        @endif
                                <input type="file" class="form-control"  name="imagen">
                                </div>
                        </div>
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