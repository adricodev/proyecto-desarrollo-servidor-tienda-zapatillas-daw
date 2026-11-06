<?php
// Panel de usuarios: listado y acciones.
require "../controllers/comprobar_admin.php";
require "../controllers/admin_listar_usuarios.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Gestión de usuarios de la tienda.">
  <title>Usuarios | Panel de administración</title>
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
        <a class="menu-enlace" href="admin_usuarios.php" aria-current="page">Usuarios</a>
        <span class="menu-usuario">Hola, <?= $_SESSION["nombre"] ?></span>
        <a class="menu-enlace" href="../controllers/logout_usuario.php">Cerrar sesión</a>
      </nav>
    </div>
  </header>

  <main id="contenido" class="principal">
    <div class="panel-cabecera">
      <p class="subtitulo">Administración</p>
      <h1>Usuarios</h1>
      <p class="texto-intro">Crea, edita o desactiva las cuentas de clientes y administradores.</p>
    </div>

    <p class="admin-acciones">
      <a class="boton boton-principal" href="admin_usuario_form.php">Nuevo usuario</a>
    </p>

    <div class="tabla-contenedor">
      <table class="tabla-admin">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Rol</th>
            <th scope="col">Estado</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($usuarios as $usuario): ?>
            <tr>
              <td><?= $usuario["id_usuario"] ?></td>
              <td><?= $usuario["nombre"] ?> <?= $usuario["apellidos"] ?></td>
              <td><?= $usuario["email"] ?></td>
              <td>
                <?php if ($usuario["rol"] == "administrador"): ?>
                  <span class="etiqueta etiqueta-admin">Administrador</span>
                <?php else: ?>
                  <span class="etiqueta etiqueta-cliente">Cliente</span>
                <?php endif; ?>
              </td>
              <td>
                <?php if ($usuario["activo"] == 1): ?>
                  <span class="etiqueta etiqueta-activo">Activo</span>
                <?php else: ?>
                  <span class="etiqueta etiqueta-inactivo">Inactivo</span>
                <?php endif; ?>
              </td>
              <td class="admin-botones">
                <a class="boton boton-secundario" href="admin_usuario_form.php?id=<?= $usuario["id_usuario"] ?>">Editar</a>

                <?php if ($usuario["id_usuario"] != $_SESSION["id_usuario"]): ?>
                  <?php if ($usuario["activo"] == 1): ?>
                    <a class="boton boton-secundario" href="../controllers/admin_borrar_usuario.php?id=<?= $usuario["id_usuario"] ?>">Desactivar</a>
                  <?php else: ?>
                    <a class="boton boton-secundario" href="../controllers/admin_borrar_usuario.php?id=<?= $usuario["id_usuario"] ?>">Activar</a>
                  <?php endif; ?>
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
</body>
</html>
