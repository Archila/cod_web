<!DOCTYPE html>
<html>
  <head>
    <?php include ("head.php"); ?>
    <?php include ("conexion.php") ?>
    <meta charset="utf-8">
    <title>Proyecto</title>
    <style media="screen">
    .grid-container {
        display: grid;
        grid-column-gap: 5px;
        grid-row-gap: 5px;
        grid-template-columns: auto auto auto auto auto;
      }
      .grid-item {

        padding: 10px;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <?php include ("menu.php"); ?>
    <div class="">
      <?php $q = $conexion->query("SELECT * FROM Renglones"); ?>

        <h4>Renglones del proyecto</h4>
        <div class="grid-container">
          <?php foreach ($q as $r): ?>
            <div class="grid-item">
              <form class="" action="detalle_renglon.php" method="post">
                <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
                <button type="submit" name="button" ><?php echo $r['nombre']; ?></button>
              </form>
            </div>
          <?php endforeach; ?>
        </div>

    </div>
  </body>
</html>
