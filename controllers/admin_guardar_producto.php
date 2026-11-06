<?php
// Guarda un producto: crea uno nuevo o actualiza el existente.
require "comprobar_admin.php";
require "../models/conexion.php";

// Si no llega el formulario, volvemos al listado.
if (!isset($_POST["nombre"])) {
    header("Location: ../views/admin_productos.php");
    exit;
}

$id = (int) ($_POST["id"] ?? 0);
$id_categoria = (int) $_POST["id_categoria"];
$precio = (float) $_POST["precio"];

// Limpiamos los textos antes de meterlos en la consulta.
$nombre = mysqli_real_escape_string($link, $_POST["nombre"]);
$marca = mysqli_real_escape_string($link, $_POST["marca"]);
$descripcion = mysqli_real_escape_string($link, $_POST["descripcion"]);
$imagen = mysqli_real_escape_string($link, $_POST["imagen"]);

// El checkbox solo llega si esta marcado.
$activo = isset($_POST["activo"]) ? 1 : 0;

if ($id > 0) {
    // Actualizar un producto existente.
    $sql = "UPDATE producto SET
                id_categoria = $id_categoria,
                nombre = '$nombre',
                marca = '$marca',
                descripcion = '$descripcion',
                precio = $precio,
                imagen = '$imagen',
                activo = $activo
            WHERE id_producto = $id";
} else {
    // Crear un producto nuevo.
    $sql = "INSERT INTO producto (id_categoria, nombre, marca, descripcion, precio, imagen, activo)
            VALUES ($id_categoria, '$nombre', '$marca', '$descripcion', $precio, '$imagen', $activo)";
}

mysqli_query($link, $sql);

header("Location: ../views/admin_productos.php");
exit;
