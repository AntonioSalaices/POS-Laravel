<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Articulo;
use App\Categoria;
use App\Ingreso;
use App\Persona;
use App\Venta;
use App\User;
use DB;
use PDF;

class PdfController extends Controller
{
    function gen(){
        $articulos = Articulo::all(); 

        $pdf = PDF::loadView('pdf_view', compact('articulos'));

        return $pdf->stream('reporte_articulos.pdf');
    }
    function cat(){
        $categorias = Categoria::all(); 

        $pdf = PDF::loadView('reporte_categoria', compact('categorias'));

        return $pdf->stream('reporte_categorias.pdf');
    }
    function ing(){
        $ingresos = Ingreso::all(); 

        $pdf = PDF::loadView('reporte_ingreso', compact('ingresos'));

        return $pdf->stream('reporte_ingresos.pdf');
    }
    function pro(){
        $proveedores = Persona::where('tipo_persona','Proveedor')->get(); 

        $pdf = PDF::loadView('reporte_proveedor', compact('proveedores'));

        return $pdf->stream('reporte_proveedor.pdf');
    }
    function cli(){
        $clientes = Persona::where('tipo_persona','Cliente')->get(); 

        $pdf = PDF::loadView('reporte_cliente', compact('clientes'));

        return $pdf->stream('reporte_cliente.pdf');
    }
    function ven(){
        $ventas = Venta::all(); 

        $pdf = PDF::loadView('reporte_venta', compact('ventas'));

        return $pdf->stream('reporte_venta.pdf');
    }
    function usu(){
        $usuarios = User::all(); 

        $pdf = PDF::loadView('reporte_usuarios', compact('usuarios'));

        return $pdf->stream('reporte_usuarios.pdf');
    }
}
