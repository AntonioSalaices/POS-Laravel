<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>Reporte</title>
</head>
<body>
  <h1 style='text-align:center;'>Listado de Categorías</h1>

  <table width="100%" style="width:100%" border="1">
        <tr>
          <td style='background-color:#A9D0F5'>ID</td>
          <td style='background-color:#A9D0F5'>Nombre</td>
          <td style='background-color:#A9D0F5'>Descripción</td>
        </tr>
        
        @foreach ($categorias as $cat)
        <tr>
            <td>{{$cat->id}}</td>
            <td>{{$cat->nombre}}</td>
            <td>{{$cat->descripcion}}</td>
        </tr>
        @endforeach
      </table>
</body>
</body>
</html>