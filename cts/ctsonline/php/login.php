<?php
include("conexion.php");
session_start();
$conexion = conectar();

$usuario = $_POST['email'];
$contrasena = $_POST['password'];

$peticion = "SELECT * FROM registro WHERE correo = '" . $usuario . "'";
$resultado = mysqli_query($conexion, $peticion);

if ($resultado) {
    if ($fila = mysqli_fetch_assoc($resultado)) {
        if (password_verify($contrasena, $fila['contrasena'])) {
            $_SESSION['nombres'] = $fila['nombres'];
            $_SESSION['correo'] = $usuario;
            $_SESSION['rol'] = $fila['rol'];  // Almacena el rol en la sesión

            // Redirigir según el rol almacenado en la sesión
            switch (strtoupper($_SESSION['rol'])) {
                case 'BLUE':
                    $redirect = "../ctsonline/blue/menul.php";
                    break;
                case 'GOLD':
                    $redirect = "../ctsonline/gold/menul.php";
                    break;
                case 'PREMIUM':
                    $redirect = "../ctsonline/premium/menul.php";
                    break;
                case 'ADMINISTRADOR':
                    $redirect = "../ctsonline/admin/menul.php"; 
                    break;
                default:
                    $redirect = "../preloader.html";
                    break;
            }
            echo json_encode(array("redirect" => $redirect)); // No es necesario agregar delay
            exit();
        } else {
            // Contraseña incorrecta
            echo json_encode(array("error" => "Contraseña incorrecta"));
            exit();
        }
    } else {
        // Usuario no encontrado
        echo json_encode(array("error" => "Usuario no encontrado"));
        exit();
    }
} else {
    // Error en la consulta
    echo json_encode(array("error" => "Error en la consulta: " . mysqli_error($conexion)));
    exit();
}
?>
