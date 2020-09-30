<?php
  include '../config/header.php';
  include '../config/conneccion.php';

  $db = new Database();
  $conn = $db->connect();
  $sql = "SELECT * FROM categories ORDER BY category_id";
  $mensajes = $conn->query($sql);

?>
<br>
<a class="btn btn-success" href="./create.php" role="button">Agregar</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Categ. Padre</th>
      <th scope="col">Imagen</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      foreach ($mensajes as $item) {
      echo '<tr>';
      echo '<th scope="row">'.$item['category_id'].'</th>';
      echo '<td>'.$item['category_name'].'</td>';
      echo '<td>'.$item['category_description'].'</td>';
      echo '<td>'.$item['category_parent_id'].'</td>';
      echo '<td><img style="width:50%" src="../resources/categories/'.$item['category_id'].'.png"></td>';
      echo '<td><a class= "btn btn-primary" href="./modificar.php?id='.$item['category_id'].'">Modificar</a><button class="btn btn-danger" onclick="eliminar('.$item['category_id'].')">Eliminar</button></td>';
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