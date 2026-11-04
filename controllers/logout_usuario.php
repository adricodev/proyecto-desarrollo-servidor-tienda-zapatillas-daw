<?php
//Aqui creamos la sesion, la vaciamos, la destruimos y redigirimos al login.
session_start();

$_SESSION = [];

session_destroy();

header("Location: ../views/login.php");

exit();