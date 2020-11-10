@extends('layouts.admin')
@section('contenido')
    <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <h3>Nueva Venta</h3>
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
                {!! Form::open(array('url'=>'ventas/venta/', 'method'=>'POST','autocomplete'=>'off'))!!}
                {{Form::token()}}
        <div class="row">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <div class="form-group">
                                <label for="idcliente">Cliente</label>
                                <select name="idcliente" class="form-control selectpicker" id="idcliente"  data-live-search="true">
                                        @foreach ($personas as $per)
                                                <option value="{{$per->id}}">{{$per->nombre}}</option>
                                        @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                                <label for="tipo_comprobante">Tipo de Comprobante</label>
                                <select name="tipo_comprobante" id="" class="form-control">
                                        <option value="Boleta">Boleta</option>      
                                        <option value="Factura">Factura</option> 
                                        <option value="Ticket">Ticket</option>                               
                                </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                            <div class="form-group">
                                    <label for="serie_comprobante">Serie de Comprobante</label>
                            <input type="text" class="form-control"  value="{{old('serie_comprobante')}}" name="serie_comprobante" placeholder="Serie del Comprobante...">
                            </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                                <label for="num_comprobante">Número de Comprobante</label>
                        <input type="text" class="form-control" required value="{{old('num_comprobante')}}" name="num_comprobante" placeholder="Número del Comprobante...">
                        </div>
                   </div>
                
        </div>  
        <div class="row">
                <div class="panel panel-primary">
                        <div class="panel-body">
                                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                                <div class="form-group">
                                                        <label for="pidarticulo">Artículo</label>
                                                        <select class="form-control selectpicker" name="pidarticulo" id="pidarticulo" data-live-search="true">
                                                                @foreach ($articulos as $art)
                                                                        <option value="{{$art->id}}_{{$art->stock}}_{{$art->precio_promedio}}">{{$art->articulo}}</option>
                                                                @endforeach
                                                        </select>
                                                </div>
                                </div>
                                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                        <div class="form-group">
                                                <label for="pcantidad">Cantidad</label>
                                        <input type="number" class="form-control"  value="{{old('pcantidad')}}" id="pcantidad" name="pcantidad" placeholder="Cantidad...">
                                        </div>
                                </div>
                                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                                <div class="form-group">
                                                        <label for="pstock">Stock</label>
                                                <input type="number" class="form-control" disabled  value="{{old('pstock')}}" id="pstock" name="pstock" placeholder="Stock...">
                                                </div>
                                        </div>
                                
                                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                                <div class="form-group">
                                                        <label for="pprecio_venta">Precio de Venta</label>
                                                <input type="number" class="form-control" disabled value="{{old('pprecio_venta')}}" name="pprecio_venta" id="pprecio_venta" placeholder="Precio de Venta...">
                                                </div>
                                </div>
                                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                                <div class="form-group">
                                                        <label for="pdescuento">Descuento</label>
                                                <input type="number" class="form-control"  value="{{old('pdescuento')}}" id="pdescuento" name="pdescuento" placeholder="Descuento...">
                                                </div>
                                </div>
                                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                                <div class="form-group">
                                                        <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
                                                </div>
                                </div>
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                        <thead style="background-color:#A9D0F5">
                                                <th>Opciones</th>
                                                <th>Articulo</th>
                                                <th>Cantidad</th>
                                                <th>Precio Venta</th>
                                                <th>Descuento</th>
                                                <th>Subtotal</th>
                                        </thead>
                                        <tfoot>
                                                <th>TOTAL</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th><h4 id="total">S/. 0.00</h4><input type="hidden" id="total_venta" name="total_venta"></th>

                                        </tfoot>
                                        <tbody>

                                        </tbody>   
                                        </table>
                                </div>
                        </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
                        <div class="form-group">
                        <input name="_token" value="{{csrf_token()}}" type="hidden">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <button type="reset" class="btn btn-danger">Cancelar</button>
                        </div>
                </div>
        </div>
                {{Form::close()}}
@push('scripts')
<script>
$(document).ready(function(){
        $('#bt_add').click(function(){
                agregar();
        });
});
        var cont=0;
        subtotal = []
        total=0;
        $('#guardar').hide();
        $('#pidarticulo').change(mostrarValores);
        function mostrarValores(){
                datosArticulo=document.getElementById('pidarticulo').value.split('_');
                $('#pprecio_venta').val(datosArticulo[2]);
                $('#pstock').val(datosArticulo[1]);
        }
        function agregar(){

                datosArticulo=document.getElementById('pidarticulo').value.split('_');

                idarticulo= datosArticulo[0]
                articulo= $('#pidarticulo option:selected').text();
                cantidad= $('#pcantidad').val();
                descuento= $('#pdescuento').val();
                precio_venta= $('#pprecio_venta').val();
                stock= $('#pstock').val();
        
                if(idarticulo!="" && articulo!="" && cantidad>0 && descuento!="" && precio_venta!="" )
                {
                        if(stock>=cantidad){
                                subtotal[cont]=(cantidad*precio_venta-descuento);
                                total= total+subtotal[cont];
                                
                                var fila = '<tr class="selected" id="fila'+cont+'"><td><button class="btn btn-warning" onclick="eliminar('+cont+')" type="button">X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precio_venta[]" value="'+precio_venta+'"></td><td><input type="number" name="descuento[]" value="'+descuento+'"></td><td>'+subtotal[cont]+'</td></tr>'
                                cont++;
                                limpiar();
                                $('#total').html("$ "+total);
                                $('#total_venta').val(total);
                                evaluar();
                                $('#detalles').append(fila);
                        }else{
                                alert("La cantidad a vender supera el stock");
                        }
                        
                }else{
                        alert("Error al ingresar el detalle de la venta, revise los datos del artículo");
                }
        }
        function limpiar(){
                $('#pcantidad').val("");
                $('#pdescuento').val("");
                $('#pprecio_venta').val("");
        }
        function evaluar()
        {
                if(total>0){
                        $('#guardar').show();    
                }else{
                        $('#guardar').hide();
                }
        }
        function eliminar(index)
        {
                total=total-subtotal[index];
                $('#total').html('$ '+total);
                $('#total_venta').val(total);
                $('#fila'+index).remove();
                evaluar();
        }
</script>
@endpush                
        
@endsection