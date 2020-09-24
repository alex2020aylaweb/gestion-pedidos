<?php
// Juan Antonio Villalpando
// http://kio4.com
// https://kio4.000webhostapp.com/mysqli_get.php

// 1.- IDENTIFICACION nombre de la base, del usuario, clave y servidor
$db_host="localhost";
$db_name="id13313319_kio4";
$db_login="id13313319_juanantonio";
$db_pswd="contraseña";

// 2.- CONEXION A LA BASE DE DATOS
$link = new mysqli($db_host, $db_login, $db_pswd, $db_name);

$boton = $_GET['boton'];

///////////////////////////////   INSERTAR - INSERT ////////////////////////////////////
if ($boton == "btnInsertar"){
    $Nombre = $_GET['Nombre'];
    $Edad = $_GET['Edad'];
    $Ciudad = $_GET['Ciudad'];
    $query="insert into personas (Nombre, Edad, Ciudad) values ('$Nombre','$Edad','$Ciudad')";
$result = mysqli_query($link, $query);
print("Datos agregados a la base.");
mysqli_close($link);
}
///////////////////////////////   BORRAR - DELETE  ////////////////////////////////////
if ($boton == "btnBorrar"){
    $Nombre = $_GET['Nombre'];
    $query="delete from personas where Nombre='$Nombre'";
$result = mysqli_query($link, $query);
print("Datos borrados.");
mysqli_close($link);
}
//////////////////////////////   ACTUALIZAR - UPDATE  ///////////////////////////////
if ($boton == "btnActualizar"){
    $Nombre = $_GET['Nombre'];
    $Edad = $_GET['Edad'];
    $Ciudad = $_GET['Ciudad'];
    $query="update personas set Edad='$Edad', Ciudad='$Ciudad' WHERE Nombre='$Nombre'";
$result = mysqli_query($link, $query);
print("Datos modificados.");
mysqli_close($link);
}

///////////////////// BUSCAR POR NOMBRE - SEARCH BY NAME /////////////////////////////
if ($boton == "btnBuscarNombre"){
	$Nombre=$_GET['Nombre'];
	$hacer = mysqli_query ($link, "SELECT * FROM personas WHERE Nombre='$Nombre' ");
	enviar_respuesta($hacer);
}
/////////////////////// MOSTRAR TABLA - SHOW TABLE  /////////////////////////////////////
if ($boton == "btnVerTabla"){
	$hacer = mysqli_query ($link, "SELECT * FROM personas");
	enviar_respuesta($hacer);
}

////////////////////////////// RESPUESTA - RESPONSE ///////////////////////
// En los casos que hay btnBuscarNombre o btnVerTabla y se debe enviar una respuesta actúa este código.
function enviar_respuesta($hacer)
{
$resultado = mysqli_query($GLOBALS['link'], "SHOW COLUMNS FROM personas");
$numerodefilas = mysqli_num_rows($resultado);
	if ($numerodefilas > 0) {
	$en_csv='';
		while ($rowr = mysqli_fetch_row($hacer)) {
			for ($j=0;$j<$numerodefilas;$j++) {
			$en_csv .= $rowr[$j].", ";
			}
		$en_csv .= "\n";
		}
	}

print $en_csv;
}
///////////////////////////////////////////////////////////////////
?>	