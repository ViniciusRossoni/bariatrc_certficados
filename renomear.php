<?php
include 'class/classConexao.php';
$link = OpenCon();

$sql = "SELECT * FROM certificado";
$results = mysqli_query($link, $sql);

$nomes = array();

while ($row = mysqli_fetch_assoc($results)) {
    array_push($nomes, $row['nome']);
}

foreach($nomes as $nome) {
    echo($nome);
}

// if ($handle = opendir('include/img/certificados/')) {
//     while (false !== ($fileName = readdir($handle))) {
//         $newName = str_replace("SKU#", "", $fileName);
//         rename($fileName, $newName);
//     }
//     closedir($handle);
// }
