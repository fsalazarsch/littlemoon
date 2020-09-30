<?php 

  include '../config/header.php';
  include '../config/conneccion.php';

  $db = new Database();
  $conn = $db->connect();
  $sql = "SELECT * FROM products Where product_id = ".$_GET['id'];
  $producto = $conn->query($sql)->fetch_assoc();


 ?>

<body>

<br>

<div class="container"> 
  <form  enctype="multipart/form-data" accept="image/x-png" method="POST" action="domodify.php">
    <input type="hidden" id="id" name="id" value="<?php echo $producto["product_id"]; ?>">
  <div class="md-form">
  <input type="text" name="name" class="form-control" required="true" placeholder="Escribe el nombre" minlength="4" value="<?php echo $producto["product_name"]; ?>"></div>
  <div class="md-form">
  <input type="text" name="descripcion" class="form-control" required="true" placeholder="Escribe la descripcion" minlength="4" value="<?php echo $producto["product_description"]; ?>"></div>
  <div class="md-form">
  <input type="file" name="image" multiple>
  </div>
  <input type="text" name="descripcion" class="form-control" required="true" placeholder="Escribe la descripcion" minlength="4" value="<?php echo $producto["product_description"]; ?>"></div>
  
  <button id="submitButton" type="submit"  name="submit" class="btn btn-primary boton">Enviar</button>
    </form>
  </div>
</body>