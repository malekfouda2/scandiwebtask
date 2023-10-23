<?php
require_once("connect.php");
if (isset($_POST["but_delete"])) {
  if (isset($_POST["delete"])) {
    foreach ($_POST["delete"] as $deleteid) {
      $delete_product = "DELETE from products"    ." WHERE id=" . $deleteid;
      $conn->query($delete_product);
      
    }
  }
  $conn->close();
  header("Location:index.php");
}
