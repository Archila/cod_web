<?php
include("conexion.php");
session_start();
if (isset($_POST['nombre']) && isset($_POST['clave'])) {
  $nombre = $_POST['nombre'];
  $clave = $_POST['clave'];
  $q = $conexion->query("SELECT * FROM Usuarios WHERE nombre='$nombre' AND clave='$clave'");
  foreach ($q as $usuario) {
    $_SESSION['usuario']=$nombre;

  }
  header("Location:index.php");
}
else {
  if (!isset($_SESSION['usuario'])) {
    header("Location:logueo.php");
    echo "No hay session de ususario";
  }
}
?>
