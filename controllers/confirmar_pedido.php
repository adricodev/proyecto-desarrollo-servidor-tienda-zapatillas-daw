<?php
session_start();

// Reutilizamos el controlador del carrito: ya prepara $lineas, $total y $link.
require "ver_carrito.php";

// Solo pueden confirmar los usuarios logueados.
if (!isset($_SESSION["id_usuario"])) {
    header("Location: ../views/login.php");
    exit;
}

// Solo por POST y con algo en el carrito.
if (!isset($_POST["direccion"]) || count($lineas) == 0) {
    header("Location: ../views/carrito.php");
    exit;
}

$id_usuario = (int) $_SESSION["id_usuario"];

// Limpiamos la direccion para que no rompa la consulta.
$direccion = mysqli_real_escape_string($link, $_POST["direccion"]);

// 1. Comprobamos que hay stock de cada linea antes de crear el pedido.
foreach ($lineas as $linea) {
    $id_producto = (int) $linea["id_producto"];
    $cantidad = (int) $linea["cantidad"];
    $talla = mysqli_real_escape_string($link, $linea["talla"]);

    $sql = "SELECT stock FROM producto_talla
            WHERE id_producto = $id_producto AND talla = '$talla'";
    $resultado = mysqli_query($link, $sql);
    $fila = mysqli_fetch_assoc($resultado);

    // Si no hay talla o no queda stock suficiente, volvemos al carrito.
    if (!$fila || $fila["stock"] < $cantidad) {
        header("Location: ../views/carrito.php?error=stock");
        exit;
    }
}

// 2. Creamos el pedido.
$sql = "INSERT INTO pedido (id_usuario, total, direccion_envio)
        VALUES ($id_usuario, $total, '$direccion')";
mysqli_query($link, $sql);

// 3. Recogemos el id del pedido que acaba de crear MySQL.
$id_pedido = mysqli_insert_id($link);

// 4. Guardamos cada linea y descontamos el stock.
foreach ($lineas as $linea) {
    $id_producto = (int) $linea["id_producto"];
    $cantidad = (int) $linea["cantidad"];
    $talla = mysqli_real_escape_string($link, $linea["talla"]);
    $precio = $linea["precio"];

    $sql = "INSERT INTO linea_pedido (id_pedido, id_producto, talla, cantidad, precio_unitario)
            VALUES ($id_pedido, $id_producto, '$talla', $cantidad, $precio)";
    mysqli_query($link, $sql);

    $sql = "UPDATE producto_talla SET stock = stock - $cantidad
            WHERE id_producto = $id_producto AND talla = '$talla'";
    mysqli_query($link, $sql);
}

// 5. Vaciamos el carrito.
unset($_SESSION["carrito"]);

// 6. Vamos a la pagina de confirmacion.
header("Location: ../views/pedido_confirmado.php?id=$id_pedido");
exit;
