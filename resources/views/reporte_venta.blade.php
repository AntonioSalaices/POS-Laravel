<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>Reporte</title>
</head>
<body>
  <h1 style='text-align:center;'>Listado de Ventas</h1>

  <table width="100%" style="width:100%" border="1">
        <tr>
          <td style='background-color:#A9D0F5'>ID</td>
          <td style='background-color:#A9D0F5'>Tipo de Comp.</td>
          <td style='background-color:#A9D0F5'>Serie de Comp.</td>
          <td style='background-color:#A9D0F5'>Num de Comp.</td>
          <td style='background-color:#A9D0F5'>Fecha</td>
          <td style='background-color:#A9D0F5'>Total</td>
        </tr>
        
        @foreach ($ventas as $ven)
        <tr>
            <td>{{$ven->id}}</td>
            <td>{{$ven->tipo_comprobante}}</td>
            <td>{{$ven->serie_comprobante}}</td>
            <td>{{$ven->num_comprobante}}</td>
            <td>{{$ven->fecha_hora}}</td>
            <td>{{$ven->total_venta}}</td>
        </tr>
        @endforeach
      </table>
</body>
</body>
</html>