<!DOCTYPE html>
<html>
  <head>
    <?php include ("head.php"); ?>
    <?php include ("conexion.php"); ?>
    <meta charset="utf-8">
    <title>Nueva Especialidad</title>
  </head>
  <body>
    <?php include ("menu.php") ?>

    <div class="container" style="margin-top: 5em;">
      <h3>Nueva Especialidad</h3>

      <form class="" action="crud_especialidad.php" method="post">
        <div class="row">
          <div class="input-field col l4">
            <i class="material-icons prefix">account_circle</i>
            <input id="icon_prefix" type="text" class="validate" name="nombre">
            <label for="icon_prefix">Nombre</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col l4">
            <select name="id_cat">
              <option value="" disabled selected>Seleccione una opción</option>
              <?php $q = $conexion->query("SELECT * FROM Categorias_Proveedores"); ?>
              <?php foreach ($q as $categoria): ?>
                <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nombre']; ?></option>
              <?php endforeach; ?>
            </select>
            <label>Categorías de proveedores</label>
          </div>
          <input type="hidden" name="insertar" value="1">
          <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
          </button>
        </div>



      </form>
    </div>

  </body>
  <script type="text/javascript">
  $(document).ready(function() {
     $('select').material_select();
   });
  </script>
</html>
