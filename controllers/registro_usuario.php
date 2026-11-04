<?php
//Verificamos que los datos se envian por POST
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Se recoge los datos del form
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $email= $_POST["email"];
    $password= $_POST["password"];
    $telefono= $_POST["telefono"];
    $direccion= $_POST["direccion"];


require "../models/conexion.php";

$sql = "INSERT INTO usuario(nombre,apellidos,email,password,telefono,direccion,rol) VALUES ('$nombre','$apellidos','$email','$password','$telefono','$direccion','cliente')";

$resultado = mysqli_query($link,$sql);

//Comprobamos el insert
if(!$resultado){
    die("Error al registrar: ". mysqli_error($link));
}

header("Location: ../views/login.php");
die();
}