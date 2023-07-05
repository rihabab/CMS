<?php 

if(isset($_POST['add_client'])){
    $client_name=$_POST['client_name'];
    $client_ice=$_POST['client_ice'];
    $client_email=$_POST['client_email'];
    $client_num_tel=$_POST['client_num_tel'];
    $client_city=$_POST['client_city'];
    $client_adresse=$_POST['client_adresse'];
    
    

    $query = "INSERT INTO clients( client_name, client_ice, client_email, client_num_tel, client_city, client_adresse) ";
    $query .= "VALUES('{$client_name}','{$client_ice}','{$client_email}','{$client_num_tel}','{$client_city}','{$client_adresse}' ) ";

    $insert_client_query= mysqli_query($connection, $query);

    confirm($insert_client_query);

    header("Location: clients.php?source=view");



}



?>

                

<div class="container-fluid px-4">
<h1 class="mt-4" >Clients</h1>
        <ol class="breadcrumb mb-4" >
            <li class="breadcrumb-item active">Ajouter clients</li>
        </ol>
        <hr class="hr" />



<form action="" method="post">
   
            <div class="form-group">
                <label for="title">Nom</label>
                <input class="form-control" id="inputLastName" type="text" placeholder="Nom" name="client_name" aria-describedby="basic-addon1"/>
            </div>
            <hr class="hr" />
            <div class="form-group">
                <label for="title">ICE</label>
                <input class="form-control"  id="inputFirstName" type="text" placeholder="Prénom" name="client_ice" aria-describedby="basic-addon1"/>
            </div>
            <hr class="hr" />
    
    
            <div class="form-group">
                <label for="title">Email</label>
                <input class="form-control" id="inputEmail" type="email" placeholder="Email address" name="client_email" aria-describedby="basic-addon1"/>
            </div>
            <hr class="hr" />
        
            <div class="form-group">
                <label for="title">Numero du télephone</label>
                <input class="form-control" id="inputEmail" type="text" placeholder="Numéro du télephone" name="client_num_tel" aria-describedby="basic-addon1"/>
            </div>
            <hr class="hr" />
    
            <div class="form-group">
                <label for="title">Ville</label>
                <input class="form-control" id="inputPassword" type="text" placeholder="Ville" name="client_city" aria-describedby="basic-addon1"/>
            </div>
            <hr class="hr" />
        
            <div class="form-group">
                <label for="title">Adresse</label>
                <input class="form-control" id="inputPasswordConfirm" type="text" placeholder="Adresse" name="client_adresse" aria-describedby="basic-addon1"/>
            </div>
        
    <div class="form-group">
        <input class="btn btn-primary " type="submit" name="add_client" value="submit">
    </div>
    
    <hr class="hr" />
</form> 



</div>