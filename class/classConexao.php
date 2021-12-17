<?php

function OpenCon() {

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "sistema_certificado";

	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die("Erro de conexão com banco de dados: %s\n" . $conn->error);

	return $conn;
}

function CloseCon($conn) {
	$conn->close();
}