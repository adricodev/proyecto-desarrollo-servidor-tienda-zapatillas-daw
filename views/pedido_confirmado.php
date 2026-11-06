<?php
// Pagina final tras confirmar un pedido.
require "../controllers/sesion_index_usuario.php";

$id_pedido = $_GET["id"] ?? 0;
$id_pedido = (int) $id_pedido;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Pedido confirmado en Tienda Zapatillas Deportivas.">
  <title>Pedido confirmado | Tienda Zapatillas Deportivas</title>
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

        <?php if ($usuario_logueado): ?>
          <?php if ($es_admin): ?>
            <a class="menu-enlace" href="admin_panel.php">Panel</a>
          <?php endif; ?>
          <span class="menu-usuario">Hola, <?= $nombre_user ?></span>
          <a class="menu-enlace" href="../controllers/logout_usuario.php">Cerrar sesión</a>
        <?php else: ?>
          <a class="menu-enlace" href="registro.php">Registro</a>
          <a class="menu-enlace" href="login.php">Iniciar sesión</a>
        <?php endif; ?>
      </nav>
    </div>
  </header>

  <main id="contenido" class="principal">
    <section class="tarjeta confirmacion">
      <p class="subtitulo">Gracias por tu compra</p>
      <h1>Pedido confirmado</h1>
      <p class="texto-intro">
        Tu pedido <strong>#<?= $id_pedido ?></strong> se ha registrado correctamente.
        Te enviaremos la confirmación por correo.
      </p>

      <div class="botones">
        <a class="boton boton-principal" href="../index.php#productos">Seguir comprando</a>
        <a class="boton boton-secundario" href="../index.php">Volver al inicio</a>
      </div>
    </section>
  </main>

  <footer class="pie-pagina">
    <div class="pie-contenido">
      <span>&copy; 2026 Tienda Zapatillas Deportivas. Todos los derechos reservados.</span>
      <a href="../index.php">Volver a la tienda</a>
    </div>
  </footer>
</body>
</html>
