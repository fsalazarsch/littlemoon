<?php
	include '../config/conneccion.php';

	$db = new Database();
	$conn = $db->connect();
	
	$sql = "SELECT MAX(id_product) FROM products";
	$max = $conn->query($sql);
	if ($max == null)
		$max = 1;
	else{
		$max = $max->fetch_assoc();
		$max += 1;
		}

	print_r($_POST);

	$dirsub = "../resources/products";

	$files = array_filter($_FILES['file']['name']);
	$total_count = count($_FILES['file']['name']);
	// Loop through every file
	for( $i=0 ; $i < $total_count ; $i++ ) {
		$tmp_name = $_FILES['file']['tmp_name'][$i];
		move_uploaded_file($tmp_name, $dirsub."/".$max."_".($i+1).".png"); 
		}



	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	$db = new Database();
	$conn = $db->connect();
	
	$sql = "INSERT INTO products(product_name, product_description, product_price) values(?, ?, ?)";
	
		$sentencia = $conn->prepare($sql);
		$sentencia->bind_param("ssi",strtolower($_POST['name']), $_POST['descripcion'], $_POST['precio']);

	$sentencia->execute();

  	header('Location: ./index.php');

 ?>
