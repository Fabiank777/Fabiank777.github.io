<?php
mysqli_report(MYSQLI_REPORT_OFF);
$conexion = @new mysqli("localhost", "root", "", "historia", 3312);


if ($conexion->connect_error) {


    echo("Error en la conexión: " . $conexion->connect_error);

     exit();
}
?>
