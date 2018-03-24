<!DOCTYPE html>
<html>
  <head>
    <?php include ("head.php"); ?>
    <meta charset="utf-8">
    <title>Nueva Categoría</title>
  </head>
  <body>
    <?php include ("menu.php") ?>

    <div class="container" style="margin-top: 5em;">
      <h3>Nueva Categoría</h3>

      <form class="" action="crud_categoria.php" method="post">
        <div class="row">
          <div class="input-field col l4">
            <i class="material-icons prefix">account_circle</i>
            <input id="icon_prefix" type="text" class="validate" name="nombre">
            <label for="icon_prefix">Nombre</label>
          </div>
          <input type="hidden" name="insertar" value="1">
          <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
          </button>
        </div>

      </form>
    </div>

  </body>
</html>
