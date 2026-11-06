<?php
require "controllers/sesion_index_usuario.php";
require "controllers/listar_productos.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Tienda de zapatillas deportivas: running, fútbol, baloncesto y mucho más.">
  <title>Inicio | Tienda Zapatillas Deportivas</title>
  <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
  <a class="salto-contenido" href="#contenido">Saltar al contenido</a>

  <header class="cabecera">
    <div class="cabecera-contenido">
      <a class="logo" href="index.php">
        <span class="logo-icono" aria-hidden="true">TZ</span>
        <span class="logo-texto">
          Tienda Zapatillas
          <small>Deportivas</small>
        </span>
      </a>

      <nav class="menu" aria-label="Navegación principal">
        <a class="menu-enlace" href="index.php" aria-current="page">Inicio</a>

        <?php if ($usuario_logueado): ?>
        <?php if($es_admin): ?>
        <a class="menu-enlace" href="views/admin_panel.php">Menu Administracion</a>
        <?php endif;?>

          <span class="menu-usuario">
            Hola, <?= $nombre_user ?>
          </span>
          <a class="menu-enlace" href="controllers/logout_usuario.php">Cerrar sesión</a>

        <?php else: ?>

          <a class="menu-enlace" href="views/registro.php">Registro</a>
          <a class="menu-enlace" href="views/login.php">Iniciar sesión</a>

        <?php endif; ?>
      </nav>
    </div>
  </header>

  <main id="contenido" class="principal">
    <section class="portada" aria-labelledby="titulo-portada">
      <p class="subtitulo">Nueva temporada</p>
      <h1 id="titulo-portada">Zapatillas para cada deporte</h1>
      <p class="texto-intro">
        Running, fútbol, baloncesto y entrenamiento. Encuentra tu talla y sal a por todas.
      </p>
      <a class="boton boton-principal" href="#productos">Ver zapatillas</a>
    </section>

    <section class="productos" id="productos" aria-labelledby="titulo-productos">
      <div class="productos-cabecera">
        <h2 id="titulo-productos">Productos destacados</h2>
      </div>

      <!-- Productos dibujados desde la BD -->
      <div class="productos-grid">
              <?php foreach ($productos as $producto): ?>
                  <article class="producto">
                      <div class="producto-imagen">
                          <img src="<?= $producto["imagen"] ?>" alt="<?= $producto["nombre"] ?>">
                      </div>
                      <div class="producto-info">
                          <span class="producto-categoria"><?= $producto["categoria"] ?></span>
                          <h3><?= $producto["nombre"] ?></h3>
                          <p class="producto-marca"><?= $producto["marca"] ?></p>
                          <p class="producto-precio"><?= number_format($producto["precio"], 2, ",", ".") ?> &euro;</p>
                          <a class="boton boton-secundario" href="views/producto.php?id=<?= $producto["id_producto"] ?>">Ver producto</a>
                      </div>
                  </article>
              <?php endforeach; ?>
      </div>
    </section>
  </main>

  <footer class="pie-pagina">
    <div class="pie-contenido">
      <span>&copy; 2026 Tienda Zapatillas Deportivas. Todos los derechos reservados.</span>
      <a href="#contenido">Volver arriba</a>
    </div>
  </footer>
</body>
</html>
