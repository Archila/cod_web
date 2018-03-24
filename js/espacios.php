<!DOCTYPE html>
<html>
  <head>
    <?php include("conexion.php"); ?>
     <?php include("head.php"); ?>
     <title>Inicio</title>
  </head>
  <body>
    <?php include("menu.php"); ?>
    <?php $q = $conexion->query("SELECT * FROM Lugares");  ?>
    <br>
    <div class="container">
      <div class="row">
        <div class="col l10 offset-l1 white">
          <table class="bordered responsive-table">
            <thead>
              <th>Código</th>
              <th>Ocupado</th>
              <th>Vehículo</th>              
            </thead>
            <?php foreach ($q as $tarifa): ?>
              <tr>
                <td><?php echo $tarifa['nombre']; ?></td>
                <td><?php echo $tarifa['descripcion']; ?></td>
                <td><h5>Q <?php echo $tarifa['precio']; ?>.00</h5></td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>
    <br>
    <?php include("footer.php"); ?>
  </body>
  <?php include("scripts.php"); ?>
</html>
