<?php
session_start();

$usuario_logueado = isset($_SESSION["id_usuario"]);
$nombre_user = $_SESSION["nombre"] ?? "";//Si isset tiene nombre, ?? hace que lo ponga.
//Si existe rol, y ese rol es administrador se accede al panel.
$es_admin = isset($_SESSION["rol"]) && $_SESSION["rol"] === "administrador";