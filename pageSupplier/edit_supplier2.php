<?php 

if(isset($_GET['s_id'])){
    $supplier_id=$_GET['s_id'];

    $query = "SELECT * FROM suppliers WHERE supplier_id=$supplier_id ";
    $get_supplier_query= mysqli_query($connection, $query);
    confirm($get_supplier_query);
    while($row = mysqli_fetch_assoc($get_supplier_query)){
        $supplier_name=$row['supplier_name'];
        $supplier_ice=$row['supplier_ice'];
        $supplier_email=$row['supplier_email'];
        $supplier_num_tel=$row['supplier_num'];
        $supplier_city=$row['supplier_city'];
        $supplier_adresse=$row['supplier_adresse'];

    }

}


if(isset($_POST['edit_supplier'])){

    $supplier_name=$_POST['supplier_name'];
    $supplier_ice=$_POST['supplier_ice'];
    $supplier_email=$_POST['supplier_email'];
    $supplier_num_tel=$_POST['supplier_num_tel'];
    $supplier_city=$_POST['supplier_city'];
    $supplier_adresse=$_POST['supplier_adresse'];
    
    
    $query = "UPDATE suppliers SET ";
    $query .= "supplier_name = '{$supplier_name}', ";
    $query .= "supplier_ice = '{$supplier_ice}', ";
    $query .= "supplier_num = '{$supplier_num_tel}', ";
    $query .= "supplier_email = '{$supplier_email}', ";
    $query .= "supplier_city = '{$supplier_city}', ";
    $query .= "supplier_adresse = '{$supplier_adresse}' ";
    $query .= "WHERE supplier_id = {$supplier_id}";

    $update_supplier_query= mysqli_query($connection, $query);

    confirm($update_supplier_query);

    header("Location: suppliers.php?source=view");



}




?>
                

<div class="container-fluid px-4">
<h1 class="mt-4" >Fournisseurs</h1>
        <ol class="breadcrumb mb-4" >
            <li class="breadcrumb-item active">Tous les fournisseurs</li>
        </ol>
        <hr class="hr" />


<form action="" method="post">
    
            <div class="form-group">
                <label for="title">Nom</label>
                <input class="form-control"  type="text" placeholder="Nom" name="supplier_name" value="<?php echo $supplier_name ;?>" aria-describedby="basic-addon1"/>
            </div>
            <hr class="hr" />
       
            
            <div class="form-group">
                <label for="title">ICE</label>
                <input class="form-control"  type="text" placeholder="ICE" name="supplier_ice" value="<?php echo $supplier_ice ;?>" aria-describedby="basic-addon1"/>
            </div>
            <hr class="hr" />
            <div class="form-group">
                <label for="title">Email</label>
                <input class="form-control"  type="email" placeholder="Email address" name="supplier_email" value="<?php echo $supplier_email ;?>" aria-describedby="basic-addon1"/>
            </div>
            <hr class="hr" />
      
            <div class="form-group">
                <label for="title">Numéro du télephone</label>
                <input class="form-control"  type="text" placeholder="Numéro du télephone" name="supplier_num_tel" value="<?php echo $supplier_num_tel ;?>" aria-describedby="basic-addon1"/>
            </div>
            <hr class="hr" />
            <div class="form-group">
                <label for="title">Ville</label>
                <input class="form-control"  type="text" placeholder="Ville" name="supplier_city" value="<?php echo $supplier_city ;?>" aria-describedby="basic-addon1"/>
            </div>
            <hr class="hr" />
        
            
            <div class="form-group">
                <label for="title">Adresse</label>
                <input class="form-control"  type="text" placeholder="Adresse" name="supplier_adresse" value="<?php echo $supplier_adresse ;?>" aria-describedby="basic-addon1"/>
            </div>
            <hr class="hr" />
    <div class="form-group">
        <input class="btn btn-primary " type="submit" name="edit_supplier" value="submit">
    </div>
    <hr class="hr" />
</form>


</div>