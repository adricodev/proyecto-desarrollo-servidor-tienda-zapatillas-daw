<?php
//Creamos los datos de acceso de la BD
$servidor = "localhost";
$user_bd = "root";
$password_bd = "";

//Conectamos a la base de dato con las credenciales
$link = mysqli_connect($servidor, $user_bd, $password_bd) or die ("No se ha podido realizar la conexion");

//Seleccionamos la base de datos, en caso de que no conecte lanzamos un error.
mysqli_select_db($link, "tienda_zapatillas") or die("No se ha podido realizar la conexion");
?>