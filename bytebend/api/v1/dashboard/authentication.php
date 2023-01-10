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


    //validar datos para ingresar login
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		
		if (isset($_GET['usuario']) && isset($_GET['clave'])) {
			$sql = $pdo->prepare("SELECT e.id,e.codigo,e.departamento,
			e.nombreCompleto,e.dpiNit,e.telefono,e.direccion,e.correoElectronico,
			e.fechaNacimiento, e.puesto,e.salario,e.usuario,rl.descripcion,
			l.nombreLocal,cr.nombreCaja,e.cajaPertenece,e.rol 
			FROM employees e 
			INNER JOIN locals l ON e.localPertenece = l.id 
			INNER JOIN cash_registers cr ON e.cajaPertenece = cr.id 
			INNER JOIN rol rl ON e.rol = rl.id 
			WHERE e.usuario = :usuario AND e.clave = :clave");
			$sql->bindValue(':usuario', $_GET['usuario']);
			$sql->bindValue(':clave', $_GET['clave']);
			$sql->execute();
			$sql->setFetchMode(PDO::FETCH_ASSOC);
			header('HTTP/1.1 200');
			header("Content-Type: application/json");
			echo json_encode($sql->fetchAll());
			exit;
		}
		else {
			header('HTTP/1.1 400 Bad Request');
			header("Content-Type: application/json");
			echo json_encode('SIN PERMISOS PARA ACCEDER, AUTENTIQUESE');
			exit;
		}
	}

	//Si no corresponde a ninguna opción anterior
	header("HTTP/1.1 400 Bad Request");
	header("Content-Type: application/json");

?>