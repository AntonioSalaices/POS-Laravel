@extends('layouts.admin')
@section('contenido')
    <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <h3>Nuevo Cliente</h3>
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
                {!! Form::open(array('url'=>'ventas/cliente/', 'method'=>'POST','autocomplete'=>'off'))!!}
                {{Form::token()}}
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                                <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" required value="{{old('nombre')}}" name="nombre" placeholder="Nombre del cliente...">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                        <label for="direccion">Dirección</label>
                                <input type="text" class="form-control"  value="{{old('direccion')}}" name="direccion" placeholder="Dirección del cliente...">
                                </div>
                            </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                                <label for="tipo_documento">Categoría</label>
                                <select name="tipo_documento" id="" class="form-control">
                                        <option value="INE">INE</option>      
                                        <option value="RFC">RFC</option> 
                                        <option value="PAS">PASAPORTE</option>                               
                                </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                    <label for="num_documento">Número de Documento</label>
                            <input type="text" class="form-control"  value="{{old('num_documento')}}" name="num_documento" placeholder="Número de documento del cliente...">
                            </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                    <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control"  value="{{old('telefono')}}" name="telefono" placeholder="Teléfono del cliente...">
                            </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                    <label for="email">Email</label>
                            <input type="text" class="form-control"  value="{{old('email')}}" name="email" placeholder="Email del cliente...">
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