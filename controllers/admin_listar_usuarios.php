<?php
// Lista todos los usuarios para el panel.
require "../models/conexion.php";

$sql = "SELECT id_usuario, nombre, apellidos, email, rol, activo
        FROM usuario
        ORDER BY id_usuario";

$resultado = mysqli_query($link, $sql);
$usuarios = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
