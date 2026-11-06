<?php
// Prepara los datos del formulario de usuario. Si llega un id, carga ese usuario.
require "../models/conexion.php";

$usuario_editar = null;
$id = $_GET["id"] ?? 0;
$id = (int) $id;

if ($id > 0) {
    $sql = "SELECT * FROM usuario WHERE id_usuario = $id";
    $resultado = mysqli_query($link, $sql);
    $usuario_editar = mysqli_fetch_assoc($resultado);
}
