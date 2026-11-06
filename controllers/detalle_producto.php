<?php
//Cargar un producto concreto con sus tallas.
require "../models/conexion.php";

//Recogemos el id de la url con get
$id = $_GET["id"] ?? 0;
//Convertimos a entero
$id = (int) $id;
//Si el id no es valido redigirimos al catalogo.
if($id <= 0){
    header ("Location: ../index.php");
    exit;
}

$sql = "SELECT p.*, c.nombre AS categoria FROM producto p INNER JOIN categoria c ON p.id_categoria = c.id_categoria WHERE p.id_producto = $id AND p.activo = 1";

$resultado = mysqli_query($link, $sql);
$producto = mysqli_fetch_assoc($resultado);

if(!$producto){
    header("Location: ../index.php");
    exit;
}

//Tallas y stock de productos
$sql_tallas = "SELECT talla, stock FROM producto_talla WHERE id_producto = $id ORDER BY talla";

$resultado_tallas = mysqli_query($link, $sql_tallas);

$tallas = mysqli_fetch_all($resultado_tallas, MYSQLI_ASSOC);