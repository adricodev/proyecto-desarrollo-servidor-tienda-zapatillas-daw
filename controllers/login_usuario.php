<?php
session_start();
//Verificamos que los datos se envian por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Se recoge los datos del form
    $email = $_POST["email"];
    $password = $_POST["password"];

    require "../models/conexion.php";

    $sql = "SELECT id_usuario,nombre, email, password, rol FROM usuario WHERE email = '$email' AND activo = 1";

    $resultado = mysqli_query($link, $sql);

    if (!$resultado) {
        die("Error en la consulta");
    }

    //Comprobamos si la consulta tiene una fila.
if(mysqli_num_rows($resultado)==1){
    //Comprobamos y recuperamos los datos de la consulta con un array asociativo.
    $usuario = mysqli_fetch_assoc($resultado);

    //Accede a usuario si existe. Y si existe se hace la comprobación del password. Si no existe arroja error
    if($usuario["password"]==$password) {
        $_SESSION["id_usuario"] = $usuario["id_usuario"];
        $_SESSION["nombre"] = $usuario["nombre"];
        $_SESSION["rol"] = $usuario["rol"];
        header("Location: ../index.php");
        exit();
    }
}
//En caso de error, arroja el <p> de login.php que indica el error de pass o de usuario.
    header("Location: ../views/login.php?error=1");
exit;

}





