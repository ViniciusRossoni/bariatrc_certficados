<?php

function OpenCon() {

	$dbhost = "localhost";
	$dbuser = "bariatri_certificados";
	$dbpass = "aGT6GPgvN=9$";
	$dbname = "bariatri_certificados";

	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die("Erro de conexão com banco de dados: %s\n" . $conn->error);

	return $conn;
}

function CloseCon($conn) {
	$conn->close();
}