<?php include "../config/header.php" ?>

<body>

<br>

<div class="container">
  <form  method="POST" action="docreate.php">
  <div class="md-form">
  <input type="email" id="email" name="email" class="form-control" required="true" placeholder="Escribe tu e-mail"></div>
  <div class="md-form">
  <input type="text" name="name" class="form-control" required="true" placeholder="Escribe el nombre" minlength="4"></div>
  <div class="md-form">
  <textarea name="cuerpo" style="width: 100%;resize: none;background-color: transparent" placeholder=" Escribe el mensaje" required></textarea>
  </div>
  <button id="submitButton" type="submit"  name="submit" class="btn btn-primary boton">Enviar</button>
    </form>
  </div>
</body>