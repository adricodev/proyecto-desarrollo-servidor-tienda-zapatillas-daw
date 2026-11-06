<?php
// Cargamos sesion y carrito antes de imprimir nada.
require "../controllers/sesion_index_usuario.php";
require "../controllers/ver_carrito.php";

// Para confirmar hay que estar logueado.
if (!$usuario_logueado) {
    header("Location: login.php");
    exit;
}

// Y el carrito no puede estar vacio.
if (count($lineas) == 0) {
    header("Location: carrito.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Confirmar pedido en Tienda Zapatillas Deportivas.">
  <title>Confirmar pedido | Tienda Zapatillas Deportivas</title>
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
        <a class="menu-enlace" href="carrito.php">Carrito</a>
        <span class="menu-usuario">Hola, <?= $nombre_user ?></span>
        <a class="menu-enlace" href="../controllers/logout_usuario.php">Cerrar sesión</a>
      </nav>
    </div>
  </header>

  <main id="contenido" class="principal">
    <div class="panel-cabecera">
      <p class="subtitulo">Último paso</p>
      <h1>Confirmar pedido</h1>
    </div>

    <div class="checkout">
      <div class="checkout-resumen">
        <h2>Resumen</h2>
        <ul class="checkout-lista">
          <?php foreach ($lineas as $linea): ?>
            <li>
              <span><?= $linea["cantidad"] ?> × <?= $linea["nombre"] ?> (<?= $linea["talla"] ?>)</span>
              <strong><?= number_format($linea["subtotal"], 2, ",", ".") ?> &euro;</strong>
            </li>
          <?php endforeach; ?>
        </ul>

        <p class="carrito-total">
          Total: <strong><?= number_format($total, 2, ",", ".") ?> &euro;</strong>
        </p>
      </div>

      <form class="checkout-formulario formulario" action="../controllers/confirmar_pedido.php" method="post">
        <div class="campo">
          <label for="direccion">Dirección de envío</label>
          <input class="entrada" type="text" id="direccion" name="direccion"
                 placeholder="Calle, número, piso, ciudad" required>
        </div>

        <div class="botones">
          <a class="boton boton-secundario" href="carrito.php">Volver al carrito</a>
          <button class="boton boton-principal" type="submit">Confirmar pedido</button>
        </div>
      </form>
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
