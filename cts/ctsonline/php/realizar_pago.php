<?php
require_once 'vendor/autoload.php';

// Configura tu Access Token de MercadoPago
MercadoPago\SDK::setAccessToken("TEST-5069970993838579-022100-8539d844a23b6765b5724bd2066ceb49-1667586701");

// Verifica si se recibió el plan por GET
if ($_GET && isset($_GET['plan'])) {
    $plan = $_GET['plan'];

    // Define el precio según el plan seleccionado
    $precio = ($plan == 'GOLD') ? 120.00 : ($plan == 'PREMIUM' ? 450.00 : 0.00);

    // Si el precio es válido, crea la preferencia de pago en MercadoPago
    if ($precio > 0) {
        $preference = new MercadoPago\Preference();
        $item = new MercadoPago\Item();
        $item->title = $plan;
        $item->quantity = 1;
        $item->currency_id = 'MXN';
        $item->unit_price = $precio;
        $item->subscription_type = 'monthly'; // Esto es opcional, dependiendo de tus necesidades
        $preference->items = array($item);
        $preference->save();

        // Redirige al usuario al proceso de pago en MercadoPago
        header('Location: ' . $preference->init_point);
        exit;
    } else {
        // Precio no válido, manejar el caso según tu lógica
        header('Location: error.php');
        exit;
    }
} elseif ($_GET && isset($_GET['success']) && isset($_GET['collection_status']) && $_GET['collection_status'] == 'approved') {
    // Si el pago se realizó correctamente, redirige al usuario a la página principal de tu sitio web
    header('Location: https://ctsconsultores.com/');
    exit;
} else {
    // Plan no recibido o pago no exitoso, manejar el caso según tu lógica
    header('Location: error.php');
    exit;
}
?>
