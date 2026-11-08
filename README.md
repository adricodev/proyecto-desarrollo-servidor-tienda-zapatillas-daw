# Tienda de Zapatillas Deportivas

Proyecto final del ciclo de **Desarrollo de Aplicaciones Web**. Tienda online de zapatillas
deportivas hecha con **PHP y MySQL**, sin frameworks ni librerías externas.

La aplicación tiene dos zonas: una tienda pública donde el cliente consulta el catálogo, añade
productos al carrito y confirma pedidos, y un panel de administración protegido desde el que se
gestionan usuarios y productos.

**Web en producción:** https://deportivas-davante.gt.tc/

---

## Funcionalidades

### RF01 · Gestión de usuarios (administrador)

- Listado de todos los usuarios con su rol y su estado.
- Alta de usuarios indicando nombre, email, contraseña y rol.
- Edición de los datos de un usuario.
- Baja lógica: el usuario no se borra de la base de datos, se marca como inactivo
  (`UPDATE usuario SET activo = 1 - activo`), de modo que no puede iniciar sesión pero se
  conserva el histórico de sus pedidos.
- Reactivación de un usuario dado de baja.

### RF02 · Gestión de productos (administrador)

- Listado de productos con categoría, precio y stock.
- Alta de productos con nombre, marca, categoría, descripción, precio e imagen.
- Asignación de tallas y stock por talla (tabla `producto_talla`).
- Edición de cualquier campo del producto.
- Baja lógica mediante el campo `activo`: el producto desaparece del catálogo pero sus pedidos
  anteriores siguen siendo válidos.

### RF03 · Catálogo, carrito y compra (cliente)

- Catálogo público con los productos activos.
- Buscador en tiempo real que filtra las tarjetas por nombre o marca.
- Ficha de producto con descripción, tallas disponibles y stock real.
- Carrito guardado en sesión, con una línea por combinación de producto y talla.
- Modificación de cantidades y vaciado del carrito.
- Checkout con los datos de envío y confirmación del pedido.
- Al confirmar, se crea el pedido, se guardan sus líneas y se descuenta el stock.
- Página de pedido confirmado con el número de pedido.

### Acceso

- Registro de nuevos clientes.
- Inicio de sesión con redirección según el rol.
- Cierre de sesión.
- El panel de administración está protegido: si no hay sesión de administrador, redirige al login.

---

## Tecnologías

| Capa | Tecnología |
|---|---|
| Presentación | HTML5, CSS3 y JavaScript (sin frameworks) |
| Lógica | PHP 8 con MySQLi |
| Datos | MySQL / MariaDB |
| Servidor local | XAMPP (Apache + PHP + MySQL) |

El JavaScript se usa para tres mejoras puntuales, todas opcionales: confirmar antes de ejecutar
acciones destructivas, evitar que un pedido se envíe dos veces y filtrar el catálogo. Si el
navegador no ejecuta JavaScript, la aplicación sigue funcionando igual.

---

## Estructura del proyecto

```
tienda_zapatillas_deportivas/
├── index.php               Punto de entrada: carga el catálogo
├── controllers/            Lógica de la aplicación (19 archivos)
│   ├── listar_productos.php
│   ├── detalle_producto.php
│   ├── carrito_agregar.php
│   ├── ver_carrito.php
│   ├── carrito_vaciar.php
│   ├── confirmar_pedido.php
│   ├── registro_usuario.php
│   ├── login_usuario.php
│   ├── logout_usuario.php
│   ├── sesion_index_usuario.php
│   ├── comprobar_admin.php
│   ├── admin_listar_usuarios.php
│   ├── admin_form_usuario.php
│   ├── admin_guardar_usuario.php
│   ├── admin_borrar_usuario.php
│   ├── admin_listar_productos.php
│   ├── admin_form_producto.php
│   ├── admin_guardar_producto.php
│   └── admin_borrar_producto.php
├── models/
│   └── conexion.php        Conexión a la base de datos
├── views/                  Plantillas HTML (11 archivos)
│   ├── admin_panel.php
│   ├── admin_usuarios.php
│   ├── admin_productos.php
│   ├── carrito.php
│   ├── checkout.php
│   ├── pedido_confirmado.php
│   ├── producto.php
│   ├── login.php
│   └── registro.php
├── public/
│   ├── css/styles.css
│   ├── js/main.js
│   └── img/productos/      8 imágenes de producto
└── database/
    ├── estructura.sql      Creación de las 6 tablas
    └── datos_iniciales.sql Categorías, productos y tallas de ejemplo
```

La aplicación sigue una **arquitectura de tres capas**: las vistas solo muestran HTML, los
controladores contienen la lógica y las consultas, y `models/conexion.php` es el único punto de
acceso a la base de datos.

---

## Puesta en marcha

### 1. Requisitos

- XAMPP (o cualquier Apache + PHP 8 + MySQL)
- Un navegador actual

### 2. Copiar el proyecto

Descarga o clona el repositorio dentro de `htdocs`:

```
C:\xampp\htdocs\tienda_zapatillas_deportivas
```

### 3. Crear la base de datos

Abre phpMyAdmin (`http://localhost/phpmyadmin`) y crea una base de datos vacía:

```
Nombre:      tienda_zapatillas
Cotejamiento: utf8mb4_general_ci
```

Selecciónala y ejecuta los dos scripts en este orden:

1. **Importar → `database/estructura.sql`** → crea las 6 tablas.
2. **Importar → `database/datos_iniciales.sql`** → carga 3 categorías, 8 productos y 24 tallas.

También puedes hacerlo desde la pestaña **SQL** pegando el contenido de cada archivo.

### 4. Configurar la conexión

Edita `models/conexion.php` con los datos de tu servidor local:

```php
$servidor = "localhost";
$user_bd = "root";
$password_bd = "";
```

Y el nombre de la base de datos, en la línea del `mysqli_select_db`.

Si usas XAMPP con la configuración por defecto, ya viene así.

### 5. Crear el primer administrador

El script de datos iniciales **no incluye usuarios** para no publicar contraseñas. Registra una
cuenta desde la web:

```
http://localhost/tienda_zapatillas_deportivas/views/registro.php
```

Y conviértela en administrador desde phpMyAdmin:

```sql
UPDATE usuario SET rol = 'administrador' WHERE email = 'tu@email.com';
```

A partir de ahí ya puedes entrar en el panel y crear el resto de usuarios desde la aplicación.

### 6. Abrir la tienda

```
http://localhost/tienda_zapatillas_deportivas/
```

---

## Base de datos

Seis tablas con relaciones en cascada:

```
categoria (1) ──< producto (1) ──< producto_talla
                       │
                       └──< linea_pedido >── (1) pedido >── (1) usuario
```

| Tabla | Contenido |
|---|---|
| `usuario` | Clientes y administradores, con rol y estado |
| `categoria` | Running, Casual, Trail |
| `producto` | Datos del producto y marca |
| `producto_talla` | Stock disponible de cada talla |
| `pedido` | Cabecera del pedido: usuario, fecha, total, estado |
| `linea_pedido` | Productos, tallas y cantidades de cada pedido |

Los borrados de usuarios y productos son **lógicos** (`activo = 0`) para no romper el histórico
de pedidos. Las claves ajenas están definidas con `ON DELETE RESTRICT`, así que la propia base de
datos impide borrar un producto o un usuario que ya tenga pedidos asociados.

---

## Decisiones técnicas

- **Rutas relativas.** Los `require` usan rutas como `../controllers/...` en lugar de `__DIR__`,
  de modo que el proyecto funciona igual en local y en un hosting con subcarpeta.
- **`index.php` como punto de entrada.** Solo incluye el controlador del catálogo; no contiene
  lógica ni HTML.
- **Carrito en sesión.** Se guarda en `$_SESSION["carrito"]` con la clave `id_producto-talla`,
  así no hace falta una tabla temporal y el carrito se mantiene entre páginas.
- **Precios.** Se formatean con `number_format($precio, 2, ",", ".")` para mostrar coma decimal.
- **Baja lógica.** Se alterna con `UPDATE ... SET activo = 1 - activo`, sin borrar filas.

---

## Limitaciones conocidas

El proyecto está hecho con fines académicos y hay decisiones que en producción habría que cambiar:

- **Las contraseñas se guardan en texto plano.** Lo correcto sería `password_hash()` al
  registrarse y `password_verify()` al iniciar sesión.
- **No se escapa la salida con `htmlspecialchars()`.** Todo el contenido viene de la propia base
  de datos, pero si se permitiera a los usuarios escribir texto libre habría que escaparlo para
  evitar XSS.
- **El stock se comprueba antes de confirmar, pero fuera de una transacción.** Dos compras
  simultáneas del último par podrían dejar el stock en negativo; la solución sería una
  transacción con `SELECT ... FOR UPDATE`.
- **No hay pasarela de pago.** El checkout solo recoge los datos de envío.
- **No hay recuperación de contraseña.** El hosting gratuito no permite enviar correo.

---

## Documentación

- [Modelo entidad-relación](docs/diagrama-er.pdf)

---

## Autor

Adrián Pineda Torrejón
Proyecto académico del ciclo de Desarrollo de Aplicaciones Web.
