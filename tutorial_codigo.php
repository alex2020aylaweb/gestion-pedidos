Subir, insertar, modificar y borrar una imagen utilizando PHP y MySQL

 


 

Hoy veremos cómo desarrollar una aplicación web o un proyecto en el que se puedan subir imágenes y, además, insertarlas en base de datos para después poder modificarlas y eliminarlas. Para ello utilizaremos PHP y MySQL, además de PDO jQuery. Además, también realizaremos validaciones en la imagen, como puede ser la propia extensión (comprobando así mismo que el fichero subido se trata de una imagen), así como el tamaño. ¿Todo claro? Vamos a ver cómo subir una imagen en PHP, empezaremos por ahí...

Tabla de la BD
Crea una base de datos de prueba en tu alojamiento, y copia y pega el código SQL de más abajo
en tu gestor de BD, que por regla general suele ser PHPMyAdmin. Así crearemos la tabla de prueba que utilizaremos en este ejemplo, llamada tbl_users.

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(20) NOT NULL,
  `userProfession` varchar(50) NOT NULL,
  `userPic` varchar(200) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

 

 
Ahora tenemos que crear solo cuatro ficheros de PHP que serán los que gestionarán nuestras operaciones CRUD con la imagen.

Dbconfig.php
Fichero que establecerá la conexión con la base de datos a través de la extensión PDO. Cambia las credenciales con las tuyas propias.

$DB_HOST = 'localhost';
 $DB_USER = 'root';
 $DB_PASS = '';
 $DB_NAME = 'testdb';
 
 try{
  $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
  $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }
 catch(PDOException $e){
  echo $e->getMessage();
 }
Addnew.php
Formulario HTML muy simple, creado con Bootstrap. Los campos que utilizo son de ejemplo, como nombre de usuario (username), profesión (userjob) e imagen (userimage). Si lo deseas, puedes añadir muchos más campos. Todos los que desees, y necesites.

<form method="post" enctype="multipart/form-data" class="form-horizontal">
     
 <table class="table table-bordered table-responsive">
 
    <tr>
     <td><label class="control-label">Username.</label></td>
        <td><input class="form-control" type="text" name="user_name" placeholder="Enter Username" value="<?php echo $username; ?>" /></td>
    </tr>
    
    <tr>
     <td><label class="control-label">Profession(Job).</label></td>
        <td><input class="form-control" type="text" name="user_job" placeholder="Your Profession" value="<?php echo $userjob; ?>" /></td>
    </tr>
    
    <tr>
     <td><label class="control-label">Profile Img.</label></td>
        <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save
        </button>
        </td>
    </tr>
    
    </table>
    
</form>

 
Como te he mencionado anteriormente, utilizo Bootstrap para este tutorial, por lo que la longitud del código de la maqueta se ve reducido considerablemente. Es por eso que no he hecho mucho hincapié a la parte del diseño, puesto que todo está ya demasiado explicado en el código. Vamos a ver ahora el próximo punto.

Código PHP
Pon el siguiente código PHP justo debajo del tag DOCTYPE. En este script, se insertarán tanto la información del usuario, como la propia imagen en la base de datos. También se realizará la validación y existe algún error, se mostrará un mensaje aprovechando el diseño de Bootstrap.

error_reporting( ~E_NOTICE ); // avoid notice
 require_once 'dbconfig.php';
 
 if(isset($_POST['btnsave']))
 {
  $username = $_POST['user_name'];// user name
  $userjob = $_POST['user_job'];// user email
  
  $imgFile = $_FILES['user_image']['name'];
  $tmp_dir = $_FILES['user_image']['tmp_name'];
  $imgSize = $_FILES['user_image']['size'];
  
  
  if(empty($username)){
   $errMSG = "Please Enter Username.";
  }
  else if(empty($userjob)){
   $errMSG = "Please Enter Your Job Work.";
  }
  else if(empty($imgFile)){
   $errMSG = "Please Select Image File.";
  }
  else
  {
   $upload_dir = 'user_images/'; // upload directory
 
   $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
  
   // valid image extensions
   $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
  
   // rename uploading image
   $userpic = rand(1000,1000000).".".$imgExt;
    
   // allow valid image file formats
   if(in_array($imgExt, $valid_extensions)){   
    // Check file size '5MB'
    if($imgSize < 5000000)    {
     move_uploaded_file($tmp_dir,$upload_dir.$userpic);
    }
    else{
     $errMSG = "Sorry, your file is too large.";
    }
   }
   else{
    $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
   }
  }
  
  
  // if no error occured, continue ....
  if(!isset($errMSG))
  {
   $stmt = $DB_con->prepare('INSERT INTO tbl_users(userName,userProfession,userPic) VALUES(:uname, :ujob, :upic)');
   $stmt->bindParam(':uname',$username);
   $stmt->bindParam(':ujob',$userjob);
   $stmt->bindParam(':upic',$userpic);
   
   if($stmt->execute())
   {
    $successMSG = "new record succesfully inserted ...";
    header("refresh:5;index.php"); // redirects image view page after 5 seconds.
   }
   else
   {
    $errMSG = "error while inserting....";
   }
  }
 }