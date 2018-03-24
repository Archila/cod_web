<?php

  include ("conexion.php");

  if (isset($_POST['insertar'])) {

    $proveedores =$_POST['id_prov'];

    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $presentacion = $_POST['presentacion'];
    $cantidad = $_POST['cantidad'];
    $tipo = $_POST['tipo'];
    foreach ($proveedores as $p) {
        $q = $conexion->query("INSERT INTO Productos (nombre,cantidad,presentacion,precio,id_costo,id_proveedor) Values ('$nombre',$cantidad,'$presentacion','$precio',$tipo,$p) ");

    }
  }
  if (isset($_POST['eliminar'])) {
    $id = $_POST['id'];
    $q = $conexion->query("DELETE FROM Productos WHERE Productos.id=$id ");
  }

  header ("Location:productos.php");

?>
