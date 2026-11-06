<?php
//Verificamos que los datos se envian por POST
if($_SERVER["REQUEST_METHOD"] == "POST"){

    require "../models/conexion.php";

    //Se recogen los datos del formulario y se limpian
    $nombre = mysqli_real_escape_string($link, $_POST["nombre"]);
    $apellidos = mysqli_real_escape_string($link, $_POST["apellidos"]);
    $email = mysqli_real_escape_string($link, $_POST["email"]);
    $password = mysqli_real_escape_string($link, $_POST["password"]);
    $telefono = mysqli_real_escape_string($link, $_POST["telefono"]);
    $direccion = mysqli_real_escape_string($link, $_POST["direccion"]);

    //Comprobamos que el email no este registrado ya
    $sql = "SELECT id_usuario FROM usuario WHERE email = '$email'";
    $resultado = mysqli_query($link, $sql);

    if(mysqli_num_rows($resultado) > 0){
        //Volvemos al formulario con un aviso
        header("Location: ../views/registro.php?error=email");
        exit;
    }

    //Insertamos el usuario nuevo como cliente
    $sql = "INSERT INTO usuario(nombre,apellidos,email,password,telefono,direccion,rol) VALUES ('$nombre','$apellidos','$email','$password','$telefono','$direccion','cliente')";

    mysqli_query($link, $sql);

    header("Location: ../views/login.php");
    exit;
}
