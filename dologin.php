<?php
session_start();


if($_POST){

  include './config/conneccion.php';

  $db = new Database();
  $conn = $db->connect();

  $passwd = $_POST["passwd"];
  $sql = "SELECT user_id, user_email FROM users WHERE user_email like '".$_POST["nombre"]."' and user_password like '".$passwd."' LIMIT 1";
  //echo $sql;
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $_SESSION = $row;
  //if ($result->num_rows == 0)
    //header('Location: /littlemoon/index.php?login_error=1');
}

if (isset($_SESSION["user_id"])){
    header('Location: /littlemoon/');
  }


?>