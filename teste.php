<?php
include 'class/classConexao.php';
$link = OpenCon();

$sql = "SELECT * FROM certificado WHERE email = 'vini.rossoni.dias@gmail.com'";
$results = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($results);

echo $row['nome'];