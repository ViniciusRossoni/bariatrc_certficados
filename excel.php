<?php
//Importa CSV para MySql - Descontos

// Conexão com DB
include 'class/classConexao.php';
$connect = OpenCon();

// Cria tabela se não existe
mysqli_query($connect, "CREATE TABLE IF NOT EXISTS certificado (ID INT AUTO_INCREMENT PRIMARY KEY, nome VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL)");

// Limpa dados anteriores
mysqli_query($connect, "DELETE FROM certificado");

// Pega os dados do CSV
$file = 'certificados.csv';
$handle = fopen($file, "r");

// Loop dentro do CSV e adiciona na DB
do {
	if ($data[0]) {
		// Exibe a primeira e segunda coluna coluna
		echo addslashes($data[0]) . '<br>';
		echo addslashes($data[1]) . '<br>';
		//Insere na DB
		mysqli_query($connect, "INSERT INTO certificado (nome, email) VALUES 
	                ( 
	                    '" . addslashes(preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($data[0])))) . "',
	                    '" . addslashes($data[1]) . "'
	                ) 
	            ");
	}
} while ($data = fgetcsv($handle, 1000, ',', '"'));