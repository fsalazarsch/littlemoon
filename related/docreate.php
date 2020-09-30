<?php include "../config/header.php" ?>
<body>
<div class="container">
	<br>
<?php
	include '../config/conneccion.php';

	$db = new Database();
	$conn = $db->connect();


	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	$db = new Database();
	$conn = $db->connect();
	
	$sql = "INSERT INTO related_products(product1_id, product2_id) values(?, ?)";

	$sentencia = $conn->prepare($sql);
  	$sentencia->bind_param("ss",strtolower($_POST['p1']),$_POST['p2']);
  	$sentencia->execute();

  	echo "Su mensaje ha sido enviado correctamente";
  	header('Location: ./index.php');

 ?>
</div>
</body>