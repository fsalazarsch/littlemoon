<?php 

  include '../config/header.php';
  include '../config/conneccion.php';

  $db = new Database();
  $conn = $db->connect();
  $sql = "SELECT * FROM categories Where category_id = ".$_GET['id'];
  $categoria = $conn->query($sql)->fetch_assoc();

  $sql = "SELECT * FROM categories";
  $categorias = $conn->query($sql);

 ?>

<body>

<br>

<div class="container"> 
  <form  enctype="multipart/form-data" accept="image/x-png" method="POST" action="domodify.php">
    <input type="hidden" id="id" name="id" value="<?php echo $categoria["category_id"]; ?>">
  <div class="md-form">
  <input type="text" name="name" class="form-control" required="true" placeholder="Escribe el nombre" minlength="4" value="<?php echo $categoria["category_name"]; ?>"></div>
  <div class="md-form">
  <input type="text" name="descripcion" class="form-control" required="true" placeholder="Escribe la descripcion" minlength="4" value="<?php echo $categoria["category_description"]; ?>"></div>
  <div class="md-form">
  <input type="file" name="image">
  </div>
  
  <div class="form-group">
    <label for="padre">Categoria padre</label>
    <select class="form-control" id="padre">
      <?php
      foreach ($categorias as $item) {
        echo '<option value="'.$item["category_id"].'">'.$item["category_name"].'</option>';
      }
      ?>
    </select>
  </div>

  <button id="submitButton" type="submit"  name="submit" class="btn btn-primary boton">Enviar</button>
    </form>
  </div>
</body>