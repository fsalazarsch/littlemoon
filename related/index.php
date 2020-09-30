<?php
  include '../config/header.php';
  include '../config/conneccion.php';

  $db = new Database();
  $conn = $db->connect();
  $sql = "SELECT * FROM related_products";
  $mensajes = $conn->query($sql);

?>
<br>
<a class="btn btn-success" href="./create.php" role="button">Agregar</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Porducto1</th>
      <th scope="col">Producto2</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      foreach ($mensajes as $item) {
      echo '<tr>';
      echo '<th scope="row">'.$item['related_products_id'].'</th>';
      echo '<td>'.$item['product1_id'].'</td>';
      echo '<td>'.$item['product2_id'].'</td>';
      echo '<td><button class="btn btn-danger" onclick="eliminar('.$item['related_products_id'].')">Eliminar</button></td>';
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