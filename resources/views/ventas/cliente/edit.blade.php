@extends('layouts.admin')
@section('contenido')
    <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <h3>Editar Cliente: {{$persona->nombre}}</h3>
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
                {!! Form::model($persona,['method'=>'PATCH', 'route'=>['cliente.update', $persona->id]])!!}
                {{Form::token()}}
                <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                                <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" required value="{{$persona->nombre}}" name="nombre" >
                        </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                        <label for="direccion">Dirección</label>
                                <input type="text" class="form-control"  value="{{$persona->direccion}}" name="direccion" >
                                </div>
                                </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                                <label for="tipo_documento">Categoría</label>
                                <select name="tipo_documento" id="" class="form-control">  
                                        @if ($persona->tipo_documento=='INE')
                                                <option value="INE" selected>INE</option>
                                                <option value="RFC">RFC</option>
                                                <option value="PAS">PASAPORTE</option>
                                        @elseif($persona->tipo_documento=='RFC')
                                                <option value="RFC" selected>RFC</option>
                                                <option value="INE">INE</option>
                                                <option value="PAS">PASAPORTE</option>
                                        @else
                                                <option value="PAS" selected>PASAPORTE</option>
                                                <option value="RFC">RFC</option>
                                                <option value="INE">INE</option>
                                        @endif                            
                                </select>
                        </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                        <label for="num_documento">Número de Documento</label>
                                <input type="text" class="form-control" required value="{{$persona->num_documento}}" name="num_documento">
                                </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                        <label for="telefono">Teléfono</label>
                                <input type="text" class="form-control" required value="{{$persona->telefono}}" name="telefono">
                                </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                        <label for="email">Email</label>
                                <input type="text" class="form-control"  value="{{$persona->email}}" name="email">
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