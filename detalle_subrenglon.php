<!DOCTYPE html>
<html>
  <head>
    <?php include ("head.php"); ?>
    <?php include ("conexion.php") ?>
    <meta charset="utf-8">
    <title>Subrenglon</title>
  </head>
  <body>
    <?php include ("menu.php");
    $id_sub=$_POST['id_sub'];?>
    <div class="container">
      <div class="row">
        <div class="col l8">
          <h3><?php $q = $conexion->query("SELECT Renglones.nombre as nombre, Renglones.id as id From Subrenglones INNER JOIN Renglones ON Subrenglones.id_renglon=Renglones.id Where Subrenglones.id=$id_sub");
          foreach ($q as $r) {
            $nombre_reg=$r['nombre'];
            $id_renglon = $r['id'];
          }
          echo $nombre_reg; ?></h3>
        </div>
        <div class="col l4">
          <form class="" action="detalle_renglon.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id_renglon; ?>">
            <button type="submit" name="button" class="btn-floating blue tooltipped"data-position="top" data-delay="50" data-tooltip="Regresar"><i class="material-icons">arrow_back</i> </button>
          </form>
        </div>
      </div>

      <div class="row">
        <div class="col l8">
          <h4><?php
          $q = $conexion->query("SELECT * From Subrenglones Where Subrenglones.id=$id_sub");
          foreach ($q as $r) {
            $nombre_sub=$r['nombre'];
          }
          echo $nombre_sub; ?></h4>
        </div>
        <div class="col l4">
          <h5 id="total"></h5>
        </div>
        <form class="" action="" method="post">
          <input type="hidden" name="" id="id_sub" value="<?php echo $_POST['id_sub']; ?>">
        </form>
      </div>


      <div class="row">
        <div class="col l3">
          <input type="text" name="" value="" id="consulta" onkeyup="BuscarProducto()" placeholder="Ingrese busqueda">
        </div>
        <div class="col l6">
          <select id="select">
            <option value="" disabled selected>Listado de productos</option>

          </select>
          <label>Materialize Select</label>
        </div>
        <div class="col l2">
          <input type="text" name="" value="" id="cantidad" placeholder="Cantidad" >
        </div>
        <div class="col l1 ">
          <button type="button" name="button" onclick="Agregar()" class="green">+</button>
        </div>

      </div>

      <table>
        <thead>
          <th>Producto</th>
          <th>Proveedor</th>
          <th>Cantidad</th>
          <th>Precio</th>
          <th>Subtotal</th>
          <th></th>
        </thead>
        <tbody id="filas">

        </tbody>
      </table>
    </div>
  </body>
  <script type="text/javascript">
  function BuscarProducto(){
    var $consulta = document.getElementById('consulta').value;
    //$.post("consulta.php",{consulta: $consulta}, function(response){
      //$("#select").html(response);

    //});
    $.ajax({
      type: "POST",
      url: "consulta.php",
      data: {consulta: $consulta},
      success: function(response){
        document.getElementById('select').innerHTML = response;
        $('select').material_select();
      }
    });
  }

  function Agregar(){
    var $id_sub = document.getElementById('id_sub').value;
    var $id_prod = document.getElementById('select').value;
    var $cantidad = document.getElementById('cantidad').value;
    $.ajax({
      type: "POST",
      url: "procedimientos_registros.php",
      data: {agregar: "true", id_sub:$id_sub, id_prod:$id_prod, cantidad:$cantidad},
      success: function(response){

      }
    });
    document.getElementById('cantidad').value = 1;
    document.getElementById('consulta').focus();
    ListarRegistros();

  }

  function ListarRegistros(){
    var $id_sub = document.getElementById('id_sub').value;
    $.ajax({
      type: "POST",
      url: "procedimientos_registros.php",
      data: {listar: "true", id_sub: $id_sub},
      success: function(response){
        document.getElementById('filas').innerHTML = response;
      }
    });
    Total();
  }

  function Total(){
    var $id_sub = document.getElementById('id_sub').value;
    $.ajax({
      type: "POST",
      url: "procedimientos_registros.php",
      data: {subtotal: "true", id_sub: $id_sub},
      success: function(response){
        document.getElementById('total').innerHTML = response;
      }
    });
  }

  function EliminarRegistro(){

  }

  </script>
  <script type="text/javascript">
      $(document).ready(function() {
        $('select').material_select();
        ListarRegistros();

      });
  </script>
</html>
