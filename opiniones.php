<?php
include("conexion.php");
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $correo = $_POST['correo'];
    $opinion = $_POST['opinion'];

    $sql = "INSERT INTO opiniones (correo, opinion) VALUES (?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ss", $correo, $opinion);
    $stmt->execute();
    $mensaje = "Gracias por tu opinión";
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="estilos3.css">
</head>
<body>
<nav><a href="menu.php">Menú principal</a></nav>


<h2 class="titulo">Opiniones</h2>

<p><?php echo $mensaje; ?></p>

<form method="POST">
<input type="email" name="correo" value="correo" required>
<textarea name="opinion" required></textarea>
<button>Enviar</button>
</form>
</body>
</html>