<?php
// Activa o desactiva un producto. No lo borra de la base de datos.
require "comprobar_admin.php";
require "../models/conexion.php";

$id = (int) ($_GET["id"] ?? 0);

if ($id > 0) {
    // Si estaba activo (1) pasa a inactivo (0), y al reves.
    $sql = "UPDATE producto SET activo = 1 - activo WHERE id_producto = $id";
    mysqli_query($link, $sql);
}

header("Location: ../views/admin_productos.php");
exit;
