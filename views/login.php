<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Inicia sesión en Tienda Zapatillas Deportivas.">
  <title>Iniciar sesión</title>
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

      <nav class="menu">
        <a class="menu-enlace" href="../index.php">Inicio</a>
        <a class="menu-enlace" href="registro.php">Registro</a>
        <a class="menu-enlace" href="login.php" aria-current="page">Iniciar sesión</a>
      </nav>
    </div>
  </header>

  <main id="contenido" class="principal">
    <section class="tarjeta" aria-labelledby="titulo-login">
      <p class="subtitulo">Bienvenido de nuevo</p>
      <h1 id="titulo-login">Inicia sesión</h1>
      <p class="texto-intro">
        Accede a tu cuenta para gestionar tus pedidos.
      </p>

      <?php if (isset($_GET["error"])): ?>
        <p class="mensaje-error" role="alert">Correo o contraseña incorrectos.</p>
      <?php endif; ?>

      <form class="formulario" action="../controllers/login_usuario.php" method="post">
        <div class="campo">
          <label for="email">Correo electrónico</label>
          <input class="entrada" type="email" id="email" name="email"
                 placeholder="tu@correo.com" autocomplete="email" maxlength="100" required>
        </div>

        <div class="campo">
          <label for="password">Contraseña</label>
          <input class="entrada" type="password" id="password" name="password"
                 placeholder="Contraseña" autocomplete="current-password" required>
        </div>

        <div class="botones">
          <button class="boton boton-principal" type="submit">Entrar</button>
          <button class="boton boton-secundario" type="reset">Limpiar</button>
        </div>
      </form>

      <p class="pie-tarjeta">
        ¿No tienes cuenta? <a href="registro.php">Regístrate</a>
      </p>
    </section>
  </main>

  <footer class="pie-pagina">
    <div class="pie-contenido">
      <span>&copy; 2026 Tienda Zapatillas Deportivas. Todos los derechos reservados.</span>
      <a href="../index.php">Volver al inicio</a>
    </div>
  </footer>
</body>
</html>
