<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>codigos sql - gestion de pedidos</title>
    <link rel="stylesheet" href="styles.css">


</head>
<body>

    <h1 >GESTIÓN PEDIDOS</h1>
    <hr>


    <?php 
    /* HACEMOS LA CONSULTA A LA BASE DE DATOS lo llamaremos 'componente mirar' */
    include 'db/conexion.php';
    
    $datos=mysqli_query($conexion,$consulta);
    echo '<ul>';
    while($fila = mysqli_fetch_array($datos)){
       echo 'var_dump($fila)';   /* comprobamos que usa los datos de la database*/
       echo'<li>'.$fila['nombre_producto'].'</li>';
        echo '<br>';
        echo '<hr>';
        }
    echo '</ul>';
    ?>
<!-- cogemos un usuario con un formulario y lo mandamos a la base de datos */ -->

<form action=ingreso-usuario.php method="post">
<label for="nombre">Nombre</label>
<input required type="text" name="nombre_usuario" id="nombre">
<label for="email">email</label>
<input required type="text" name="email_usuario" id="email" value="EMAIL">
<button type="submit" value="Submit">Submit</button>
</form>

<!-- procesamos los datos y hacer el pedido -->


   
</body>
</html>