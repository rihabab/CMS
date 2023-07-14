<?php 

if(isset($_POST['add_supplier'])){
    $supplier_name=$_POST['supplier_name'];
    $supplier_ice=$_POST['supplier_ice'];
    $supplier_email=$_POST['supplier_email'];
    $supplier_num_tel=$_POST['supplier_num_tel'];
    $supplier_city=$_POST['supplier_city'];
    $supplier_adresse=$_POST['supplier_adresse'];
    
    

    $query = "INSERT INTO suppliers( supplier_name, supplier_ice, supplier_num, supplier_email, supplier_city, supplier_adresse) ";
    $query .= "VALUES('{$supplier_name}','{$supplier_ice}','{$supplier_num_tel}','{$supplier_email}','{$supplier_city}','{$supplier_adresse}' ) ";

    $insert_supplier_query= mysqli_query($connection, $query);

    confirm($insert_supplier_query);
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
                <input class="form-control"  type="text" placeholder="Nom" name="supplier_name" aria-describedby="basic-addon1"/>
            </div>
            <hr class="hr" />
       
            
            <div class="form-group">
                <label for="title">ICE</label>
                <input class="form-control"  type="text" placeholder="ICE" name="supplier_ice" aria-describedby="basic-addon1"/>
            </div>
            <hr class="hr" />
            <div class="form-group">
                <label for="title">Email</label>
                <input class="form-control"  type="email" placeholder="Email address" name="supplier_email" aria-describedby="basic-addon1"/>
            </div>
            <hr class="hr" />
      
            <div class="form-group">
                <label for="title">Numéro du télephone</label>
                <input class="form-control"  type="text" placeholder="Numéro du télephone" name="supplier_num_tel" aria-describedby="basic-addon1"/>
            </div>
            <hr class="hr" />
            <div class="form-group">
                <label for="title">Ville</label>
                <input class="form-control"  type="text" placeholder="Ville" name="supplier_city" aria-describedby="basic-addon1"/>
            </div>
            <hr class="hr" />
        
            
            <div class="form-group">
                <label for="title">Adresse</label>
                <input class="form-control"  type="text" placeholder="Adresse" name="supplier_adresse" aria-describedby="basic-addon1"/>
            </div>
            <hr class="hr" />
    <div class="form-group">
        <input class="btn btn-primary " type="submit" name="add_supplier" value="submit">
    </div>
    <hr class="hr" />
</form>


</div>