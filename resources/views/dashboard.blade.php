@extends('layouts.admin')
@section('contenido')
{{-- ChartScript --}}

<div class="row">
    <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
        <h1>Estadísticas</h1>
    
    </div>  
</div>
<div class="row">
    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: rgb(86,110,205);color:white;"><b>0.0</b></div>
            <div class="panel-body" style="background-color: rgb(86,110,205);color:white;">Compras</div>
            <div class="panel-footer text-center" style="background-color:blue;color:white;">Compras <i class="fa fa-arrow-circle-right"></i></div>
          </div>
    
    </div>  
    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color:rgb(60,176,56);color:white;"><b>0.0</b></div>
            <div class="panel-body" style="background-color: rgb(60,176,56);color:white;">Ventas</div>
            <div class="panel-footer text-center" style="background-color:green;color:white;">Ventas <i class="fa fa-arrow-circle-right"></i></div>
          </div>
    
    </div> 
    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color:rgb(209,70,70);color:white;"><b>0.0</b></div>
            <div class="panel-body" style="background-color: rgb(209,70,70);color:white;">Caja Actual</div>
            <div class="panel-footer text-center" style="background-color:rgb(195,39,39);color:white;">Caja <i class="fa fa-arrow-circle-right"></i></div>
          </div>
    
    </div> 
</div>
<div class="row">
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <h1>Sales Graphs</h1>

        <div style="width: 100%">
            {!! $usersChart->container()!!}
        </div>
    
    </div>  
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
       
    
    </div>  
</div>


@endsection
@if($usersChart)
{!! $usersChart->script() !!}
@endif