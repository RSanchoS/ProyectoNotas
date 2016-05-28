<?php

$mysqli = new mysqli('localhost', 'root', '', 'notesBBDD');


if ($mysqli->connect_errno) {

    echo "Error: Fallo al conectarse a MySQL debido a: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    exit;
}


$sql = "SELECT * FROM notes WHERE Favorita = 1 ";
if (!$resultado = $mysqli->query($sql)) {

    echo "Error: La ejecución de la consulta falló debido a: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}

// Imprimir nuestros cinco actores aleatorios en una lista, y enlazar cada uno
echo "<ul>\n";
while ($nota = $resultado->fetch_assoc()) {
    echo "<li>";
    echo $nota['Nota'] . ' ' . $nota['Favorita'];
    echo "</li>\n";
}
echo "</ul>\n";

$resultado->free();
$mysqli->close();
?>