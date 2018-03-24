<!DOCTYPE html>
<html>
  <head>
    <?php include ("head.php"); ?>
    <?php include ("conexion.php") ?>
    <meta charset="utf-8">
    <title>Productos</title>
    <style media="screen">
      th, td {
        padding: 0;
      }
      button{
        padding: 0;
        margin: 0;
      }
    </style>
  </head>
  <body>
      <?php include ("menu.php"); ?>
      <?php $q = $conexion->query("SELECT Productos.id as id, Productos.nombre as nombre_prod, Productos.presentacion, Productos.precio, Proveedores.nombre as nombre_prov, Proveedores.telefono, Proveedores.ubicacion FROM Productos INNER JOIN Proveedores ON Proveedores.id = Productos.id_proveedor ORDER BY Productos.nombre "); ?>

      <div class="container " style="margin: 1em 5em;">
        <h3>Listado de productos <a class="btn-floating green" href="nuevo_producto.php"><i class="material-icons">add</i></a></h3>
        <table class="highlight" >
          <thead>
            <th>Producto</th>
            <th>Presentación</th>
            <th>Precio</th>
            <th>Proveedor</th>
            <th>Telefono</th>
            <th>Ubicación</th>
            <th></th>
          </thead>
          <tbody>
            <?php foreach ($q as $p): ?>
              <tr >
                <td><?php echo $p['nombre_prod']; ?></td>
                <td><?php echo $p['presentacion']; ?></td>
                <td>Q <?php echo $p['precio']; ?></td>
                <td><?php echo $p['nombre_prov']; ?></td>
                <td><?php echo $p['telefono']; ?></td>
                <td><?php echo $p['ubicacion']; ?></td>
                <td>
                  <div class="row">
                    <div class="col l3">
                      <form class="" action="editar_producto.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $p['id']; ?>">
                        <button type="submit" name="button"><i class="blue-text material-icons">edit</i></button>
                      </form>
                    </div>
                    <div class="col l3">
                      <form class="" action="crud_producto.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $p['id']; ?>">
                        <input type="hidden" name="eliminar" value="1">
                        <button type="submit" name="button"><i class="red-text material-icons">delete</i></button>
                      </form>
                    </div>
                  </div>

                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        </div>

  </body>
</html>
