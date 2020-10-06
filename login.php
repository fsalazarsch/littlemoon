  <?php include './config/header.php' ?>;
  <body style=" background-color: #e9ecef;">

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h2>Login</h2>
      <p>
          <form enctype="multipart/form-data" accept="image/x-png" method="POST" action="dologin.php">
          <div class="md-form">
            <label>Username</label>
          <input type="text" name="nombre" class="form-control" required="true" placeholder="Escribe el nombre" minlength="4"></div>
          <div class="md-form">
              <label>Contrasena</label>
          <input type="password" name="passwd" class="form-control" required="true" minlength="4"></div>
          <button id="submitButton" type="submit" name="submit" class="btn btn-primary boton">Login</button>
          </form>
      </p>
    </div>
  </div>



</main>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script></body>
</html>
