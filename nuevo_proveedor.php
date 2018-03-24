<!DOCTYPE html>
<html>
  <head>
    <?php include ("head.php"); ?>
    <?php include ("conexion.php"); ?>
    <meta charset="utf-8">
    <title>Nuevo Proveedor</title>
  </head>
  <body>
    <?php include ("menu.php") ?>

    <div class="container" style="margin-top: 5em;">
      <h3>Nuevo Proveeedor</h3>

      <form class="" action="crud_proveedor.php" method="post">
        <div class="row">
          <div class="input-field col l5">
            <i class="material-icons prefix">account_circle</i>
            <input id="icon_prefix" type="text" class="validate" name="nombre">
            <label for="icon_prefix">Nombre</label>
          </div>
          <div class="input-field col l3">
            <i class="material-icons prefix">contact_phone</i>
            <input id="icon_prefix" type="tel" class="validate" name="telefono">
            <label for="icon_prefix">Telefono</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col l5">
            <i class="material-icons prefix">email</i>
            <input id="icon_prefix" type="email" class="validate" name="correo">
            <label for="icon_prefix">Correo electrónico</label>
          </div>
          <div class="input-field col l3">
            <i class="material-icons prefix">location_on</i>
            <input id="icon_prefix" type="tel" class="validate" name="ubicacion">
            <label for="icon_prefix">Ubicación</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col l5">
            <i class="material-icons prefix">account_circle</i>
            <input id="icon_prefix" type="text" class="validate" name="contacto">
            <label for="icon_prefix">Nombre contacto</label>
          </div>
          <div class="input-field col l3">
            <i class="material-icons prefix">contact_phone</i>
            <input id="icon_prefix" type="tel" class="validate" name="tel_contacto">
            <label for="icon_prefix">Telefono contacto</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col l5">
            <select multiple name="id_esp[]">
              <option value="" disabled selected>Seleccione una opción</option>
              <?php $q = $conexion->query("SELECT * FROM Especialidades_Proveedores"); ?>
              <?php foreach ($q as $categoria): ?>
                <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nombre']; ?></option>
              <?php endforeach; ?>
            </select>
            <label>Especialidades del proveedor</label>
          </div>
          <div class="col l2 offset-l1">
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
