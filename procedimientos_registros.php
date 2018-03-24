<?php
include("conexion.php");
$mensaje = "";
if (isset($_POST['listar'])) {
  $id_sub = $_POST['id_sub'];

  $q = $conexion->query("SELECT * FROM Vista_registros WHERE id_sub=$id_sub ");

  foreach ($q as $r) {
    $nombre_prod = $r['nombre_prod'];
    $nombre_prov = $r['nombre_prov'];
    $cantidad = $r['cantidad'];
    $precio = $r['precio'];
    $subtotal = $r['subtotal'];
    $id_reg = $r['id_reg'];

    $mensaje.= '
    <tr>
      <td>'.$nombre_prod.'</td>
      <td>'.$nombre_prov.'</td>
      <td>'.$cantidad.'</td>
      <td>Q '.$precio.'</td>
      <td>Q '.$subtotal.'</td>
      <td><form class="" action="crud_registro.php" method="post">
        <input type="hidden" name="delete" value="true">
        <input type="hidden" name="id_reg" value="'.$id_reg.'">
        <input type="hidden" name="id_sub" value="'.$id_sub.'">
        <button type="submit" name="button" class="btn-floating red" ><i class="material-icons">delete</i></button>
      </form></td>
    </tr>
    ';
  }
}

elseif (isset($_POST['subtotal'])) {
  $id_sub = $_POST['id_sub'];
  $q = $conexion->query("SELECT SUM(Registros.subtotal) as subtotal FROM `Registros` WHERE id_subrenglon=$id_sub");
  foreach ($q as $t) {
    $mensaje = "TOTAL: Q".$t['subtotal'];
  }
}
elseif (isset($_POST['agregar'])) {
  $id_sub = $_POST['id_sub'];
  $id_prod = $_POST['id_prod'];
  $cantidad = $_POST['cantidad'];
  $q = $conexion->query("SELECT * FROM Productos WHERE id=$id_prod");
  foreach ($q as $p) {
    $precio = $p['precio'];
  }
  $subtotal = $precio*$cantidad;
  $q = $conexion->query("SELECT * FROM Registros WHERE id_subrenglon=$id_sub AND id_producto=$id_prod");
  $existente=false;
  foreach ($q as $r) {
    $existente=true;
    $cant_anterior = $r['cantidad'];
    $subtotal_anterior =$r['subtotal'];
  }
  if ($existente) {
    $cantidad +=$cant_anterior;
    $subtotal +=$subtotal_anterior;
    $q = $conexion->query("UPDATE Registros SET cantidad=$cantidad, subtotal=$subtotal  WHERE id_subrenglon=$id_sub AND id_producto=$id_prod");
  }
  else {
    $q = $conexion->query("INSERT INTO Registros(id_subrenglon,id_producto,cantidad,subtotal) VALUES($id_sub,$id_prod,$cantidad,$subtotal) ");
  }

}


echo $mensaje;


 ?>
