<?php 

  include '../config/header.php';
  include '../config/conneccion.php';

  $db = new Database();
  $conn = $db->connect();
  $sql = "SELECT * FROM categories Where category_id = ".$_GET['id'];
  $categoria = $conn->query($sql)->fetch_assoc();

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
  </div>
</body>