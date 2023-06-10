<?php 

if(isset($_POST['add_supplier'])){
    $supplier_lastname=$_POST['supplier_lastname'];
    $supplier_firstname=$_POST['supplier_firstname'];
    $supplier_email=$_POST['supplier_email'];
    $supplier_num_tel=$_POST['supplier_num_tel'];
    $supplier_city=$_POST['supplier_city'];
    $supplier_adresse=$_POST['supplier_adresse'];
    
    

    $query = "INSERT INTO suppliers( supplier_firstname, supplier_lastname, supplier_num, supplier_email, supplier_city, supplier_adresse) ";
    $query .= "VALUES('{$supplier_firstname}','{$supplier_lastname}','{$supplier_num_tel}','{$supplier_email}','{$supplier_city}','{$supplier_adresse}' ) ";

    $insert_supplier_query= mysqli_query($connection, $query);

    confirm($insert_supplier_query);



}



?>


<div class="container-fluid px-4">
<h1 class="mt-4" >Fournisseurs</h1>
        <ol class="breadcrumb mb-4" >
            <li class="breadcrumb-item active">Tous les fournisseurs</li>
        </ol>
        <hr class="hr" />

<form action="" method="post" style="padding:200px ; padding-top:70px">
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" name="supplier_lastname"/>
                <label for="inputLastName">Nom</label>
                
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" name="supplier_firstname" />
                <label for="inputFirstName">Prénom</label>
                
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" name="supplier_email"/>
                <label for="inputEmail">Email address</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="inputnum" type="tel" placeholder="+212600235874" name="supplier_num_tel" maxlength="12" minlength="6"/>
                <label for="inputEmail">Numéro du télephone</label>
            </div>
        </div>
        
    </div>
    
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="inputCity" type="text" placeholder="Ville" name="supplier_city"/>
                <label for="inputCity">Ville</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="inputAdresse" type="text" placeholder="adresse" name="supplier_adresse"/>
                <label for="inputAdresse">Adresse</label>
            </div>
        </div>
    </div>
    <div class="mt-4 mb-0">
        <div class="d-grid">
            <input class="btn btn-primary btn-block" type="submit" name="add_supplier" value="submit">
        </div>
    </div>
    
</form>

</div>