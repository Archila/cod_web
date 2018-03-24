<?php

include("conexion.php");
if (isset($_POST['insertar'])) {
  $nombre = $_POST['nombre'];
  $q = $conexion->query("INSERT INTO Categorias_Proveedores(nombre) Values ('$nombre') ");
}


header ("Location:proveedores.php");
?>
