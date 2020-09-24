<?php 

include 'db/conexion.php';


// recogemos los datos del formulario
// insertamos en la base de datos
var_dump($_POST);
/* $id_usuario = $_POST['id_usuario']; */

$nombre_usuario = $_POST['nombre_usuario'];
$email_usuario = $_POST['email_usuario'];


// sql para insertar usuario
$consulta ="'Insert into usuarios values ('null', '$nombre_usuario','$email_usuario')'";
// ejecuto insercion usuario
// mysqli_query($conexion,$id_usuario);
// obtengo el id usuario
$id_usuario = mysqli_insert_id($conexion);


/*
 $query="select * from persona where id='$codigo'"; 
$query =" insert into usuarios( nombre,apellidos,correo) values ("$nombre", "$apellidos","correo")";
$consulta = "SELECT * FROM usuarios order by id_usuario  limit 1";

*/
$consulta = "SELECT id_usuario FROM usuarios order by id_usuario  limit 1";
 /* envolvemos toda la query en comillas dobles para que acepte variables */ 
mysqli_query($conexion,$consulta);

$id_usuario = 	mysqli_insert_id($conexion);

echo "$id_usuario";
/* echo "$conexion $consulta"; */



$consulta ="'insert into pedidos (id_pedido, id_usuario, fecha_pedido, confirmar_pedido) values(null,'$id_usuario',null,'no')'";
$id_pedido = mysqli_insert_id($conexion);
echo "<hr> Hola $nombre_usuario tienes un id $id_usuario y tu numero de pedido es $id_pedido ";



/*

include('Conexion.php');//incluye el archivo php que contiene la conexion
$con=Conectar();//variable que almacena la conexión ala base de datos
if(isset($_REQUEST['buscar'])){
$codigo=$_REQUEST['codigo'];
$query="select * from persona where id='$codigo'";
$cierto=mysql_query($query,$con);//ejecutando consulta


if(!$cierto){
echo "No existe!";
echo "<a href='principal.html'>Regresar</a>";
}else
{
if($row=mysql_fetch_array($cierto)){
echo "<form action='Modificardatosfinal.php' method='post'>
<input type='hidden' name='codigo' value='$row[id]'>
<input type='text' name='nombre' value='$row[nombre]'>
<input type='text' name='apellido' value='$row[apellido]'>
<input type='text' name='correo' value='$row[correo]'>
<input type='submit' name='Modificar' value='Modificar'>
</form>";
}
else{
echo "No existe!";
echo "<a href='principal.html'>Regresar</a>";
}
}
}













?>
*/





