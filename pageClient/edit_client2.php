<?php 

if(isset($_GET['c_id'])){
    $client_id=$_GET['c_id'];

    $query = "SELECT * FROM clients WHERE client_id=$client_id ";
    $get_client_query= mysqli_query($connection, $query);
    confirm($get_client_query);
    while($row = mysqli_fetch_assoc($get_client_query)){
        $client_ice=$row['client_ice'];
        $client_name=$row['client_name'];
        $client_email=$row['client_email'];
        $client_num_tel=$row['client_num_tel'];
        $client_city=$row['client_city'];
        $client_adresse=$row['client_adresse'];

    }

}


if(isset($_POST['edit_client'])){

    $client_name=$_POST['client_name'];
    $client_ice=$_POST['client_ice'];
    $client_email=$_POST['client_email'];
    $client_num_tel=$_POST['client_num_tel'];
    $client_city=$_POST['client_city'];
    $client_adresse=$_POST['client_adresse'];
    
    
    $query = "UPDATE clients SET ";
    $query .= "client_name = '{$client_name}', ";
    $query .= "client_ice = '{$client_ice}', ";
    $query .= "client_num_tel = '{$client_num_tel}', ";
    $query .= "client_email = '{$client_email}', ";
    $query .= "client_city = '{$client_city}', ";
    $query .= "client_adresse = '{$client_adresse}' ";
    $query .= "WHERE client_id = {$client_id}";

    $update_client_query= mysqli_query($connection, $query);

    confirm($update_client_query);
    
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
                <input class="form-control" id="inputLastName" type="text" placeholder="Nom" name="client_name" value="<?php echo $client_name ;?>" aria-describedby="basic-addon1"/>
            </div>
            <hr class="hr" />
            <div class="form-group">
                <label for="title">ICE</label>
                <input class="form-control"  id="inputFirstName" type="text" placeholder="Prénom" name="client_ice" value="<?php echo $client_ice ;?>" aria-describedby="basic-addon1"/>
            </div>
            <hr class="hr" />
    
    
            <div class="form-group">
                <label for="title">Email</label>
                <input class="form-control" id="inputEmail" type="email" placeholder="Email address" name="client_email" value="<?php echo $client_email ;?>" aria-describedby="basic-addon1"/>
            </div>
            <hr class="hr" />
        
            <div class="form-group">
                <label for="title">Numero du télephone</label>
                <input class="form-control" id="inputEmail" type="text" placeholder="Numéro du télephone" name="client_num_tel" value="<?php echo $client_num_tel ;?>" aria-describedby="basic-addon1"/>
            </div>
            <hr class="hr" />
    
            <div class="form-group">
                <label for="title">Ville</label>
                <input class="form-control" id="inputPassword" type="text" placeholder="Ville" name="client_city" value="<?php echo $client_city ;?>" aria-describedby="basic-addon1"/>
            </div>
            <hr class="hr" />
        
            <div class="form-group">
                <label for="title">Adresse</label>
                <input class="form-control" id="inputPasswordConfirm" type="text" placeholder="Adresse" name="client_adresse" value="<?php echo $client_adresse ;?>" aria-describedby="basic-addon1"/>
            </div>
        
    <div class="form-group">
        <input class="btn btn-primary " type="submit" name="edit_client" value="submit">
    </div>
    
    <hr class="hr" />
</form> 



</div>