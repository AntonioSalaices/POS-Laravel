@extends('layouts.admin')
@section('contenido')
    <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <h3>Nueva Categoría</h3>
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
                {!! Form::open(array('url'=>'almacen/articulo/', 'method'=>'POST','autocomplete'=>'off', 'files'=>'true'))!!}
                {{Form::token()}}
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                                <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" required value="{{old('nombre')}}" name="nombre" placeholder="Nombre del artículo...">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                                <label for="categoria">Categoría</label>
                                <select name="idcategoria" id="" class="form-control">
                                    @foreach ($categorias as $cat)
                                        <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                    <label for="codigo">Código</label>
                            <input type="text" class="form-control" required value="{{old('codigo')}}" name="codigo" placeholder="Código del artículo...">
                            </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                    <label for="codigo">Stock</label>
                            <input type="text" class="form-control" required value="{{old('stock')}}" name="stock" placeholder="Stock del artículo...">
                            </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                            <input type="text" class="form-control"  value="{{old('descripcion')}}" name="descripcion" placeholder="Descripción del artículo...">
                            </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                    <label for="descripcion">Imagen</label>
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
                
        
@endsection