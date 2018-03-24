<!DOCTYPE html>
<html>
  <head>
    <?php include ("head.php"); ?>
    <?php include ("conexion.php"); ?>
    <meta charset="utf-8">
    <title>Nuevo Producto</title>
  </head>
  <body>
    <?php include ("menu.php") ?>

    <div class="container" style="margin-top: 5em;">
      <h3>Nuevo Producto</h3>

      <form class="" action="crud_producto.php" method="post">
        <div class="row">
          <div class="input-field col l9">
            <i class="material-icons prefix">account_circle</i>
            <input id="icon_prefix" type="text" class="validate" name="nombre" required="required" >
            <label for="icon_prefix">Nombre</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col l3">
            <i class="material-icons prefix">adjust</i>
            <input id="icon_prefix" type="text" class="validate" name="presentacion" required="required" >
            <label for="icon_prefix">Presentación</label>
          </div>
          <div class="input-field col l3">
            <i class="material-icons prefix">apps</i>
            <input id="icon_prefix" type="text" class="validate" name="cantidad" required="required" >
            <label for="icon_prefix">Cantidad</label>
          </div>
          <div class="input-field col l3">
            <i class="material-icons prefix">attach_money</i>
            <input id="icon_prefix" type="text" class="validate" name="precio" required="required" >
            <label for="icon_prefix">Precio</label>
          </div>

        </div>
        <div class="row">
          <div class="input-field col l4">
            <select  name="tipo">
              <option value="" disabled selected required="required">Tipo de costo</option>
              <?php $q = $conexion->query("SELECT * FROM Tipo_Costos"); ?>
              <?php foreach ($q as $categoria): ?>
                <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nombre']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="input-field col l5">
            <i class="material-icons prefix">assignment_ind</i>
            <select multiple name="id_prov[]" required="required" >
              <option value="" disabled selected>Proveedores</option>
              <?php $q = $conexion->query("SELECT * FROM Proveedores"); ?>
              <?php foreach ($q as $categoria): ?>
                <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nombre']; ?></option>
              <?php endforeach; ?>
            </select>
            <label>Especialidades del proveedor</label>
          </div>
        </div>
        <div class="row">
          <div class="col l2 offset-l6">
            <input type="hidden" name="insertar" value="1">
            <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
            </button>
          </div>
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
