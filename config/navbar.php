<?php
session_start();

?>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="/littlemoon"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-moon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M14.53 10.53a7 7 0 0 1-9.058-9.058A7.003 7.003 0 0 0 8 15a7.002 7.002 0 0 0 6.53-4.47z"/>
</svg></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <?php if (isset($_SESSION['user_id']))
      { ?>
      <li class="nav-item">
        <a class="nav-link" href="/littlemoon/categories">Categorias<span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/littlemoon/products">Productos<span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/littlemoon/messages">Mensajes<span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/littlemoon/related">Relacionados<span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/littlemoon/logout.php"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-power" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M5.578 4.437a5 5 0 1 0 4.922.044l.5-.866a6 6 0 1 1-5.908-.053l.486.875z"/>
  <path fill-rule="evenodd" d="M7.5 8V1h1v7h-1z"/>
</svg><span class="sr-only"></span></a>
      </li>
      <?php
      }
      else{
      ?>
      <li class="nav-item">
        <a class="nav-link" href="/littlemoon/login.php">Login<span class="sr-only"></span></a>
      </li>      
      <?php
      }
      ?>
    </ul>
  </div>
</nav>