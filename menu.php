<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: inicio.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú principal</title>
    <link rel="stylesheet" href="menu.css">
</head>
<body>

    <!-- Menú de navegación -->
    <nav class="menu">
        <span class="logo">Mi Sitio</span>
        <div class="links">
            <a href="tema1.php">Elipse</a>
            <a href="tema2.php">vectores</a>
            <a href="tema3.php">circurferencia</a>
            <a href="tema4.php">funciones</a>
            <a href="opiniones.php">Opiniones</a>
            <a href="bibliografia.php">Biografía</a>
        </div>
        <div class="usuario">
            <span><?php echo $_SESSION['usuario']; ?></span>
            <a href="cerrar.php">Cerrar sesión</a>
        </div>
    </nav>

    <!-- Contenedor principal -->
    <main class="contenedor-principal">
        <h1>Temas selectos de matemáticas II.</h1>
        <p>
            esta pagina viene con unos temas reacionados al pensamiento matenmtico esta echa para que aprendas mas sobre este temas y puedas entenderlos mejor.
        </p>
        <img src="imgelipse/alberto.jpg">
    </main>

</body>
</html>
