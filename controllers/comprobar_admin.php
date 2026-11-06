<?php
session_start();
//Si no hay nadie en el login se redirecciona para el login.
if(!isset($_SESSION["id_usuario"])){
    header("Location: ../views/login.php");
    exit;
}

//Si loguea alguien que no es rol administrador. Para el login.
if(!isset($_SESSION["rol"]) || $_SESSION["rol"] != "administrador"){
    header("Location: ../views/login.php");
    exit;
}