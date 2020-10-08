<?php 

  include '../config/header.php';
  include '../config/conneccion.php';

  $db = new Database();
  $conn = $db->connect();
  $sql = "SELECT * FROM products Where product_id = ".$_GET['id'];
  $producto = $conn->query($sql)->fetch_assoc();

  $items = [];

  $sql = "SELECT product1_id from related_products WHERE product2_id = ".$_GET['id'];
  $relacionados = $conn->query($sql);
  foreach ($relacionados as $item)
    array_push($items, $item['product1_id']);

  $sql = "SELECT product2_id from related_products WHERE product1_id = ".$_GET['id'];
  $relacionados = $conn->query($sql);
  foreach ($relacionados as $item)
    array_push($items, $item['product2_id']);
  
  $items = array_unique($items);

  $sql = "SELECT * FROM products Where product_id IN (".implode($items).")";
  $productos_relacionados = $conn->query($sql);  


 ?>



<body>

<style type="text/css">
  @media (min-width: 768px) {
.carousel-multi-item-2 .col-md-3 {
float: left;
width: 25%;
max-width: 100%; } }

.carousel-multi-item-2 .card img {
border-radius: 2px; }
</style>

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
    echo "<img src='../resources/products/".$producto["product_id"]."_".$i.".png' style='width:20%'>";
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


<!--Carousel Wrapper-->
<center>
<div id="multi-item-example" class="carousel slide carousel-multi-item carousel-multi-item-2" data-ride="carousel">
<center>
  <!--Controls-->
  <div class="controls-top">
    <a class="black-text" href="#multi-item-example" data-slide="prev"><i class="fas fa-angle-left fa-3x pr-3"></i></a>
    <a class="black-text" href="#multi-item-example" data-slide="next"><i class="fas fa-angle-right fa-3x pl-3"></i></a>
  </div>
  <!--/.Controls-->

  <!--Slides-->
  <div class="carousel-inner" role="listbox">

    <!--First slide-->
    <div class="carousel-item active">

      
        
          <?php
          //print_r($items);
          foreach ($items as $item) {
            echo '<div class="col-md-3 mb-3"><div class="card">';
            echo '<a href="/littlemoon/products/ver.php?id='.$item.'"><img class="img-fluid" src="../resources/products/'.$item.'_1.png" alt=""></a>';
            echo '</div></div>';            
          }
          ?>
     


    </div>


  </div>
  <!--/.Slides-->

</div>
<!--/.Carousel Wrapper-->


  </div>
  </div>
</body>
