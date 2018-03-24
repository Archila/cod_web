<!DOCTYPE html>
<html>
  <head>
    <?php include ("head.php"); ?>
    <?php include ("conexion.php") ?>
    <meta charset="utf-8">
    <title>Renglon</title>
  </head>
  <body>
    <?php include ("menu.php"); ?>
    <?php $id_renglon = $_POST['id'];
     $q = $conexion->query("SELECT * FROM Renglones WHERE id=$id_renglon");?>
     <?php foreach ($q as $r): ?>
       <?php
        $id_r = $r['id'];
        $nombre_r = $r['nombre'];
       ?>
     <?php endforeach; ?>
    <div class="container">
      <h4><?php echo $nombre_r;  ?></h4>
      <?php $q = $conexion->query("SELECT * FROM Subrenglones WHERE id_renglon=$id_renglon"); ?>
      <?php foreach ($q as $s):
        $id_sub = $s['id'];
        ?>
        <ul class="collapsible" data-collapsible="expandable">
          <li>
            <div class="collapsible-header">
              <div class="row">
                <div class="col l16" style="width: 35em;">
                  <p style="font-size: 22px; color:blue; margin: 0;"> <?php echo $s['nombre']; ?></p>
                </div>
                <div class="col l3" style="width: 10em;">
                  Total: <b> Q. <?php $q = $conexion->query("SELECT SUM(Registros.subtotal) as subtotal FROM `Registros` WHERE id_subrenglon=$id_sub");
                    foreach ($q as $t) {
                      echo $t['subtotal'];
                    }

                    ?> </b>
                </div>
                <div class="col l3" style="width: 15em;">
                  <form class="" action="detalle_subrenglon.php" method="post">
                    <input type="hidden" name="id_sub" value="<?php echo $id_sub; ?>">                    
                    <button type="submit" name="button">Agregar filas</button>
                  </form>

                </div>
              </div>

            </div>
              <div class="collapsible-body">
                <table>
                  <thead>
                    <th>Producto</th>
                    <th>Proveedor</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                  </thead>
                  <tbody>
                    <?php $q = $conexion->query("SELECT * FROM Vista_registros WHERE id_sub=$id_sub"); ?>
                    <?php foreach ($q as $r): ?>
                      <tr>
                        <td><?php echo $r['nombre_prod']; ?></td>
                        <td><?php echo $r['nombre_prov']; ?></td>
                        <td><?php echo $r['cantidad']; ?></td>
                        <td><?php echo $r['precio']; ?></td>
                        <td><?php echo $r['subtotal']; ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
          </li>
        </ul>
      <?php endforeach; ?>
    </div>
  </body>
  <script type="text/javascript">
    function Busqueda(){
      var $consulta = document.getElementById('consulta').value;

    }

  </script>
  <script type="text/javascript">
      $(document).ready(function() {
        $('select').material_select();
      });
  </script>
</html>
