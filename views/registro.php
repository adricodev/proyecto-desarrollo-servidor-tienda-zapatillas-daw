<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Crea tu cuenta en Tienda Zapatillas Deportivas y accede a las mejores marcas.">
  <title>Crear cuenta</title>
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
        <a class="menu-enlace" href="registro.php" aria-current="page">Registro</a>
        <a class="menu-enlace" href="login.php">Iniciar sesión</a>
      </nav>
    </div>
  </header>

  <main id="contenido" class="principal">
    <section class="tarjeta" aria-labelledby="titulo-registro">
      <p class="subtitulo">Únete a la comunidad</p>
      <h1 id="titulo-registro">Crea tu cuenta</h1>
      <p class="texto-intro">
        Rellena tus datos para gestionar tus pedidos y descubrir las últimas zapatillas deportivas.
      </p>

  <form class="formulario" action="../controllers/registro_usuario.php" method="post">
        <div class="campo">
          <label for="nombre">Nombre</label>
          <input class="entrada" type="text" id="nombre" name="nombre"
                 placeholder="Nombre" autocomplete="given-name" maxlength="50" required>
        </div>

        <div class="campo">
          <label for="apellidos">Apellidos</label>
          <input class="entrada" type="text" id="apellidos" name="apellidos"
                 placeholder="Apellidos" autocomplete="family-name" maxlength="80" required>
        </div>

        <div class="campo">
          <label for="email">Correo electrónico</label>
          <input class="entrada" type="email" id="email" name="email"
                 placeholder="tu@correo.com" autocomplete="email" maxlength="100" required>
        </div>

        <div class="campo">
          <label for="password">Contraseña</label>
          <input class="entrada" type="password" id="password" name="password"
                 placeholder="Mínimo 8 caracteres" autocomplete="new-password"
                 minlength="8" required>
        </div>

        <div class="campo">
          <label for="telefono">Teléfono</label>
          <input class="entrada" type="tel" id="telefono" name="telefono"
                 placeholder="666111555" autocomplete="tel" inputmode="numeric"
                 pattern="[0-9]{9}" maxlength="9" required>
        </div>

        <div class="campo">
          <label for="direccion">Dirección</label>
          <textarea class="entrada" id="direccion" name="direccion" rows="3"
                    placeholder="Calle, número, piso, código postal y ciudad"
                    autocomplete="street-address" maxlength="150" required></textarea>
        </div>

        <div class="botones">
          <button class="boton boton-principal" type="submit">Enviar</button>
          <button class="boton boton-secundario" type="reset">Limpiar</button>
        </div>
      </form>

      <p class="pie-tarjeta">
        ¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a>
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
