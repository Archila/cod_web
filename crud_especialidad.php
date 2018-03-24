<?php

include("conexion.php");
if (isset($_POST['insertar'])) {
  $nombre = $_POST['nombre'];
  $id = $_POST['id_cat'];
  $q = $conexion->query("INSERT INTO Especialidades_Proveedores (nombre,id_categoria) Values ('$nombre',$id) ");
}


?>
