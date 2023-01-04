<?php

	//cabezeras para acceso
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
	header("Allow: GET, POST, OPTIONS, PUT, DELETE");

	$method = $_SERVER['REQUEST_METHOD'];
	if ($method == "OPTIONS") {
		die();
	}


	//conexión a base de datos php
	include '../data/db.php';


	//inicio de la funcion PDO
	$pdo = new Conexion();


    //Insertar registro
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$sql = $pdo->prepare("SELECT * FROM `employees` WHERE usuario = 'denorte' AND clave = '12345';");
		$stmt->bindValue(':codigo', $_POST['codigo']);
		$stmt->bindValue(':departamento', $_POST['departamento']);
		$stmt->execute();
		header('HTTP/1.1 200 OK');
		header("Content-Type: application/json");
		echo json_encode($sql->fetchAll());
        exit;
	}

	//Si no corresponde a ninguna opción anterior
	header("HTTP/1.1 400 Bad Request");
	header("Content-Type: application/json");

?>