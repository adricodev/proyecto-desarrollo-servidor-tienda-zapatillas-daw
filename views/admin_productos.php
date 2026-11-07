<?php
// Panel de productos: listado y acciones.
require "../controllers/comprobar_admin.php";
require "../controllers/admin_listar_productos.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Gestión de productos de la tienda.">
  <title>Productos | Panel de administración</title>
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
        <a class="menu-enlace" href="admin_panel.php">Panel</a>
        <a class="menu-enlace" href="admin_productos.php" aria-current="page">Productos</a>
        <span class="menu-usuario">Hola, <?= $_SESSION["nombre"] ?></span>
        <a class="menu-enlace" href="../controllers/logout_usuario.php">Cerrar sesión</a>
      </nav>
    </div>
  </header>

  <main id="contenido" class="principal">
    <div class="panel-cabecera">
      <p class="subtitulo">Administración</p>
      <h1>Productos</h1>
      <p class="texto-intro">Crea, edita o desactiva los artículos de la tienda.</p>
    </div>

    <p class="admin-acciones">
      <a class="boton boton-principal" href="admin_producto_form.php">Nuevo producto</a>
    </p>

    <div class="tabla-contenedor">
      <table class="tabla-admin">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Marca</th>
            <th scope="col">Categoría</th>
            <th scope="col">Precio</th>
            <th scope="col">Estado</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($productos as $producto): ?>
            <tr>
              <td><?= $producto["id_producto"] ?></td>
              <td><?= $producto["nombre"] ?></td>
              <td><?= $producto["marca"] ?></td>
              <td><?= $producto["categoria"] ?></td>
              <td><?= number_format($producto["precio"], 2, ",", ".") ?> &euro;</td>
              <td>
                <?php if ($producto["activo"] == 1): ?>
                  <span class="etiqueta etiqueta-activo">Activo</span>
                <?php else: ?>
                  <span class="etiqueta etiqueta-inactivo">Inactivo</span>
                <?php endif; ?>
              </td>
              <td class="admin-botones">
                <a class="boton boton-secundario" href="admin_producto_form.php?id=<?= $producto["id_producto"] ?>">Editar</a>
                <?php if ($producto["activo"] == 1): ?>
                  <a class="boton boton-secundario" href="../controllers/admin_borrar_producto.php?id=<?= $producto["id_producto"] ?>"
                     data-confirmar="¿Seguro que quieres desactivar este producto?">Desactivar</a>
                <?php else: ?>
                  <a class="boton boton-secundario" href="../controllers/admin_borrar_producto.php?id=<?= $producto["id_producto"] ?>"
                     data-confirmar="¿Seguro que quieres activar este producto?">Activar</a>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </main>

  <footer class="pie-pagina">
    <div class="pie-contenido">
      <span>&copy; 2026 Tienda Zapatillas Deportivas. Todos los derechos reservados.</span>
      <a href="admin_panel.php">Volver al panel</a>
    </div>
  </footer>

  <script src="../public/js/main.js"></script>
</body>
</html>
