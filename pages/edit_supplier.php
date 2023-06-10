<?php 

if(isset($_GET['s_id'])){
    $supplier_id=$_GET['s_id'];

    $query = "SELECT * FROM suppliers WHERE supplier_id=$supplier_id ";
    $get_supplier_query= mysqli_query($connection, $query);
    confirm($get_supplier_query);
    while($row = mysqli_fetch_assoc($get_supplier_query)){
        $supplier_firstname=$row['supplier_firstname'];
        $supplier_lastname=$row['supplier_lastname'];
        $supplier_email=$row['supplier_email'];
        $supplier_num_tel=$row['supplier_num'];
        $supplier_city=$row['supplier_city'];
        $supplier_adresse=$row['supplier_adresse'];

    }

}


if(isset($_POST['edit_supplier'])){

    $supplier_lastname=$_POST['supplier_lastname'];
    $supplier_firstname=$_POST['supplier_firstname'];
    $supplier_email=$_POST['supplier_email'];
    $supplier_num_tel=$_POST['supplier_num_tel'];
    $supplier_city=$_POST['supplier_city'];
    $supplier_adresse=$_POST['supplier_adresse'];
    
    
    $query = "UPDATE suppliers SET ";
    $query .= "supplier_firstname = '{$supplier_firstname}', ";
    $query .= "supplier_lastname = '{$supplier_lastname}', ";
    $query .= "supplier_num = '{$supplier_num_tel}', ";
    $query .= "supplier_email = '{$supplier_email}', ";
    $query .= "supplier_city = '{$supplier_city}', ";
    $query .= "supplier_adresse = '{$supplier_adresse}' ";
    $query .= "WHERE supplier_id = {$supplier_id}";

    $update_supplier_query= mysqli_query($connection, $query);

    confirm($update_supplier_query);



}




?>


<div class="container-fluid px-4">
<h1 class="mt-4" >Fournisseur</h1>
        <ol class="breadcrumb mb-4" >
            <li class="breadcrumb-item active">Modifier fournisseurs</li>
        </ol>
        <hr class="hr" />

<form action="" method="post" style="padding:200px ; padding-top:70px">
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="inputLastName" type="text"  name="supplier_lastname" value="<?php echo $supplier_lastname ;?>"/>
                <label for="">Nom</label>
                
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <input class="form-control" id="inputFirstName" type="text" value="<?php echo $supplier_firstname ;?>" name="supplier_firstname" />
                <label for="">Prénom</label>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="inputEmail" type="email" value="<?php echo $supplier_email ;?>" name="supplier_email"/>
                <label for="">Email</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="inputnum" type="tel" value="<?php echo $supplier_num_tel ;?>" name="supplier_num_tel" maxlength="12" minlength="6"/>
                <label for="">Num tel</label>
            </div>
        </div>
        
    </div>
    
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="inputCity" type="text" value="<?php echo $supplier_city ;?>" name="supplier_city"/>
                <label for="">Ville</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="inputAdresse" type="text" value="<?php echo $supplier_adresse ;?>" name="supplier_adresse"/>
                <label for="">Adresse</label>
            </div>
        </div>
    </div>
    <div class="mt-4 mb-0">
        <div class="d-grid">
            <input class="btn btn-primary btn-block" type="submit" name="edit_supplier" value="submit">
        </div>
    </div>
    
</form>

</div>