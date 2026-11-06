<?php
// Guarda un usuario: crea uno nuevo o actualiza el existente.
require "comprobar_admin.php";
require "../models/conexion.php";

// Si no llega el formulario, volvemos al listado.
if (!isset($_POST["nombre"])) {
    header("Location: ../views/admin_usuarios.php");
    exit;
}

$id = (int) ($_POST["id"] ?? 0);

// Limpiamos los textos antes de meterlos en la consulta.
$nombre = mysqli_real_escape_string($link, $_POST["nombre"]);
$apellidos = mysqli_real_escape_string($link, $_POST["apellidos"]);
$email = mysqli_real_escape_string($link, $_POST["email"]);
$password = mysqli_real_escape_string($link, $_POST["password"]);
$telefono = mysqli_real_escape_string($link, $_POST["telefono"]);
$direccion = mysqli_real_escape_string($link, $_POST["direccion"]);

// El rol solo puede ser uno de los dos.
$rol = $_POST["rol"] == "administrador" ? "administrador" : "cliente";

// El checkbox solo llega si esta marcado.
$activo = isset($_POST["activo"]) ? 1 : 0;

// Comprobamos que el email no este repetido en otro usuario.
$sql = "SELECT id_usuario FROM usuario WHERE email = '$email'";
$resultado = mysqli_query($link, $sql);
$existe = mysqli_fetch_assoc($resultado);

if ($existe && $existe["id_usuario"] != $id) {
    header("Location: ../views/admin_usuario_form.php?id=$id&error=email");
    exit;
}

if ($id > 0) {
    // Actualizar. Si la password viene vacia, se mantiene la que habia.
    if ($password != "") {
        $sql = "UPDATE usuario SET
                    nombre = '$nombre',
                    apellidos = '$apellidos',
                    email = '$email',
                    password = '$password',
                    telefono = '$telefono',
                    direccion = '$direccion',
                    rol = '$rol',
                    activo = $activo
                WHERE id_usuario = $id";
    } else {
        $sql = "UPDATE usuario SET
                    nombre = '$nombre',
                    apellidos = '$apellidos',
                    email = '$email',
                    telefono = '$telefono',
                    direccion = '$direccion',
                    rol = '$rol',
                    activo = $activo
                WHERE id_usuario = $id";
    }
} else {
    // Crear un usuario nuevo.
    $sql = "INSERT INTO usuario (nombre, apellidos, email, password, telefono, direccion, rol, activo)
            VALUES ('$nombre', '$apellidos', '$email', '$password', '$telefono', '$direccion', '$rol', $activo)";
}

mysqli_query($link, $sql);

header("Location: ../views/admin_usuarios.php");
exit;
