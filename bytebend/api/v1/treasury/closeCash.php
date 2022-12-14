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
			$sql = $pdo->prepare("SELECT t.id, t.tipoOperacion, t.fechaYHoraInicio, t.fechaYHoraFin, t.noBoletaDeposito, 
            t.turno, t.monto, t.montoFinal, t.motivo, t.estado, t.banco, t.usuario, b.nombreBancoEntidad, e.nombreCompleto 
            FROM treasury t 
            INNER JOIN banks b ON t.banco = b.id 
            INNER JOIN employees e ON t.usuario = e.id
            WHERE 
			t.id = :id
			AND
			t.tipoOperacion = 'AperturaCaja'
            ORDER BY t.fechaYHoraInicio DESC");
			$sql->bindValue(':id', $_GET['id']);
			$sql->execute();
			$sql->setFetchMode(PDO::FETCH_ASSOC);
			header('HTTP/1.1 200');
			header("Content-Type: application/json");
			echo json_encode($sql->fetchAll());
			exit;
		}
		else {
			$sql = $pdo->prepare("SELECT t.id, t.tipoOperacion, t.fechaYHoraInicio, t.fechaYHoraFin, t.noBoletaDeposito, 
            t.turno, t.monto, t.montoFinal, t.motivo, t.estado, t.banco, t.usuario, b.nombreBancoEntidad, e.nombreCompleto, e.cajaPertenece
            FROM treasury t 
            INNER JOIN banks b ON t.banco = b.id 
            INNER JOIN employees e ON t.usuario = e.id
            WHERE t.tipoOperacion = 'AperturaCaja'
            ORDER BY t.fechaYHoraInicio DESC");
			$sql->execute();
			$sql->setFetchMode(PDO::FETCH_ASSOC);
			header('HTTP/1.1 200');
			header("Content-Type: application/json");
			echo json_encode($sql->fetchAll());
			exit;
		}
	}


	//Actualizar registro
	if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
		$sql = "UPDATE treasury SET fechaYHoraFin=:fechaYHoraFin, montoFinal=:montoFinal, estado=:estado WHERE id=:id";
		$stmt = $pdo->prepare($sql);

		$stmt->bindValue(':fechaYHoraFin', $_GET['fechaYHoraFin']);
		$stmt->bindValue(':montoFinal', $_GET['montoFinal']);
        $stmt->bindValue(':estado', $_GET['estado']);
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
