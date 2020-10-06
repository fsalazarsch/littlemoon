<?php 

  include '../config/header.php';
  include '../config/conneccion.php';

  $db = new Database();
  $conn = $db->connect();
  $sql = "SELECT * FROM products Where product_id = ".$_GET['id'];
  $producto = $conn->query($sql)->fetch_assoc();

  if (isset($_SESSION["user_id"])){
 ?>



<body>

  <div class="jumbotron">
    <div class="container">
<br>

<div class="row">
      <div class="col">
  <?php 
  for ($i = 1; $i<= 5; $i++){
    if (file_exists("../resources/products/".$producto["product_id"]."_".$i.".png")){
    if ($i == 1)
    echo "<img src='../resources/products/".$producto["product_id"]."_".$i.".png' style='width:100%'><br>";
    else
    echo "<img src='../resources/products/".$producto["product_id"]."_".$i.".png' style='width:20%'><br>";
    }
  }
  echo "</p>";
  ?>
  
    </div>
    <div class="col">
    <?php 
  echo "<h3>".$producto["product_name"]."</h3>";
  //echo "<p>Id: ".$producto["product_id"]."<br/>"; 
  echo "Descrpcion:<br> ".$producto["product_description"]."<br/>"; 
  ?>
    </div>
  


  </div>
  </div>
  </div>
</body>
<?php
}
else
 header('Location: /littlemoon/');

?>