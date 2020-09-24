Ahora nuestro siguiente paso es mostrar el registro junto con la imagen. Utilizando Bootstrap es fácil crear una galería de imágenes, vamos a echar un vistazo al script.

Index.php
Aquí podemos ver cómo generar la galería de miniaturas de los registros extraidos de la tabla tbl_users, dentro del div con clase row.

<div class="row">
<?php
 
 $stmt = $DB_con->prepare('SELECT userID, userName, userProfession, userPic FROM tbl_users ORDER BY userID DESC');
 $stmt->execute();
 
 if($stmt->rowCount() > 0)
 {
  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
  {
   extract($row);
   ?>
   <div class="col-xs-3">
    <p class="page-header"><?php echo $userName."&nbsp;/&nbsp;".$userProfession; ?></p>
    <img src="user_images/<?php echo $row['userPic']; ?>" class="img-rounded" width="250px" height="250px" />
    <p class="page-header">
    <span>
    <a class="btn btn-info" href="editform.php?edit_id=<?php echo $row['userID']; ?>" title="click for edit" onclick="return confirm('sure to edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
    <a class="btn btn-danger" href="?delete_id=<?php echo $row['userID']; ?>" title="click for delete" onclick="return confirm('sure to delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>
    </span>
    </p>
   </div>       
   <?php
  }
 }
 else
 {
  ?>
        <div class="col-xs-12">
         <div class="alert alert-warning">
             <span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
            </div>
        </div>
        <?php
 }
 
?>
</div>