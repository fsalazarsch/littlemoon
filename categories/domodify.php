
<?php
	include '../config/conneccion.php';

	$db = new Database();
	$conn = $db->connect();



	if (isset($_FILES["file"])){
		$dirsub = "../resources/categories";
		$tmp_name = $_FILES["file"]["tmp_name"];
		move_uploaded_file($tmp_name, $dirsub."/".$_POST['id'].".png"); 
	}


	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	$db = new Database();
	$conn = $db->connect();
	
	$sql = "UPDATE categories SET category_name=?, category_description=?, category_parent_id =?  WHERE category_id=?";

	$sentencia = $conn->prepare($sql);
  	$sentencia->bind_param("ssss",strtolower($_POST['name']),$_POST['descripcion'],$_POST['padre'], $_POST['id']);
  	$sentencia->execute();
  	header('Location: ./index.php');

 ?>