<?php
session_start();

// Borramos el carrito de la sesion.
unset($_SESSION["carrito"]);

// Volvemos al carrito, que ahora estara vacio.
header("Location: ../views/carrito.php");
exit;
