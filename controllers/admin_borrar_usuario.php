<?php
// Activa o desactiva un usuario. No lo borra de la base de datos.
require "comprobar_admin.php";
require "../models/conexion.php";

$id = (int) ($_GET["id"] ?? 0);

// No permitimos que el administrador se desactive a si mismo.
if ($id > 0 && $id != $_SESSION["id_usuario"]) {
    // Si estaba activo (1) pasa a inactivo (0), y al reves.
    $sql = "UPDATE usuario SET activo = 1 - activo WHERE id_usuario = $id";
    mysqli_query($link, $sql);
}

header("Location: ../views/admin_usuarios.php");
exit;
