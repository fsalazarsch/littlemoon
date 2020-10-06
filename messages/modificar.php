<?php 

  include '../config/header.php';
  include '../config/conneccion.php';

  $db = new Database();
  $conn = $db->connect();
  $sql = "SELECT * FROM messages Where message_id = ".$_GET['id'];
  $mensaje = $conn->query($sql)->fetch_assoc();

  if (isset($_SESSION["user_id"])){
 ?>

<body>

<br>
  <div class="jumbotron">
    <div class="container">
  <form  method="POST" action="domodify.php">
  <div class="md-form">

  <input type="hidden" id="id" name="id" value="<?php echo $mensaje["message_id"]; ?>">
    
  <input type="email" id="email" name="email" class="form-control" required="true" placeholder="Escribe tu e-mail" value="<?php echo $mensaje["message_email"]; ?>"></div>
  <div class="md-form">
  <input type="text" name="name" class="form-control" required="true" placeholder="Escribe el nombre" minlength="4" value="<?php echo $mensaje["message_name"]; ?>"></div>
  <div class="md-form">
  <textarea name="cuerpo" style="width: 100%;resize: none;background-color: transparent" placeholder=" Escribe el mensaje" required> <?php echo $mensaje["message_body"]; ?></textarea>
  </div>
  <button id="submitButton" type="submit"  name="submit" class="btn btn-primary boton">Modificar</button>
    </form>
  </div>
  </div>
</body>
<?php
}
else
 header('Location: /littlemoon/');

?>