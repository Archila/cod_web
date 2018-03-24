<?php

  include ("conexion.php");

  if (isset($_POST['insertar'])) {

    $especialidades =$_POST['id_esp'];

    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $contacto = $_POST['contacto'];
    $tel_contacto = $_POST['tel_contacto'];
    $correo = $_POST['correo'];
    $ubicacion = $_POST['ubicacion'];



    if ($contacto=="" || $tel_contacto=="") {
      if ($contacto!="") {
        $q = $conexion->query("INSERT INTO Proveedores (nombre,telefono,correo,contacto,ubicacion) Values ('$nombre',$telefono,'$correo','$contacto','$ubicacion') ");
      }
      elseif ($tel_contacto!="") {
        $q = $conexion->query("INSERT INTO Proveedores (nombre,telefono,correo,tel_contacto,ubicacion) Values ('$nombre',$telefono,'$correo','$contacto','$ubicacion') ");
      }
      else {
        $q = $conexion->query("INSERT INTO Proveedores (nombre,telefono,correo,ubicacion) Values ('$nombre',$telefono,'$correo','$ubicacion') ");
      }
    }
    else {
      $q = $conexion->query("INSERT INTO Proveedores (nombre,telefono,correo,contacto,tel_contacto,ubicacion) Values ('$nombre',$telefono,'$correo','$contacto',$tel_contacto,'$ubicacion') ");
    }
  }

  $p = $conexion->query("SELECT max(id) as id FROM Proveedores");
  foreach ($p as $pro) {
    $id_prov = $pro['id'];
  }


  foreach ($especialidades as $e) {
      $q = $conexion->query("INSERT INTO Ocupaciones (id_proveedor,id_especialidad) VALUES($id_prov,$e)");
    
  }

  header ("Location:proveedores.php");

?>
