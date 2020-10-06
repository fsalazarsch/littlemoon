<?php
  include '../config/header.php';
  include '../config/conneccion.php';

  $db = new Database();
  $conn = $db->connect();
  $sql = "SELECT * FROM categories ORDER BY category_id";
  $categorias = $conn->query($sql);

  if (isset($_SESSION["user_id"])){
  ?>

?>
<body>
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
  <input type="file" name="file">
  </div>
  
  <div class="form-group">
    <label for="padre">Categoria padre</label>
    <select class="form-control" name="padre">
      <?php
      foreach ($categorias as $item) {
        echo '<option value="'.$item["category_id"].'">'.$item["category_name"].'</option>';
      }
      ?>
    </select>
  </div>

  <button id="submitButton" type="submit"  name="submit" class="btn btn-primary boton">Crear</button>
    </form>
  </div>
</div>
</div>
</body>
<?php
}
else
 header('Location: /littlemoon/');

?>