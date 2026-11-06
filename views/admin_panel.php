<?php
require "../controllers/comprobar_admin.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Panel de administración de la tienda.">
  <title>Panel de administración | Tienda Zapatillas Deportivas</title>
  <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
  <a class="salto-contenido" href="#contenido">Saltar al contenido</a>

  <header class="cabecera">
    <div class="cabecera-contenido">
      <a class="logo" href="../index.php">
        <span class="logo-icono" aria-hidden="true">TZ</span>
        <span class="logo-texto">
          Tienda Zapatillas
          <small>Deportivas</small>
        </span>
      </a>

      <nav class="menu" aria-label="Navegación principal">
        <a class="menu-enlace" href="../index.php">Inicio</a>
        <a class="menu-enlace" href="admin_panel.php" aria-current="page">Panel</a>

        <span class="menu-usuario"><?=$_SESSION["nombre"] ?></span>
        <a class="menu-enlace" href="../controllers/logout_usuario.php">Cerrar sesión</a>
      </nav>
    </div>
  </header>

  <main id="contenido" class="principal">
    <div class="panel-cabecera">
      <p class="subtitulo">Administración</p>
      <h1>Panel de control</h1>
      <p class="texto-intro">
        Desde aquí se gestionan los productos y los usuarios de la tienda.
      </p>
    </div>

    <div class="panel-grid">
      <article class="panel-tarjeta">
        <h2>Productos</h2>
        <p>Crear, modificar y eliminar los artículos de la tienda.</p>
        <a class="boton boton-principal" href="admin_productos.php">Gestionar productos</a>
      </article>

      <article class="panel-tarjeta">
        <h2>Usuarios</h2>
        <p>Crear, modificar y eliminar usuarios clientes y administradores.</p>
        <a class="boton boton-secundario" href="admin_usuarios.php">Gestionar usuarios</a>
      </article>
    </div>
  </main>

  <footer class="pie-pagina">
    <div class="pie-contenido">
      <span>&copy; 2026 Tienda Zapatillas Deportivas. Todos los derechos reservados.</span>
      <a href="../index.php">Volver a la tienda</a>
    </div>
  </footer>
</body>
</html>
