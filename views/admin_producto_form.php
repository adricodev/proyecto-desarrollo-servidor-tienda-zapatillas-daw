<?php
// Formulario para crear o editar un producto.
require "../controllers/comprobar_admin.php";
require "../controllers/admin_form_producto.php";

$es_edicion = $producto_editar != null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Formulario de producto del panel de administración.">
  <title><?= $es_edicion ? "Editar producto" : "Nuevo producto" ?> | Panel de administración</title>
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
        <a class="menu-enlace" href="admin_productos.php">Productos</a>
        <span class="menu-usuario">Hola, <?= $_SESSION["nombre"] ?></span>
        <a class="menu-enlace" href="../controllers/logout_usuario.php">Cerrar sesión</a>
      </nav>
    </div>
  </header>

  <main id="contenido" class="principal">
    <div class="panel-cabecera">
      <p class="subtitulo">Administración</p>
      <h1><?= $es_edicion ? "Editar producto" : "Nuevo producto" ?></h1>
    </div>

    <form class="tarjeta formulario" action="../controllers/admin_guardar_producto.php" method="post">
      <input type="hidden" name="id" value="<?= $es_edicion ? $producto_editar["id_producto"] : 0 ?>">

      <div class="campo">
        <label for="nombre">Nombre</label>
        <input class="entrada" type="text" id="nombre" name="nombre" required
               value="<?= $es_edicion ? $producto_editar["nombre"] : "" ?>">
      </div>

      <div class="campo">
        <label for="marca">Marca</label>
        <input class="entrada" type="text" id="marca" name="marca" required
               value="<?= $es_edicion ? $producto_editar["marca"] : "" ?>">
      </div>

      <div class="campo">
        <label for="id_categoria">Categoría</label>
        <select class="entrada" id="id_categoria" name="id_categoria" required>
          <?php foreach ($categorias as $categoria): ?>
            <option value="<?= $categoria["id_categoria"] ?>"
              <?= $es_edicion && $producto_editar["id_categoria"] == $categoria["id_categoria"] ? "selected" : "" ?>>
              <?= $categoria["nombre"] ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="campo">
        <label for="precio">Precio (€)</label>
        <input class="entrada" type="number" id="precio" name="precio" step="0.01" min="0" required
               value="<?= $es_edicion ? $producto_editar["precio"] : "" ?>">
      </div>

      <div class="campo">
        <label for="descripcion">Descripción</label>
        <textarea class="entrada" id="descripcion" name="descripcion" rows="4"><?= $es_edicion ? $producto_editar["descripcion"] : "" ?></textarea>
      </div>

      <div class="campo">
        <label for="imagen">Imagen (ruta)</label>
        <input class="entrada" type="text" id="imagen" name="imagen"
               placeholder="public/img/productos/archivo.jpg"
               value="<?= $es_edicion ? $producto_editar["imagen"] : "" ?>">
      </div>

      <div class="campo campo-check">
        <label for="activo">
          <input type="checkbox" id="activo" name="activo"
            <?= (!$es_edicion || $producto_editar["activo"] == 1) ? "checked" : "" ?>>
          Producto activo (visible en la tienda)
        </label>
      </div>

      <div class="botones">
        <a class="boton boton-secundario" href="admin_productos.php">Cancelar</a>
        <button class="boton boton-principal" type="submit">Guardar</button>
      </div>
    </form>
  </main>

  <footer class="pie-pagina">
    <div class="pie-contenido">
      <span>&copy; 2026 Tienda Zapatillas Deportivas. Todos los derechos reservados.</span>
      <a href="admin_productos.php">Volver a productos</a>
    </div>
  </footer>
</body>
</html>
