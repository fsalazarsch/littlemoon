<?php
	include '../config/conneccion.php';

	$db = new Database();
	$conn = $db->connect();
	$sql = "SELECT MAX(id_category) FROM categories";
	$max = $conn->query($sql);
	if ($max == null)
		$max = 1;
	else{
		$max = $max->fetch_assoc();
		$max += 1;
		}


	print_r($_POST);

	$dirsub = "../resources/categories";
	$tmp_name = $_FILES["file"]["tmp_name"];
	move_uploaded_file($tmp_name, $dirsub."/".$max.".png"); 
	



	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	$db = new Database();
	$conn = $db->connect();
	

	var_dump(isset($_POST['padre']));

	if (isset($_POST['padre'])){
		$sql = "INSERT INTO categories(category_name, category_description, category_parent_id) values(?, ?, ?)";
	
		$sentencia = $conn->prepare($sql);
		$sentencia->bind_param("sss",strtolower($_POST['name']),$_POST['descripcion'],$_POST['padre']);
	}

	else{
		$sql = "INSERT INTO categories(category_name, category_description) values(?, ?)";
	
		$sentencia = $conn->prepare($sql);
		$sentencia->bind_param("ss",strtolower($_POST['name']), $_POST['descripcion']);
	}

	$sentencia->execute();

  	header('Location: ./index.php');

 ?>
