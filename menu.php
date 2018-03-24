<nav>
    <div class="nav-wrapper">
      <a href="index.php" class="brand-logo">COD SOLUTIONS</a>
      <ul id="nav-mobile" class="right ">
        <li><a href="proyecto.php">PROYECTO</a></li>
        <li><a href="productos.php">Productos</a></li>
        <li><a href="proveedores.php">Proveedores</a></li>
        <li><a style="text-transform: capitalize;">Bienvenido: <?php session_start(); echo $_SESSION['usuario']; ?></a></li>
        <li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
      </ul>
    </div>
  </nav>
