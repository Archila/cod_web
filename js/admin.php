<?php
session_start();
if (isset($_SESSION['admin'])) {
  if ($_SESSION['admin']) {

  }
  else {
    header("Location: index.php");
  }
}
else {
  header("Location: index.php");
}
?>
