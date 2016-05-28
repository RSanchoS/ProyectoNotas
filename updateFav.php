<?php
	$mysqli = new mysqli('localhost', 'root', '', 'notesBBDD');


if ($mysqli->connect_errno) {

    echo "Error: Fallo al conectarse a MySQL debido a: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    exit;
}

$FavNuevoValor = IntercambiarValor($_GET['fav']);


$sql = "UPDATE notes SET Favorita = " . $FavNuevoValor . " WHERE ID = " . $_GET['id'];
if (!$resultado = $mysqli->query($sql)) {

    echo "Error: La ejecución de la consulta falló debido a: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}

header('Location: home.php');

function IntercambiarValor($valor){
    if (strcmp($valor, '1') == 0){
        return '0' ;
    }
    else
    {
        return '1' ;
    }
}

?>