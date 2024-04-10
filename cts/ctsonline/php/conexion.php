<?php

function conectar (){
    $host="localhost";
    $usuario= "root";
    $contrasena ="";
    $dbn="servicios";
    $conexion= mysqli_connect($host,$usuario,$contrasena,$dbn);
    return $conexion;
    

}


?>