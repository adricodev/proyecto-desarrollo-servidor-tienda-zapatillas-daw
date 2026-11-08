<?php
// Cargamos la sesion para el menu y los datos del carrito.
require "../controllers/sesion_index_usuario.php";
require "../controllers/ver_carrito.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Carrito de la compra de Tienda Zapatillas Deportivas.">
  <title>Carrito | Tienda Zapatillas Deportivas</title>
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
    <div class="panel-cabecera">
      <p class="subtitulo">Tu compra</p>
      <h1>Carrito</h1>
    </div>

    <?php if (isset($_GET["error"]) && $_GET["error"] === "stock"): ?>
      <p class="mensaje-error" role="alert">
        No hay stock suficiente de alguno de los productos. Revisa las cantidades.
      </p>
    <?php endif; ?>

    <?php if (count($lineas) == 0): ?>
      <p class="estado-vacio">
        Tu carrito está vacío.
        <a href="../index.php#productos">Ver productos</a>
      </p>
    <?php else: ?>
      <div class="carrito">
        <div class="carrito-tabla-contenedor">
          <table class="carrito-tabla">
            <thead>
              <tr>
                <th scope="col">Producto</th>
                <th scope="col">Talla</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th scope="col">Subtotal</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($lineas as $linea): ?>
                <tr>
                  <td>
                    <div class="carrito-producto">
                      <img src="../<?= $linea["imagen"] ?>" alt="<?= $linea["nombre"] ?>">
                      <div>
                        <strong><?= $linea["nombre"] ?></strong>
                        <span><?= $linea["marca"] ?></span>
                      </div>
                    </div>
                  </td>
                  <td><?= $linea["talla"] ?></td>
                  <td><?= $linea["cantidad"] ?></td>
                  <td><?= number_format($linea["precio"], 2, ",", ".") ?> &euro;</td>
                  <td><?= number_format($linea["subtotal"], 2, ",", ".") ?> &euro;</td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

        <div class="carrito-resumen">
          <p class="carrito-total">
            Total: <strong><?= number_format($total, 2, ",", ".") ?> &euro;</strong>
          </p>

          <div class="carrito-acciones">
            <a class="boton boton-secundario" href="../index.php#productos">Seguir comprando</a>
            <a class="boton boton-secundario" href="../controllers/carrito_vaciar.php"
               data-confirmar="¿Seguro que quieres vaciar el carrito?">Vaciar carrito</a>
            <a class="boton boton-principal" href="checkout.php">Confirmar pedido</a>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </main>

  <footer class="pie-pagina">
    <div class="pie-contenido">
      <span>&copy; 2026 Tienda Zapatillas Deportivas. Todos los derechos reservados.</span>
      <a href="../index.php">Volver a la tienda</a>
    </div>
  </footer>

  <script src="../public/js/main.js"></script>
</body>
</html>
