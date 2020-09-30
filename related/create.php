<?php 
  include "../config/header.php";
  include '../config/conneccion.php';

  $db = new Database();
  $conn = $db->connect();
  $sql = "SELECT * FROM products ORDER BY product_id";
  $productos = $conn->query($sql);
?>
<body>

<br>

<div class="jumbotron">
<div class="container">
  <form  method="POST" action="docreate.php">
    <div class="form-group">
    <label for="p1">Producto_1</label>
    <select class="form-control" name="p1">
      <?php
      foreach ($productos as $item) {
        echo '<option value="'.$item["product_id"].'">'.$item["product_name"].'</option>';
      }
      ?>
    </select>
  </div>

    <div class="form-group">
    <label for="p2">Producto_2</label>
    <select class="form-control" name="p2">
      <?php
      foreach ($productos as $item) {
        echo '<option value="'.$item["product_id"].'">'.$item["product_name"].'</option>';
      }
      ?>
    </select>
  </div>

  <button id="submitButton" type="submit"  name="submit" class="btn btn-primary boton">Guardar</button>
    </form>
  </div>
  </div>

</body>