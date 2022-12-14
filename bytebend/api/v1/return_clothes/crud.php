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
			$sql = $pdo->prepare("SELECT rc.id,rc.motivoCambio,rc.fotografia,rc.fechaYHora,rc.estado,rc.producto, rc.usuarioRecibe,rc.usuarioAutoriza, 
			e.nombreCompleto AS usuarioRecibeName,ee.nombreCompleto AS usuarioAutorizaName,p.codigo,p.nombre,p.cantidad 
			FROM return_clothes rc 
			INNER JOIN products p ON rc.producto = p.id 
			INNER JOIN employees e ON rc.usuarioRecibe = e.id 
			INNER JOIN employees ee ON rc.usuarioAutoriza = e.id
			WHERE rc.id = :id 
			ORDER BY rc.id DESC;");
			$sql->bindValue(':id', $_GET['id']);
			$sql->execute();
			$sql->setFetchMode(PDO::FETCH_ASSOC);
			header('HTTP/1.1 200');
			header("Content-Type: application/json");
			echo json_encode($sql->fetchAll());
			exit;
		}
		else {
			$sql = $pdo->prepare("SELECT rc.id,rc.motivoCambio,rc.fotografia,rc.fechaYHora,rc.estado,rc.producto, rc.usuarioRecibe,rc.usuarioAutoriza, 
			e.nombreCompleto AS usuarioRecibeName,ee.nombreCompleto AS usuarioAutorizaName,p.codigo,p.nombre,p.cantidad 
			FROM return_clothes rc 
			INNER JOIN products p ON rc.producto = p.id 
			INNER JOIN employees e ON rc.usuarioRecibe = e.id 
			INNER JOIN employees ee ON rc.usuarioAutoriza = e.id 
			ORDER BY rc.id DESC;");
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
		$sql = "INSERT INTO providers(codigo, tipoProveedor, tipoPago, telefono, direccion, correoElectronico) 
			VALUES (:codigo, :tipoProveedor, :tipoPago, :telefono, :direccion, :correoElectronico)";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':codigo', $_POST['codigo']);
		$stmt->bindValue(':tipoProveedor', $_POST['tipoProveedor']);
		$stmt->bindValue(':tipoPago', $_POST['tipoPago']);
		$stmt->bindValue(':telefono', $_POST['telefono']);
		$stmt->bindValue(':direccion', $_POST['direccion']);
		$stmt->bindValue(':correoElectronico', $_POST['correoElectronico']);
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
		$sql = "UPDATE providers SET codigo=:codigo,tipoProveedor=:tipoProveedor,tipoPago=:tipoPago,telefono=:telefono,direccion=:direccion,correoElectronico=:correoElectronico WHERE id=:id";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':codigo', $_GET['codigo']);
		$stmt->bindValue(':tipoProveedor', $_GET['tipoProveedor']);
		$stmt->bindValue(':tipoPago', $_GET['tipoPago']);
		$stmt->bindValue(':telefono', $_GET['telefono']);
		$stmt->bindValue(':direccion', $_GET['direccion']);
		$stmt->bindValue(':correoElectronico', $_GET['correoElectronico']);
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