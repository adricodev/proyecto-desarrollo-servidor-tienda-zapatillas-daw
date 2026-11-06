<?php
// Cargamos la sesion para el menu y los datos del producto.
require "../controllers/sesion_index_usuario.php";
require "../controllers/detalle_producto.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Detalle de <?= $producto["nombre"] ?> en Tienda Zapatillas Deportivas.">
  <title><?= $producto["nombre"] ?> | Tienda Zapatillas Deportivas</title>
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
    <nav class="migas" aria-label="Ruta de navegación">
      <a href="../index.php">Inicio</a>
      <span aria-hidden="true">/</span>
      <a href="../index.php#productos"><?= $producto["categoria"] ?></a>
      <span aria-hidden="true">/</span>
      <span><?= $producto["nombre"] ?></span>
    </nav>

    <article class="ficha">
      <div class="ficha-imagen">
        <img src="../<?= $producto["imagen"] ?>" alt="<?= $producto["nombre"] ?>">
      </div>

      <div class="ficha-info">
        <p class="subtitulo"><?= $producto["categoria"] ?></p>
        <h1><?= $producto["nombre"] ?></h1>
        <p class="producto-marca"><?= $producto["marca"] ?></p>
        <p class="ficha-precio"><?= number_format($producto["precio"], 2, ",", ".") ?> &euro;</p>
        <p class="ficha-descripcion"><?= $producto["descripcion"] ?></p>

        <form class="ficha-compra" action="../controllers/carrito_agregar.php" method="post">
          <input type="hidden" name="id_producto" value="<?= $producto["id_producto"] ?>">

          <div class="campo">
            <label for="talla">Talla</label>
            <select class="entrada" id="talla" name="talla" required>
              <option value="">Elige una talla</option>
              <?php foreach ($tallas as $t): ?>
                <option value="<?= $t["talla"] ?>" <?= $t["stock"] <= 0 ? "disabled" : "" ?>>
                  <?= $t["talla"] ?><?= $t["stock"] <= 0 ? " (agotada)" : "" ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <button class="boton boton-principal" type="submit">Añadir al carrito</button>
        </form>

        <p class="ficha-volver">
          <a href="../index.php#productos">&larr; Volver al catálogo</a>
        </p>
      </div>
    </article>
  </main>

  <footer class="pie-pagina">
    <div class="pie-contenido">
      <span>&copy; 2026 Tienda Zapatillas Deportivas. Todos los derechos reservados.</span>
      <a href="../index.php">Volver a la tienda</a>
    </div>
  </footer>
</body>
</html>
