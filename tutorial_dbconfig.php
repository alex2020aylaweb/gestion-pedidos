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