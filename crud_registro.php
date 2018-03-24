<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body onload="javascript:Retornar();">
    <?php
    include("conexion.php");

    if (isset($_POST['delete'])) {
      $id_reg = $_POST['id_reg'];
      $id_sub = $_POST['id_sub'];
      $q = $conexion->query("DELETE FROM Registros WHERE id=$id_reg ");

    }

    ?>
    <form class="" action="detalle_subrenglon.php" method="post" name="formulario" id="formulario">
      <input type="hidden" name="id_sub" value="<?php echo $id_sub; ?>">
    </form>
  </body>
  <script type="text/javascript">
    function Retornar(){
      document.getElementById('formulario').submit();
    }
  </script>

  <script type="text/javascript">
  $(document).ready(function() {
      Retornar();
      alert("Si entra");
    });
  </script>

</html>
