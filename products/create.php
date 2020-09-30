<?php
  include '../config/header.php';
  include '../config/conneccion.php';

  $db = new Database();
  $conn = $db->connect();
  $sql = "SELECT * FROM products ORDER BY product_id";
  $categorias = $conn->query($sql);

?>
<body>
<br>
  <div class="jumbotron">
    <div class="container">
<br>

<div class="container">
  <form enctype="multipart/form-data" accept="image/x-png" method="POST" action="docreate.php">
  <div class="md-form">
  <input type="text" name="name" class="form-control" required="true" placeholder="Escribe el nombre" minlength="4"></div>
  <div class="md-form">
  <input type="text" name="descripcion" class="form-control" required="true" placeholder="Escribe la descripcion" minlength="4"></div>
  <div class="md-form">
  <input type="file" name="file[]" multiple>
  </div>
  <input type="number" name="precio" class="form-control" required="true" placeholder="Escribe el precio" minlength="4">

  <button id="submitButton" type="submit"  name="submit" class="btn btn-primary boton">Crear</button>
    </form>
</div>
  </div>
  </div>
</body>