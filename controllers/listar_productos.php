<?php
require "models/conexion.php";
//Creamos la consulta sql con un inner para sacar la informacion y la guardamos ne resultado
$sql = "SELECT p.id_producto,p.nombre,p.marca,p.precio,p.imagen,c.nombre AS categoria FROM producto p INNER JOIN categoria c ON p.id_categoria = c.id_categoria WHERE p.activo = 1 ORDER BY p.id_producto";
$resultado = mysqli_query($link,$sql);

//Recorremos y vamos guardando en el array productos.
$productos = mysqli_fetch_all($resultado,MYSQLI_ASSOC);

