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

			$sql = $pdo->prepare("SELECT e.id,e.codigo,e.departamento,e.nombreCompleto,e.dpiNit,e.telefono,e.direccion,e.correoElectronico,e.fechaNacimiento,
			e.puesto,e.salario,e.usuario,l.nombreLocal,cr.nombreCaja FROM employees e INNER JOIN locals l ON e.localPertenece = l.id
			INNER JOIN cash_registers cr ON e.cajaPertenece = cr.id; WHERE e.id=:id");

			$sql->bindValue(':id', $_GET['id']);
			$sql->execute();
			$sql->setFetchMode(PDO::FETCH_ASSOC);
			header('HTTP/1.1 200');
			header("Content-Type: application/json");
			echo json_encode($sql->fetchAll());
			exit;
		}
		else {

			$sql = $pdo->prepare("SELECT e.id,e.codigo,e.departamento,e.nombreCompleto,e.dpiNit,e.telefono,e.direccion,e.correoElectronico,e.fechaNacimiento,
			e.puesto,e.salario,e.usuario,l.nombreLocal,cr.nombreCaja FROM employees e INNER JOIN locals l ON e.localPertenece = l.id
			INNER JOIN cash_registers cr ON e.cajaPertenece = cr.id");

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

		$sql = "INSERT INTO employees(codigo, departamento, nombreCompleto, dpiNit, telefono, direccion, correoElectronico, 
		fechaNacimiento, puesto, salario, 
		usuario, clave, localPertenece, cajaPertenece) 
		VALUES (:codigo, :departamento, :nombreCompleto, :dpiNit, :telefono, :direccion, :correoElectronico, :fechaNacimiento, 
		:puesto, :salario, 
		:usuario, :clave, :localPertenece, :cajaPertenece)";

		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':codigo', $_POST['codigo']);
		$stmt->bindValue(':departamento', $_POST['departamento']);
		$stmt->bindValue(':nombreCompleto', $_POST['nombreCompleto']);
		$stmt->bindValue(':dpiNit', $_POST['dpiNit']);
		$stmt->bindValue(':telefono', $_POST['telefono']);
		$stmt->bindValue(':direccion', $_POST['direccion']);
		$stmt->bindValue(':correoElectronico', $_POST['correoElectronico']);
		$stmt->bindValue(':fechaNacimiento', $_POST['fechaNacimiento']);
		$stmt->bindValue(':puesto', $_POST['puesto']);
		$stmt->bindValue(':salario', $_POST['salario']);
		$stmt->bindValue(':usuario', $_POST['usuario']);
		$stmt->bindValue(':clave', $_POST['clave']);
		$stmt->bindValue(':localPertenece', $_POST['localPertenece']);
		$stmt->bindValue(':cajaPertenece', $_POST['cajaPertenece']);
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

		$sql = "UPDATE employees SET departamento=:departamento,nombreCompleto=:nombreCompleto,dpiNit=:dpiNit,
		telefono=:telefono,direccion=:direccion,correoElectronico=:correoElectronico,fechaNacimiento=:fechaNacimiento,
		puesto=:puesto,salario=:salario,usuario=:usuario,localPertenece=:localPertenece,cajaPertenece=:cajaPertenece 
		WHERE id=:id";
		
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':departamento', $_GET['departamento']);
		$stmt->bindValue(':nombreCompleto', $_GET['nombreCompleto']);
		$stmt->bindValue(':dpiNit', $_GET['dpiNit']);
		$stmt->bindValue(':telefono', $_GET['telefono']);
		$stmt->bindValue(':direccion', $_GET['direccion']);
		$stmt->bindValue(':correoElectronico', $_GET['correoElectronico']);
		$stmt->bindValue(':fechaNacimiento', $_GET['fechaNacimiento']);
		$stmt->bindValue(':puesto', $_GET['puesto']);
		$stmt->bindValue(':salario', $_GET['salario']);
		$stmt->bindValue(':usuario', $_GET['usuario']);
		$stmt->bindValue(':localPertenece', $_GET['localPertenece']);
		$stmt->bindValue(':cajaPertenece', $_GET['cajaPertenece']);
		$stmt->bindValue(':id', $_GET['id']);
		$stmt->execute();
		echo json_encode(1);
		header('HTTP/1.1 200');
		header("Content-Type: application/json");
		exit;
	}

	//Eliminar registro
	if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
		$sql = "DELETE FROM employees WHERE id=:id";
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