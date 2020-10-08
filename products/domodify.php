
<?php
	include '../config/conneccion.php';

	$db = new Database();
	$conn = $db->connect();

	for ($i=0; $i<7; $i++){
		$nombrearch = "image_".($i+1);
		if (isset($_FILES[$nombrearch])){
		
			$dirsub = "../resources/products";
			$tmp_name = $_FILES[$nombrearch]['tmp_name'];
			move_uploaded_file($tmp_name, $dirsub."/".$_POST['id']."_".($i+1).".png"); 
		}

	}


	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	$db = new Database();
	$conn = $db->connect();
	

	$sql = "UPDATE products SET product_name=?, product_description=?, product_price=? WHERE product_id=?";

	$sentencia = $conn->prepare($sql);
  	$sentencia->bind_param("ssss",strtolower($_POST['name']),$_POST['descripcion'],$_POST['precio'], $_POST['id']);
  	$sentencia->execute();
  	header('Location: ./index.php');

 ?>