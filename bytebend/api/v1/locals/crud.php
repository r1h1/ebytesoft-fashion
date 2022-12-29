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


	//Listar registros y consultar registro
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		if (isset($_GET['id'])) {
			$sql = $pdo->prepare("SELECT l.id,l.codigo,l.nombreLocal,l.telefono,l.direccion,l.correoElectronico,e.nombreEmpresa FROM locals l
			INNER JOIN enterprice e ON l.empresaPertenece = e.id WHERE l.id=:id");
			$sql->bindValue(':id', $_GET['id']);
			$sql->execute();
			$sql->setFetchMode(PDO::FETCH_ASSOC);
			header('HTTP/1.1 200');
			header("Content-Type: application/json");
			echo json_encode($sql->fetchAll());
			exit;
		}
		else {
			$sql = $pdo->prepare("SELECT l.id,l.codigo,l.nombreLocal,l.telefono,l.direccion,l.correoElectronico,e.nombreEmpresa FROM locals l
			INNER JOIN enterprice e ON l.empresaPertenece = e.id;");
			$sql->execute();
			$sql->setFetchMode(PDO::FETCH_ASSOC);
			header('HTTP/1.1 200');
			header("Content-Type: application/json");
			echo json_encode($sql->fetchAll());
			exit;
		}
	}

	//Insertar registro
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$sql = "INSERT INTO locals(codigo, nombreLocal, telefono, direccion, correoElectronico, empresaPertenece) 
		VALUES (:codigo, :nombreLocal, :telefono, :direccion, :correoElectronico, :empresaPertenece)";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':codigo', $_POST['codigo']);
		$stmt->bindValue(':nombreLocal', $_POST['nombreLocal']);
		$stmt->bindValue(':telefono', $_POST['telefono']);
		$stmt->bindValue(':direccion', $_POST['direccion']);
		$stmt->bindValue(':correoElectronico', $_POST['correoElectronico']);
		$stmt->bindValue(':empresaPertenece', $_POST['empresaPertenece']);
		$stmt->execute();
		$idPost = $pdo->lastInsertId();
		if ($idPost) {
			header('HTTP/1.1 200');
			header("Content-Type: application/json");
			echo json_encode($idPost);
			exit;
		}
	}

	//Actualizar registro
	if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
		$sql = "UPDATE locals SET nombreLocal=:nombreLocal,telefono=:telefono,direccion=:direccion,correoElectronico=:correoElectronico,empresaPertenece=:empresaPertenece WHERE id=:id";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':nombreLocal', $_GET['nombreLocal']);
		$stmt->bindValue(':telefono', $_GET['telefono']);
		$stmt->bindValue(':direccion', $_GET['direccion']);
		$stmt->bindValue(':correoElectronico', $_GET['correoElectronico']);
		$stmt->bindValue(':empresaPertenece', $_GET['empresaPertenece']);
		$stmt->bindValue(':id', $_GET['id']);
		$stmt->execute();
		echo json_encode(1);
		header('HTTP/1.1 200');
		header("Content-Type: application/json");
		exit;
	}

	//Eliminar registro
	if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
		$sql = "DELETE FROM locals WHERE id=:id";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':id', $_GET['id']);
		$stmt->execute();
		echo json_encode(1);
		header('HTTP/1.1 200');
		header("Content-Type: application/json");
		exit;
	}

	//Si no corresponde a ninguna opción anterior
	header("HTTP/1.1 400 Bad Request");
	header("Content-Type: application/json");

?>