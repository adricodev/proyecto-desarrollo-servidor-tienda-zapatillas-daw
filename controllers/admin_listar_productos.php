<?php
// Lista todos los productos para el panel, activos e inactivos.
require "../models/conexion.php";

$sql = "SELECT p.*, c.nombre AS categoria
        FROM producto p
        INNER JOIN categoria c ON p.id_categoria = c.id_categoria
        ORDER BY p.id_producto";

$resultado = mysqli_query($link, $sql);
$productos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
