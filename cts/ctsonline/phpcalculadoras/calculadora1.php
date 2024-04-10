<?php
$HonorarioNeto = $_POST['ingrese'];

// Operación 1
$HonorarioBruto1 = $HonorarioNeto / 0.953333;
$Iva1 = $HonorarioBruto1 * 0.16;
$HonorarioTotal1 = $HonorarioBruto1 + $Iva1;
$RetencionIsr1 = $HonorarioBruto1 * 0.1;
$RetencionIva1 = ($Iva1 / 3) * 2;
$HonorarioNetoResultado1 = $HonorarioTotal1 - $RetencionIsr1 - $RetencionIva1;

// Operación 2
$HonorarioBruto2 = $HonorarioNeto;
$Iva2 = $HonorarioNeto * 0.16;
$HonorarioTotal2 = $HonorarioNeto + $Iva2;
$RetencionIsr2 = $HonorarioNeto * 0.1;
$RetencionIva2 = ($Iva2 / 3) * 2;
$HonorarioNetoResultado2 = $HonorarioTotal2 - $RetencionIsr2 - $RetencionIva2;

$response = array(
    'operacion1' => array(
        'HonorarioNeto' => number_format($HonorarioNeto, 2),
        'Iva' => number_format($Iva1, 2),
        'HonorarioBruto' => number_format($HonorarioBruto1, 2),
        'HonorarioTotal' => number_format($HonorarioTotal1, 2),
        'RetencionIsr' => number_format($RetencionIsr1, 2),
        'RetencionIva' => number_format($RetencionIva1, 2),
        'HonorarioNetoResultado' => number_format($HonorarioNetoResultado1, 2)
    ),
    'operacion2' => array(
        'HonorarioNeto' => number_format($HonorarioNeto, 2),
        'Iva' => number_format($Iva2, 2),
        'HonorarioBruto' => number_format($HonorarioBruto2, 2),
        'HonorarioTotal' => number_format($HonorarioTotal2, 2),
        'RetencionIsr' => number_format($RetencionIsr2, 2),
        'RetencionIva' => number_format($RetencionIva2, 2),
        'HonorarioNetoResultado' => number_format($HonorarioNetoResultado2, 2)
    )
);

echo json_encode($response);
?>
