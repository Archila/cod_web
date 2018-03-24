<!DOCTYPE html>
<html>
  <head>
    <?php include ("head.php"); ?>
    <?php include ("conexion.php") ?>

    <meta charset="utf-8">
    <title>Proveedores</title>
    <script src="f_proveedores.js"> </script>
  </head>
  <body>
    <?php include ("menu.php"); ?>
    <form class="" action="proveedores.php" method="post">
      <div class="row">
        <div class="col l3 offset-l4">
          <input type="text" name="consulta" value="" id="consulta"  >
        </div>
        <div class="col l1">
          <button class="blue" type="submit" name="button" > <i class="material-icons">search</i> </button>
        </div>
      </div>
    </form>
    <div class=""  id="buscador" style="margin-top: 1em;">
      <div class="row">

        <div class="col l4 offset-l5">
          <div class="fixed-action-btn horizontal">
              <a class="btn-floating btn-large red">
                <i class="large material-icons">add</i>
              </a>
              <ul>
                <li><a href="nueva_categoria.php" class="btn-floating blue tooltipped" data-position="top" data-delay="50" data-tooltip="Nueva Categoría"><i class="material-icons">apps</i></a></li>
                <li><a href="nueva_especialidad.php" class="btn-floating yellow darken-1 tooltipped" data-position="top" data-delay="50" data-tooltip="Nueva Especialidad"><i class="material-icons">assignment</i></a></li>
                <li><a href="nuevo_proveedor.php" class="btn-floating purple tooltipped" data-position="top" data-delay="50" data-tooltip="Nuevo Proveedor"><i class="material-icons">account_box</i></a></li>
              </ul>
            </div>
        </div>
      </div>
    </div>
    <div class="contenedor" id="contenedor" style="margin: 1em 5em;">
      <?php if (isset($_POST['consulta']) && $_POST['consulta']!=""): ?>
        <?php $consulta = $_POST['consulta'];
        $q = $conexion->query("SELECT Productos.nombre as nombre_prod, Productos.precio, Proveedores.nombre as nombre_prov, Proveedores.telefono, Proveedores.ubicacion FROM Productos INNER JOIN Proveedores ON Proveedores.id = Productos.id_proveedor WHERE Productos.nombre LIKE '%$consulta%' OR Proveedores.nombre LIKE '%$consulta%' ORDER BY Productos.nombre "); ?>
        <table>
          <thead>
            <th>Producto</th>
            <th>Precio</th>
            <th>Proveedor</th>
            <th>Telefono</th>
            <th>Ubicación</th>
          </thead>
          <tbody>
            <?php foreach ($q as $c): ?>
              <tr>
                <td><?php echo $c['nombre_prod']; ?></td>
                <td><?php echo $c['precio']; ?></td>
                <td><?php echo $c['nombre_prov']; ?></td>
                <td><?php echo $c['telefono']; ?></td>
                <td><?php echo $c['ubicacion']; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php else: ?>
        <ul class="collapsible" data-collapsible="expandable">
          <?php $q = $conexion->query("SELECT * FROM Categorias_Proveedores"); ?>

          <?php foreach ($q as $categoria): ?>
            <li>
              <div class="collapsible-header"><p style="font-size: 22px; color:blue; margin: 0;"> <?php echo $categoria['nombre']; ?></p></div>
              <div class="collapsible-body">
                <?php $id_categoria = $categoria['id'];
                  $e = $conexion->query("SELECT * FROM Especialidades_Proveedores WHERE id_categoria=$id_categoria");
                ?>
                  <ul class="tabs">
                    <?php foreach ($e as $especialidad): ?>
                      <li class="tab col s3"><a class="active" href="<?php echo '#esp'.$especialidad['id']; ?>"  > <?php echo $especialidad['nombre']; ?></a></li>
                    <?php endforeach; ?>
                  </ul>
                  <?php foreach ($e as $especialidad): ?>
                    <div id="<?php echo 'esp'.$especialidad['id']; ?>" class="col s12">
                      <?php $id_especialidad = $especialidad['id'];
                        $p = $conexion->query("SELECT *, Proveedores.id as id_prov, Proveedores.nombre as nombre_prov FROM Proveedores INNER JOIN Ocupaciones on Ocupaciones.id_proveedor=Proveedores.id
                                                INNER JOIN Especialidades_Proveedores ON Especialidades_Proveedores.id= Ocupaciones.id_especialidad
                                                WHERE Especialidades_Proveedores.id=$id_especialidad");
                      ?>

                      <div class="row">
                        <div class="col l3">
                          <p><b>Nombre</b></p>
                        </div>
                        <div class="col l1">
                          <p><b>Telefono</b></p>
                        </div>
                        <div class="col l3">
                          <p><b>Correo</b></p>
                        </div>
                        <div class="col l2">
                          <p><b>Contacto</b></p>
                        </div>
                        <div class="col l1">
                          <p><b>Tel Contacto</b></p>
                        </div>
                        <div class="col l1">
                          <p><b>Ubicación</b></p>
                        </div>
                        <div class="col l1">

                        </div>
                      </div>
                            <?php foreach ($p as $proveedor): ?>
                            <div class="row">
                              <div class="col l3">
                                <?php echo $proveedor['nombre_prov']; ?>
                              </div>
                              <div class="col l1">
                                <?php echo $proveedor['telefono']; ?>
                              </div>
                              <div class="col l3">
                                <?php echo $proveedor['correo']; ?>
                              </div>
                              <div class="col l2">
                                <?php echo $proveedor['contacto']; ?>
                              </div>
                              <div class="col l1">
                                <?php echo $proveedor['tel_contacto']; ?>
                              </div>
                              <div class="col l1">
                                <?php echo $proveedor['ubicacion']; ?>
                              </div>
                              <div class="col l1">
                                <?php $id_prov = $proveedor['id_prov']; ?>
                                <a class="waves-effect waves-light btn modal-trigger" href="<?php echo '#mod'.$id_especialidad.$id_prov;  ?>"><i class="material-icons">remove_red_eye</i></a>

                                  <!-- Modal Structure -->
                                  <div id="<?php echo 'mod'.$id_especialidad.$id_prov;  ?>" class="modal bottom-sheet" style="padding: 0 10em;">
                                    <div class="modal-content">
                                      <table>
                                        <thead>
                                          <th>Nombre</th>
                                          <th>Unidad</th>
                                          <th>Precio</th>
                                        </thead>
                                        <tbody>
                                          <?php  $prod = $conexion->query("SELECT * FROM Productos WHERE id_proveedor=$id_prov");?>
                                          <?php foreach ($prod as $producto): ?>
                                            <tr>
                                              <td><?php echo $producto['nombre']; ?></td>
                                              <td><?php echo $producto['unidad']; ?></td>
                                              <td>Q. <?php echo $producto['precio']; ?></td>
                                            </tr>
                                          <?php endforeach; ?>
                                        </tbody>
                                      </table>
                                    </div>
                                    <div class="modal-footer">
                                      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat green">OK</a>
                                    </div>
                                  </div>
                              </div>
                            </div>
                            <?php endforeach; ?>
                    </div>
                  <?php endforeach; ?>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>

  </body>
  <script type="text/javascript">
  $(document).ready(function() {
     $('.modal').modal();
     $('.tooltipped').tooltip({delay: 50});
   });
  </script>

</html>
