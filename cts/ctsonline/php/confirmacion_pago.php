<?php
// Verifica si se recibió el plan y si el pago fue exitoso
if ($_GET && isset($_GET['plan']) && isset($_GET['success'])) {
    $plan = $_GET['plan'];

    // Verifica si el pago fue exitoso
    if ($_GET['success'] == 'true') {
        // Actualiza la suscripción del usuario en tu base de datos
        // Por ejemplo, podrías actualizar un campo 'suscripcion' en la tabla de usuarios
        // con el valor de $plan para indicar el plan al que está suscrito el usuario

        // Redirige al usuario a la página de registro con el rol correspondiente
        header("Location: registro.php?rol=$plan");
        exit;
    } else {
        // Maneja el caso si el pago no fue exitoso
        header('Location: error.php');
        exit;
    }
} else {
    // Plan no recibido o estado de éxito del pago no recibido, manejar el caso según tu lógica
    header('Location: error.php');
    exit;
}
?>
