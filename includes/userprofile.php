<?php 




?>

                

<div class="container-fluid px-4">
<h1 class="mt-4" >User</h1>
        
        <hr class="hr" />



<form action="" method="post">
   
            <div class="form-group">
                <label for="title">Npm</label>
                <input class="form-control" id="inputLastName" type="text" placeholder="Nom" name="client_name" value="<?php echo $user_lastname ;?>" aria-describedby="basic-addon1"/>
            </div>
            <hr class="hr" />
            <div class="form-group">
                <label for="title">Prenom</label>
                <input class="form-control"  id="inputFirstName" type="text" placeholder="Prénom" name="client_ice" value="<?php echo $user_firstname ;?>" aria-describedby="basic-addon1"/>
            </div>
            <hr class="hr" />
    
    
            
            <hr class="hr" />
        
            <div class="form-group">
                <label for="title">Email</label>
                <input class="form-control" id="inputEmail" type="text" placeholder="Numéro du télephone" name="client_num_tel" value="<?php echo $user_email ;?>" aria-describedby="basic-addon1"/>
            </div>
            <hr class="hr" />
    
            <div class="form-group">
                <label for="title">Role</label>
                <input class="form-control" id="inputPassword" type="text" placeholder="Ville"  value="<?php echo $user_role ;?>" aria-describedby="basic-addon1"/>
            </div>
            <hr class="hr" />
        
    
    <hr class="hr" />
</form> 



</div>