<?php 

  include '../config/header.php';
  include '../config/conneccion.php';

  $db = new Database();
  $conn = $db->connect();
  $sql = "SELECT * FROM products Where product_id = ".$_GET['id'];
  $producto = $conn->query($sql)->fetch_assoc();


 ?>



<body>

  <div class="jumbotron">
    <div class="container">
<br>

<div class="container"> 

  <?php 

  echo "<h3>".$producto["product_name"]."</h3>";
  echo "<p>Id: ".$producto["product_id"]."<br/>"; 
  echo "Descrpcion: ".$producto["product_description"]."<br/>"; 
  echo "Imagenes:<br/>";
  for ($i = 1; $i<= 5; $i++){
    if (file_exists("../resources/products/".$producto["product_id"]."_".$i.".png"))
    echo "<img src='../resources/products/".$producto["product_id"]."_".$i.".png'><br>";
  }
  echo "</p>";
  ?>
  </div>
  </div>
  </div>
</body>