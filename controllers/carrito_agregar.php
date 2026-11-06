<?php
session_start();
require "../models/conexion.php";

if (!isset($_POST["id_producto"])) {
    header("Location: ../index.php");
    exit;
}

$id_producto = (int) $_POST["id_producto"];
$talla = $_POST["talla"];

$sql = "SELECT stock FROM producto_talla WHERE id_producto = $id_producto AND talla = '$talla'";

$resultado = mysqli_query($link, $sql);
$fila = mysqli_fetch_assoc($resultado);

if ($fila && $fila["stock"] > 0) {

    // Clave unica producto y talla.
    $clave = $id_producto . "-" . $talla;
    if (isset($_SESSION["carrito"][$clave])) {
        // sumamos uno.
        $_SESSION["carrito"][$clave]["cantidad"] = $_SESSION["carrito"][$clave]["cantidad"] + 1;
    } else {
        $_SESSION["carrito"][$clave] = [
            "id_producto" => $id_producto,
            "talla" => $talla,
            "cantidad" => 1
        ];
    }
}

header("Location: ../views/carrito.php");
exit;