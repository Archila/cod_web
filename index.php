<!DOCTYPE html>
<html>
  <head>
    
    <?php include ("head.php"); ?>
    <title>Página de inicio</title>
    <style media="screen">
      img{
        float: left;
        width: 50%;
        height: 450px;
        margin-top: 3%;
      }
    </style>
  </head>
  <body>
    <?php include ("menu.php") ?>
    <div class="container" >

      <a  href="productos.php">
      <img src="img/productos.jpg" alt="" class="tooltipped" data-position:"bottom" data-delay="50" data-tooltip="Productos"> </a>
      <a href="proveedores.php">
      <img src="img/proveedores.jpg" alt="" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Proveedores"  > </a>
    </div>
  </body>
  <?php include ("scripts.php"); ?>
</html>
