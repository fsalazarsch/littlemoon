<?php 

  include '../config/header.php';
  include '../config/conneccion.php';


  $db = new Database();
  $conn = $db->connect();
  $sql = "SELECT * FROM categories Where category_id = ".$_GET['id'];
  $categoria = $conn->query($sql)->fetch_assoc();

  $sql = "SELECT * FROM products Where category_id = ".$_GET['id'];
  $productos = $conn->query($sql);


  if (is_null($categoria["category_parent_id"]))
    $cp ='---';
  else{   
  $sql = "SELECT * FROM categories where id =".$categoria["category_parent_id"];
  $padre = $conn->query($sql)->fetch_assoc();
  $cp = $padre["category_name"];
  }

 ?>

<body>
  <div class="jumbotron">
    <div class="container">
<br>

<div class="container"> 

  <?php 

  echo "<h3>".$categoria["category_name"]."</h3>";
  echo "<p>Id: ".$categoria["category_id"]."<br/>"; 
  echo "Descrpcion: ".$categoria["category_description"]."<br/>"; 
  echo "Categoria padre: ".$cp."</p>";
  ?>
  </div>
  </div>
  <hr>

      <div class="row">
      <?php
      $index =0;
      foreach ($productos as $item) {
      
      if($index %4 ==0){
        echo '</div><div class="row">';

      }

      echo '<div class="col-md-3">';

      echo "<h2>".$item['product_name']."</h2>";
      echo '<p>'.$item['product_description'].'<br/><img style="width:50%" src="/littlemoon/resources/products/'.$item['product_id'].'_1.png"></p>';
      echo '<a class="btn btn-secondary" href="/littlemoon/products/ver.php?id='.$item['product_id'].'" role="button">Ver mas &raquo;</a></p>';
      echo "</div>";

      $index += 1;
      }
      ?>
    </div>

  </div>
</body>