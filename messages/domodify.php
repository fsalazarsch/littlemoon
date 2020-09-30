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
	
	$sql = "Update messages SET message_email=?, message_name=?, message_body=? Where message_id=?";

	$sentencia = $conn->prepare($sql);
  	$sentencia->bind_param("ssss",strtolower($_POST['email']),$_POST['name'],$_POST['cuerpo'], $_POST['id']);
  	$sentencia->execute();

  	echo "Su mensaje ha sido enviado correctamente";
  	header('Location: ./index.php');

 ?>
</div>
</body>