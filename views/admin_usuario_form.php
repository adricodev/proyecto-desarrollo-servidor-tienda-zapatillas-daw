<?php
// Formulario para crear o editar un usuario.
require "../controllers/comprobar_admin.php";
require "../controllers/admin_form_usuario.php";

$es_edicion = $usuario_editar != null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Formulario de usuario del panel de administración.">
  <title><?= $es_edicion ? "Editar usuario" : "Nuevo usuario" ?> | Panel de administración</title>
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
        <a class="menu-enlace" href="admin_usuarios.php">Usuarios</a>
        <span class="menu-usuario">Hola, <?= $_SESSION["nombre"] ?></span>
        <a class="menu-enlace" href="../controllers/logout_usuario.php">Cerrar sesión</a>
      </nav>
    </div>
  </header>

  <main id="contenido" class="principal">
    <div class="panel-cabecera">
      <p class="subtitulo">Administración</p>
      <h1><?= $es_edicion ? "Editar usuario" : "Nuevo usuario" ?></h1>
    </div>

    <?php if (isset($_GET["error"]) && $_GET["error"] == "email"): ?>
      <p class="mensaje-error">Ese email ya está registrado en otro usuario.</p>
    <?php endif; ?>

    <form class="tarjeta formulario" action="../controllers/admin_guardar_usuario.php" method="post">
      <input type="hidden" name="id" value="<?= $es_edicion ? $usuario_editar["id_usuario"] : 0 ?>">

      <div class="campo">
        <label for="nombre">Nombre</label>
        <input class="entrada" type="text" id="nombre" name="nombre" required
               value="<?= $es_edicion ? $usuario_editar["nombre"] : "" ?>">
      </div>

      <div class="campo">
        <label for="apellidos">Apellidos</label>
        <input class="entrada" type="text" id="apellidos" name="apellidos"
               value="<?= $es_edicion ? $usuario_editar["apellidos"] : "" ?>">
      </div>

      <div class="campo">
        <label for="email">Email</label>
        <input class="entrada" type="email" id="email" name="email" required
               value="<?= $es_edicion ? $usuario_editar["email"] : "" ?>">
      </div>

      <div class="campo">
        <label for="password">Contraseña</label>
        <input class="entrada" type="text" id="password" name="password"
               <?= $es_edicion ? "" : "required" ?>
               placeholder="<?= $es_edicion ? "Dejar vacío para mantener la actual" : "" ?>">
      </div>

      <div class="campo">
        <label for="telefono">Teléfono</label>
        <input class="entrada" type="text" id="telefono" name="telefono"
               value="<?= $es_edicion ? $usuario_editar["telefono"] : "" ?>">
      </div>

      <div class="campo">
        <label for="direccion">Dirección</label>
        <input class="entrada" type="text" id="direccion" name="direccion"
               value="<?= $es_edicion ? $usuario_editar["direccion"] : "" ?>">
      </div>

      <div class="campo">
        <label for="rol">Rol</label>
        <select class="entrada" id="rol" name="rol" required>
          <option value="cliente"
            <?= $es_edicion && $usuario_editar["rol"] == "cliente" ? "selected" : "" ?>>
            Cliente
          </option>
          <option value="administrador"
            <?= $es_edicion && $usuario_editar["rol"] == "administrador" ? "selected" : "" ?>>
            Administrador
          </option>
        </select>
      </div>

      <div class="campo campo-check">
        <label for="activo">
          <input type="checkbox" id="activo" name="activo"
            <?= (!$es_edicion || $usuario_editar["activo"] == 1) ? "checked" : "" ?>>
          Usuario activo (puede iniciar sesión)
        </label>
      </div>

      <div class="botones">
        <a class="boton boton-secundario" href="admin_usuarios.php">Cancelar</a>
        <button class="boton boton-principal" type="submit">Guardar</button>
      </div>
    </form>
  </main>

  <footer class="pie-pagina">
    <div class="pie-contenido">
      <span>&copy; 2026 Tienda Zapatillas Deportivas. Todos los derechos reservados.</span>
      <a href="admin_usuarios.php">Volver a usuarios</a>
    </div>
  </footer>
</body>
</html>
