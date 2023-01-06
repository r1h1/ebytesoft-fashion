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
			$sql = $pdo->prepare("SELECT p.id,p.codigo,p.nombre,p.descripcion,p.cantidad,
			p.estado,l.nombreLocal,c.nombreCategoria,pr.tipoProveedor,
			tp.nombreTipo 
			FROM products p
			INNER JOIN locals l ON p.localPertenece = l.id
			INNER JOIN categories c ON p.categoria = c.id
			INNER JOIN providers pr ON p.proveedor = pr.id
			INNER JOIN product_types tp ON p.tipoProducto = tp.id
			WHERE p.id = :id
			ORDER BY p.nombre ASC");
			$sql->bindValue(':id', $_GET['id']);
			$sql->execute();
			$sql->setFetchMode(PDO::FETCH_ASSOC);
			header('HTTP/1.1 200');
			header("Content-Type: application/json");
			echo json_encode($sql->fetchAll());
			exit;
		}
		else {
			$sql = $pdo->prepare("SELECT p.id,p.codigo,p.nombre,p.descripcion,p.cantidad,
			p.estado,l.nombreLocal,c.nombreCategoria,pr.tipoProveedor,
			tp.nombreTipo 
			FROM products p
			INNER JOIN locals l ON p.localPertenece = l.id
			INNER JOIN categories c ON p.categoria = c.id
			INNER JOIN providers pr ON p.proveedor = pr.id
			INNER JOIN product_types tp ON p.tipoProducto = tp.id
			ORDER BY p.nombre ASC");
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
		$sql = "INSERT INTO products(codigo, nombre, descripcion, cantidad, estado, localPertenece, categoria, proveedor, tipoProducto) 
		VALUES (:codigo, :nombre, :descripcion, :cantidad, :estado, :localPertenece, :categoria, :proveedor, :tipoProducto)";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':codigo', $_POST['codigo']);
		$stmt->bindValue(':nombre', $_POST['nombre']);
		$stmt->bindValue(':descripcion', $_POST['descripcion']);
		$stmt->bindValue(':cantidad', $_POST['cantidad']);
		$stmt->bindValue(':estado', $_POST['estado']);
		$stmt->bindValue(':localPertenece', $_POST['localPertenece']);
		$stmt->bindValue(':categoria', $_POST['categoria']);
		$stmt->bindValue(':proveedor', $_POST['proveedor']);
		$stmt->bindValue(':tipoProducto', $_POST['tipoProducto']);
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
		$sql = "DELETE FROM products WHERE id=:id";
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