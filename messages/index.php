<?php
  include '../config/header.php';
  include '../config/conneccion.php';

  $db = new Database();
  $conn = $db->connect();
  $sql = "SELECT * FROM messages ORDER BY message_id";
  $mensajes = $conn->query($sql);

  if (isset($_SESSION["user_id"])){

?>
  <div class="jumbotron">
    <div class="container">
<br>
<a class="btn btn-success" href="./create.php" role="button">Agregar</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Email</th>
      <th scope="col">Nombre</th>
      <th scope="col">Mensaje</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      foreach ($mensajes as $item) {
      echo '<tr>';
      echo '<th scope="row">'.$item['message_id'].'</th>';
      echo '<td>'.$item['message_email'].'</td>';
      echo '<td>'.$item['message_name'].'</td>';
      echo '<td>'.$item['message_body'].'</td>';
      echo '<td><a class= "btn btn-primary" href="./modificar.php?id='.$item['message_id'].'"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg></a><button class="btn btn-danger" onclick="eliminar('.$item['message_id'].')"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
</svg></button></td>';
      echo '</tr>';
      }
    ?>
  </tbody>
</table>

<script type="text/javascript">
  function eliminar(i){
    $.post({
      url: "./eliminar.php",
        data: { id: i }
      });
    alert("Item eliminado");
    location.reload();
  }
</script>
</div>
</div>
<?php
}
else
 header('Location: /littlemoon/');

?>