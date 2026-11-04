<?php
require "controllers/sesion_index_usuario.php";
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

          <span class="menu-usuario">
            Hola, <?= htmlspecialchars($nombre_user) ?>
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

      <!-- Ejemplo de rejilla. El bucle PHP repetirá esta tarjeta por cada producto. -->
      <div class="productos-grid">
        <article class="producto">
          <div class="producto-imagen">
            <span class="producto-sin-imagen">Nike</span>
          </div>
          <div class="producto-info">
            <span class="producto-categoria">Running</span>
            <h3>Air Zoom Pegasus 41</h3>
            <p class="producto-marca">Nike</p>
            <p class="producto-precio">129,99 &euro;</p>
            <a class="boton boton-secundario" href="views/producto.php?id=1">Ver producto</a>
          </div>
        </article>

        <article class="producto">
          <div class="producto-imagen">
            <span class="producto-sin-imagen">Adidas</span>
          </div>
          <div class="producto-info">
            <span class="producto-categoria">Fútbol</span>
            <h3>Predator League FG</h3>
            <p class="producto-marca">Adidas</p>
            <p class="producto-precio">89,99 &euro;</p>
            <a class="boton boton-secundario" href="views/producto.php?id=2">Ver producto</a>
          </div>
        </article>

        <article class="producto">
          <div class="producto-imagen">
            <span class="producto-sin-imagen">Puma</span>
          </div>
          <div class="producto-info">
            <span class="producto-categoria">Baloncesto</span>
            <h3>MB.03 Lo</h3>
            <p class="producto-marca">Puma</p>
            <p class="producto-precio">119,99 &euro;</p>
            <a class="boton boton-secundario" href="views/producto.php?id=3">Ver producto</a>
          </div>
        </article>

        <article class="producto">
          <div class="producto-imagen">
            <span class="producto-sin-imagen">Asics</span>
          </div>
          <div class="producto-info">
            <span class="producto-categoria">Running</span>
            <h3>Gel-Nimbus 26</h3>
            <p class="producto-marca">Asics</p>
            <p class="producto-precio">179,99 &euro;</p>
            <a class="boton boton-secundario" href="views/producto.php?id=4">Ver producto</a>
          </div>
        </article>

        <article class="producto">
          <div class="producto-imagen">
            <span class="producto-sin-imagen">New Balance</span>
          </div>
          <div class="producto-info">
            <span class="producto-categoria">Casual</span>
            <h3>530</h3>
            <p class="producto-marca">New Balance</p>
            <p class="producto-precio">109,99 &euro;</p>
            <a class="boton boton-secundario" href="views/producto.php?id=5">Ver producto</a>
          </div>
        </article>

        <article class="producto">
          <div class="producto-imagen">
            <span class="producto-sin-imagen">Mizuno</span>
          </div>
          <div class="producto-info">
            <span class="producto-categoria">Voleibol</span>
            <h3>Wave Momentum 3</h3>
            <p class="producto-marca">Mizuno</p>
            <p class="producto-precio">129,99 &euro;</p>
            <a class="boton boton-secundario" href="views/producto.php?id=6">Ver producto</a>
          </div>
        </article>
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
