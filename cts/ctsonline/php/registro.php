<?php
include("conexion.php");
$connect = conectar();

$nombres = $_POST['nombres'];
$apellidom = $_POST['apellido_m'];
$apellidop = $_POST['apellido_p'];
$correo = $_POST['correo'];
$contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
$rol = $_POST['rol']; // Agregamos esta línea para obtener el rol del formulario

// Verificar si el correo ya está registrado
$verificar_correo = "SELECT correo FROM registro WHERE correo = '$correo'";
$resultado_verificacion = mysqli_query($connect, $verificar_correo);

if (mysqli_num_rows($resultado_verificacion) > 0) {
    // El correo ya está registrado, mostrar mensaje de error
    echo "<script>alert('El correo ya está registrado'); window.location.href = '../registrate2.html';</script>";
} else {
    // El correo no está registrado, proceder con la inserción
    $peticion = "INSERT INTO registro (id_registro, id_usuario, nombres, apellido_p, apellido_m, correo, contrasena, rol) 
    VALUES (NULL, 0, '$nombres', '$apellidom', '$apellidop', '$correo', '$contrasena', '$rol')";
    $resultado = mysqli_query($connect, $peticion);

    if ($resultado) {
        // Redirigir según el rol registrado
        switch ($rol) {
            case 'BLUE':
                header("Location:../login2.html");
                exit();
            case 'GOLD':
                header("Location:../login2.html");
                exit();
            case 'PREMIUM':
                header("Location:../login2.html");
                exit();
            default:
                // Manejar otros roles o errores aquí
                echo "<script>alert('Registro exitoso, pero rol no reconocido'); window.location.href = '../login2.html';</script>";
        }
    } else {
        echo "<script>alert('Error en el registro'); window.location.href = '../registrate2.html';</script>";
    }
}
?>
