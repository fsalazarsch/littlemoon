  <?php include './config/header.php';

  include './config/conneccion.php';

  $db = new Database();
  $conn = $db->connect();
  $sql = "SELECT * FROM categories ORDER BY category_id";
  $categorias = $conn->query($sql);
  $sql = "SELECT * FROM products ORDER BY product_id";
  $productos = $conn->query($sql);

  ?>;
  <body style=" background-color: #e9ecef;">

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">

    <!-- Example row of columns -->
    <div class="row">
      <?php
      foreach ($categorias as $item) {
      echo '<div class="col-md-3">';

      echo "<h2>".$item['category_name']."</h2>";
      echo '<p>'.$item['category_description'].'<br/><img style="width:50%" src="/littlemoon/resources/categories/'.$item['category_id'].'.png"></p>';
      echo '<a class="btn btn-secondary" href="/littlemoon/categories/ver.php?id='.$item['category_id'].'" role="button">Ver mas &raquo;</a></p>';
      echo "</div>";
      }
      ?>
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
  </div>

</main>

<footer class="container">
  <p>&copy; Company 2017-2020</p>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script></body>
</html>
