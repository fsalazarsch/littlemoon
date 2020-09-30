<?php
  include '../config/header.php';
  include '../config/conneccion.php';

  $db = new Database();
  $conn = $db->connect();
  $sql = "SELECT * FROM messages ORDER BY message_id";
  $mensajes = $conn->query($sql);

?>
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
      echo '<td><a class= "btn btn-primary" href="./modificar.php?id='.$item['message_id'].'">Modificar</a><button class="btn btn-danger" onclick="eliminar('.$item['message_id'].')">Eliminar</button></td>';
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