<?php
  include '../config/header.php';
  include '../config/conneccion.php';

  $db = new Database();
  $conn = $db->connect();
  $sql = "SELECT * FROM products ORDER BY product_id";
  $productos = $conn->query($sql);

?>
<br>
<a class="btn btn-success" href="./create.php" role="button">Agregar</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Precio</th>
      <th scope="col">Imagen</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      foreach ($productos as $item) {
      echo '<tr>';
      echo '<th scope="row">'.$item['product_id'].'</th>';
      echo '<td>'.$item['product_name'].'</td>';
      echo '<td>'.$item['product_description'].'</td>';
      echo '<td>'.$item['product_price'].'</td>';
      echo '<td><img style="width:50%" src="../resources/products/'.$item['product_id'].'.png"></td>';
      echo '<td><a class= "btn btn-primary" href="./modificar.php?id='.$item['product_id'].'">Modificar</a><button class="btn btn-danger" onclick="eliminar('.$item['product_id'].')">Eliminar</button></td>';
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