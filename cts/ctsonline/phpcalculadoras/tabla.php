<?php
$HonorarioNeto = $_POST['ingrese'];
$HonorarioBruto = 0;
$Iva = 0;
$HonorarioTotal = 0;
$RetencionIsr = 0;
$RetencionIva = 0;
$HonorarioNetoResultado = 0;
$Option = $_POST['option'];

$resultados = array(); // Crear un array para almacenar los resultados

if ($Option == "Elige una opcion...") {
    $resultados['error'] = "Elige una opcion";
} else {
    if ($Option == "1") {
        $Iva = $HonorarioNeto * 0.16;
        $HonorarioTotal = $HonorarioNeto + $Iva;
        $RetencionIsr = $HonorarioNeto * 0.1;
        $RetencionIva = ($Iva / 3) * 2;
        $HonorarioNetoResultado = $HonorarioTotal - $RetencionIsr - $RetencionIva;

        $resultados['HonorarioNeto'] = $HonorarioNeto;
        $resultados['HonorarioBruto'] = $HonorarioBruto;
        $resultados['Iva'] = $Iva;
        $resultados['HonorarioTotal'] = $HonorarioTotal;
        $resultados['RetencionIsr'] = $RetencionIsr;
        $resultados['RetencionIva'] = $RetencionIva;
        $resultados['HonorarioNetoResultado'] = $HonorarioNetoResultado;
    } elseif ($Option == "2") {
        // Lógica para la opción 2
        // Similar a la opción 1, pero con las modificaciones necesarias
    } else {
        $resultados['error'] = "Opción no válida";
    }
}

// Convertir el array a formato JSON
echo json_encode($resultados);
?>
