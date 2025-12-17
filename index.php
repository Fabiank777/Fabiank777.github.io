<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Login y Registro</title>
<link rel="stylesheet" href="estilos.css">
</head>
<body>

<div class="contenedor">
    <h2>Acceso al sistema</h2>

    <?php if (isset($_GET['error'])): ?>
        <p style="color:red;">Usuario o contraseña incorrectos</p>
    <?php endif; ?>

    <form action="cargar.php" method="POST" class="formulario">
        <h3>Iniciar sesión</h3>
        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Entrar</button>
    </form>

    <p class="texto">¿No tienes cuenta?</p>
    <a href="registro.php" class="link">Registrarse</a>
</div>

</body>
</html>