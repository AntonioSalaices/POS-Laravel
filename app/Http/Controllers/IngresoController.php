<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\IngresoFormRequest;
use App\Ingreso;
use App\DetalleIngreso;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class IngresoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }
    public function index(Request $request){
        if($request){
            $query=trim($request->get('searchText'));
            $ingresos = DB::table('ingreso as i')
            ->join('persona as p','i.idproveedor','=','p.id')
            ->join('detalle_ingreso as di','i.id','=','di.id_ingreso')
            ->select('i.id','i.fecha_hora','p.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante', 'i.impuesto', 'i.estado', DB::raw('sum(di.cantidad*di.precio_compra) as total'))
            ->where('i.num_comprobante','LIKE','%'.$query.'%')
            ->orderBy('i.id', 'desc')
            ->groupBy('i.id','i.fecha_hora','p.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante', 'i.impuesto', 'i.estado')
            ->paginate(7);
            return view('compras.ingreso.index',["ingresos"=>$ingresos,"searchText"=>$query]);
            
        }
    }
    public function create(){
        $personas = DB::table('persona')->where('tipo_persona', '=', 'Proveedor')->get();
        $articulos = DB::table('articulo as art')
        ->select(DB::raw('CONCAT(art.codigo," ",art.nombre) AS articulo'), 'art.id')
        ->where('art.estado','=','Activo')
        ->get();
        return view('compras.ingreso.create',["personas"=>$personas,"articulos"=>$articulos]);
    }
    public function store(IngresoFormRequest $request)
    {
        try {
            DB::beginTransaction();
                $ingreso = new Ingreso;
                $ingreso->idproveedor= $request->get('idproveedor');
                $ingreso->tipo_comprobante= $request->get('tipo_comprobante');
                $ingreso->serie_comprobante= $request->get('serie_comprobante');
                $ingreso->num_comprobante= $request->get('num_comprobante');
                $mytime = Carbon::now('America/Mazatlan');
                $ingreso->fecha_hora= $mytime->ToDateTimeString();
                $ingreso->impuesto= '18';
                $ingreso->estado= 'A';
                $ingreso->save();

                $idarticulo= $request->get('idarticulo');
                $cantidad= $request->get('cantidad');
                $precio_compra= $request->get('precio_compra');
                $precio_venta= $request->get('precio_venta');
                
                $cont = 0;
                while ($cont < count($idarticulo)) {
                    $detalle = new DetalleIngreso;
                    $detalle->id_ingreso= $ingreso->id;
                    $detalle->id_articulo= $idarticulo[$cont];
                    $detalle->cantidad= $cantidad[$cont];
                    $detalle->precio_compra=$precio_compra[$cont];
                    $detalle->precio_venta=$precio_venta[$cont];  
                    $detalle->save();
                    $cont=$cont+1;
                }
            DB::commit();
            
        } catch (\Exception $e) {

            DB::rollback();
        }
        
        return Redirect::to('compras/ingreso');
    }
    public function show($id)
    {
        $ingreso = DB::table('ingreso as i')
        ->join('persona as p','i.idproveedor','=','p.id')
        ->join('detalle_ingreso as di','i.id','=','di.id_ingreso')
        ->select('i.id','i.fecha_hora','p.nombre','i.tipo_comprobante', 'i.serie_comprobante','i.num_comprobante', 'i.impuesto', 'i.estado', DB::raw('sum(di.cantidad*di.precio_compra) as total'))
        ->where('i.id','=',$id)
        ->groupBy('i.id', 'i.fecha_hora', 'p.nombre', 'i.tipo_comprobante', 'i.serie_comprobante', 'i.num_comprobante', 'i.impuesto', 'i.estado')
        ->first();
        $detalles = DB::table('detalle_ingreso as d')
        ->join('articulo as a','d.id_articulo','=','a.id')
        ->select('a.nombre as articulo','d.cantidad','d.precio_compra','d.precio_venta')
        ->where('d.id_ingreso','=',$id)
        ->get();
        return view('compras.ingreso.show',["ingreso"=>$ingreso,"detalles"=>$detalles]);
    }
    public function destroy($id){
        $ingreso=Ingreso::findOrFail($id);
        $ingreso->estado='C';
        $ingreso->update();
        return Redirect::to('compras/ingreso');
    }
}
