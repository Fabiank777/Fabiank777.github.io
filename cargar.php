<?php
session_start();
include("conexion.php");

$usuario  = $_POST['usuario'] ?? "";
$password = $_POST['password'] ?? "";

$sql = "SELECT * FROM usuarios WHERE usuario = ? AND password = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ss", $usuario, $password);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
    $_SESSION['usuario'] = $usuario;
    $_SESSION['correo']  = $fila['correo'];
    header("Location: menu.php");
    
    exit();
} else {
    header("Location: index.php?error=1");
    exit();
}