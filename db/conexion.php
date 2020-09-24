<?php 
include 'datos-conexion.php';
//1-realizamos la conexión usando CONSTANTES usando la palabra define como  en datos-conexion.php
$conexion = mysqli_connect(SERVIDOR,USUARIO,PASSWORD,DB);
// cargar caracteres utf-8 en php
mysqli_set_charset($conexion,"utf8");


?>