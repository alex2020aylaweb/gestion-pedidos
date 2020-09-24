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







