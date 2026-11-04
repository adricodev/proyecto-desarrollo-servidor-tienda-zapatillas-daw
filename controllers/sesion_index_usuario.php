<?php
session_start();

$usuario_logueado = isset($_SESSION["id_usuario"]);
$nombre_user = $_SESSION["nombre"] ?? "";//Si isset tiene nombre, ?? hace que lo ponga.