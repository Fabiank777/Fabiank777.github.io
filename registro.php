<?php
include("conexion.php");

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = trim($_POST['usuario'] ?? "");
    $correo  = trim($_POST['correo'] ?? "");
    $pass    = $_POST['password'] ?? "";

    if ($usuario === "" || $correo === "" || $pass === "") {
        $mensaje = "Todos los campos son obligatorios";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $mensaje = "El correo no es válido";
    } else {
        $sql_check = "SELECT id FROM usuarios WHERE usuario = ? OR correo = ?";
        $stmt_check = $conexion->prepare($sql_check);
        $stmt_check->bind_param("ss", $usuario, $correo);
        $stmt_check->execute();
        $resultado = $stmt_check->get_result();

        if ($resultado->num_rows > 0 ) {
            $mensaje = "El usuario o el correo ya están registrados";
        } else {
            //$password = password_hash($pass, PASSWORD_DEFAULT);
            $password = $pass
            $sql = "INSERT INTO usuarios (usuario, correo, password) VALUES (?, ?, ?)";
            $stmt = $conexion->prepare($sql);

            if ($stmt) {
                $stmt->bind_param("sss", $usuario, $correo, $password);
                if ($stmt->execute()) {
                    $mensaje = "Registro exitoso. Ya puedes iniciar sesión";
                } else {
                    $mensaje = "Error al registrar el usuario";
                }
                $stmt->close();
            } else {
                $mensaje = "Error en la consulta";
            }
        }

        $stmt_check->close();
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Registro</title>
<link rel="stylesheet" href="estilos.css">
</head>
<body>


<div class="contenedor">
<h2>Registro de usuario</h2>


<?php if ($mensaje != ""): ?>
<p><?php echo $mensaje; ?></p>
<?php endif; ?>


<form method="POST" action="">
<input type="text" name="usuario" placeholder="Nombre de usuario" required>
<input type="email" name="correo" placeholder="Correo electrónico" required>
<input type="password" name="password" placeholder="Contraseña" required>
<button type="submit">Registrarse</button>
</form>


<a href="index.php">Volver al inicio</a>
</div>


</body>
</html>