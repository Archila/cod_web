<?php
include("conexion.php");

$consulta = $_POST['consulta'];

$q = $conexion->query("SELECT * FROM Listado_productos WHERE nombre_prod like '%$consulta%'");

$mensaje = "";
foreach ($q as $p) {
  $id = $p['id_prod'];
  $nombre_prod = $p['nombre_prod'];
  $nombre_prov = $p['nombre_prov'];
  $precio = $p['precio'];
  $presentacion = $p['presentacion'];
  $mensaje.= '
  <option value="'.$id.'">
  '.$nombre_prod.' '.$presentacion.' '.$nombre_prov.' Q'.$precio.'</option>
  ';
}
echo $mensaje;
?>
