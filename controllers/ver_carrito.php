<?php
// Prepara las lineas del carrito con los datos actuales de cada producto.
require "../models/conexion.php";

$lineas = [];
$total = 0;

if (isset($_SESSION["carrito"])) {
    foreach ($_SESSION["carrito"] as $item) {
        $id = (int) $item["id_producto"];

        $sql = "SELECT id_producto, nombre, marca, precio, imagen FROM producto WHERE id_producto = $id";
        $resultado = mysqli_query($link, $sql);
        $producto = mysqli_fetch_assoc($resultado);

        if ($producto) {
            $producto["talla"] = $item["talla"];
            $producto["cantidad"] = $item["cantidad"];
            $producto["subtotal"] = $producto["precio"] * $item["cantidad"];

            $lineas[] = $producto;
            $total = $total + $producto["subtotal"];
        }
    }
}
