<?php
// Prepara los datos del formulario de producto: categorias y, si toca, el producto a editar.
require "../models/conexion.php";

// Categorias para el desplegable.
$sql = "SELECT id_categoria, nombre FROM categoria ORDER BY nombre";
$resultado = mysqli_query($link, $sql);
$categorias = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

// Si llega un id por la URL, cargamos ese producto.
$producto_editar = null;
$id = $_GET["id"] ?? 0;
$id = (int) $id;

if ($id > 0) {
    $sql = "SELECT * FROM producto WHERE id_producto = $id";
    $resultado = mysqli_query($link, $sql);
    $producto_editar = mysqli_fetch_assoc($resultado);
}
