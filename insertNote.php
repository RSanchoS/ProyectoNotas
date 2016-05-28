<?php
$mysqli = new mysqli('localhost', 'root', '', 'notesBBDD');


if ($mysqli->connect_errno) {

    echo "Error: Fallo al conectarse a MySQL debido a: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    exit;
}
$ID = UltimoID();
$ID['MAX(ID)'] = $ID['MAX(ID)'] + 1 ;
$sentencia = 'INSERT INTO `notes`(`ID`, `Nota`) VALUES (' . $ID['MAX(ID)'] . ' ,"' . $_POST['note'] . '")';

$sql = $sentencia;
if (!$resultado = $mysqli->query($sql)) {

    echo "Error: La ejecución de la consulta falló debido a: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}

$mysqli->close();
header('Location: home.php');

function UltimoID(){
    $mysqli = new mysqli('localhost', 'root', '', 'notesBBDD');


    if ($mysqli->connect_errno) {

        echo "Error: Fallo al conectarse a MySQL debido a: \n";
        echo "Errno: " . $mysqli->connect_errno . "\n";
        echo "Error: " . $mysqli->connect_error . "\n";
        exit;
    }

    $sql = "SELECT MAX(ID) FROM notes";

    if (!$resultado = $mysqli->query($sql)) {

    echo "Error: La ejecución de la consulta falló debido a: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
    }

    $id = $resultado->fetch_assoc();
    return $id;

    $resultado->free();
    $mysqli->close();
}

?>