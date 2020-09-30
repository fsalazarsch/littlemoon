<?php
	include '../config/conneccion.php';

	$db = new Database();
	$conn = $db->connect();


	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	$db = new Database();
	$conn = $db->connect();
	
	$sql = "DELETE FROM products WHERE product_id=?";

	$sentencia = $conn->prepare($sql);
  	$sentencia->bind_param("s", $_POST['id']);
  	$sentencia->execute();


 ?>
