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
			$sql = $pdo->prepare("SELECT * FROM clients WHERE id=:id ORDER BY nombreCompleto ASC");
			$sql->bindValue(':id', $_GET['id']);
			$sql->execute();
			$sql->setFetchMode(PDO::FETCH_ASSOC);
			header('HTTP/1.1 200');
			header("Content-Type: application/json");
			echo json_encode($sql->fetchAll());
			exit;
		}
		else {
			$sql = $pdo->prepare("SELECT * FROM clients ORDER BY nombreCompleto ASC");
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
		$sql = "INSERT INTO clients(codigo, membresia, codigoMembresia, nit, nombreCompleto, direccion, telefono, correoElectronico, puntosDisponibles) 
			VALUES (:codigo, :membresia, :codigoMembresia, :nit, :nombreCompleto, :direccion, :telefono, :correoElectronico, :puntosDisponibles)";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':codigo', $_POST['codigo']);
		$stmt->bindValue(':membresia', $_POST['membresia']);
		$stmt->bindValue(':codigoMembresia', $_POST['codigoMembresia']);
		$stmt->bindValue(':nit', $_POST['nit']);
		$stmt->bindValue(':nombreCompleto', $_POST['nombreCompleto']);
		$stmt->bindValue(':direccion', $_POST['direccion']);
		$stmt->bindValue(':telefono', $_POST['telefono']);
		$stmt->bindValue(':correoElectronico', $_POST['correoElectronico']);
		$stmt->bindValue(':puntosDisponibles', $_POST['puntosDisponibles']);
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
		$sql = "UPDATE clients SET nit=:nit,nombreCompleto=:nombreCompleto,direccion=:direccion,telefono=:telefono,correoElectronico=:correoElectronico,membresia=:membresia,codigoMembresia=:codigoMembresia WHERE id=:id";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':nit', $_GET['nit']);
		$stmt->bindValue(':nombreCompleto', $_GET['nombreCompleto']);
		$stmt->bindValue(':direccion', $_GET['direccion']);
		$stmt->bindValue(':telefono', $_GET['telefono']);
		$stmt->bindValue(':correoElectronico', $_GET['correoElectronico']);
		$stmt->bindValue(':membresia', $_GET['membresia']);
		$stmt->bindValue(':codigoMembresia', $_GET['codigoMembresia']);
		$stmt->bindValue(':id', $_GET['id']);
		$stmt->execute();
		echo json_encode(1);
		header('HTTP/1.1 200');
		header("Content-Type: application/json");
		exit;
	}

	//Eliminar registro
	if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
		$sql = "DELETE FROM clients WHERE id=:id";
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