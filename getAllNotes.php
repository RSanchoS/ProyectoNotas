<?php

$mysqli = new mysqli('localhost', 'root', '', 'notesBBDD');


if ($mysqli->connect_errno) {

    echo "Error: Fallo al conectarse a MySQL debido a: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    exit;
}


$sql = "SELECT * FROM notes ";
if (!$resultado = $mysqli->query($sql)) {

    echo "Error: La ejecución de la consulta falló debido a: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}

echo "<ul>\n";
while ($nota = $resultado->fetch_assoc()) {
    $varFav = $nota['Favorita'];
    echo "<li>";
    echo $nota['Nota'] . ' ' . '<a href="updateFav.php?id=' . $nota['ID']  .'&fav='. $nota['Favorita'] .'">';
    if (strcmp($nota['Favorita'], '1') == 0){
        echo '<span class="glyphicon glyphicon-heart rojo">';
    }
    else
    {
        echo '<span class="glyphicon glyphicon-heart">';
    }
    echo '</span></a>';
    echo "</li>\n";
}
echo "</ul>\n";

$resultado->free();
$mysqli->close();
?>