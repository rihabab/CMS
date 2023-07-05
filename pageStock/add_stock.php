<?php 

if(isset($_POST['create_produit'])){
    $produit_label=$_POST['produit_label'];
    $produit_reference=$_POST['produit_reference'];
    $produit_prix=$_POST['produit_prix'];

    $produit_image=$_FILES['image']['name'];
    $produit_image_temp=$_FILES['image']['tmp_name'];

    $produit_q_type=$_POST['produit_q_type'];
    $produit_q_dispo=$_POST['produit_q_dispo'];
    $produit_q_critique=$_POST['produit_q_critique'];

    move_uploaded_file($produit_image_temp, "images/$produit_image" );

    $query = "INSERT INTO produits(produit_label, produit_reference, produit_prix,produit_image,produit_q_type,produit_q_dispo,produit_q_critique) ";
    $query .= "VALUES('{$produit_label}','{$produit_reference}','{$produit_prix}','{$produit_image}','{$produit_q_type}','{$produit_q_dispo}', '{$produit_q_critique}') ";

    $create_produit_query= mysqli_query($connection, $query);

    confirm($create_produit_query);
    header("Location: stock.php?source=view");


}



?>

                

<div class="container-fluid px-4">
<h1 class="mt-4" >Stock</h1>
        <ol class="breadcrumb mb-4" >
            <li class="breadcrumb-item active">Ajouter un produit</li>
        </ol>
        <hr class="hr" />

<form action="" method="post" enctype="multipart/form-data">    
     
     
     <div class="form-group">
        <label for="title">Libellé du produit</label>
         <input type="text" class="form-control" name="produit_label">
     </div>

        
      

      <div class="form-group">
      <label for="users">Référence du produit</label>
      <input type="text" class="form-control" name="produit_reference">
      </div>





    
     

      <div class="form-group">
      <label for="users">Prix par unité</label>
      <input type="int" class="form-control" name="produit_prix">
     </div>
     
     
     
   <div class="form-group">
        <label for="post_image">Image du produit</label>
         <input type="file"  name="image">
     </div>


     <label for="post_tags">Quantité disponible</label>
     <div class="row mb-3">
        <div class="col-md-6">
            <div class="input-group mb-3">
            <input type="int" class="form-control" name="produit_q_dispo">
            </div>
            
        </div>
        <div class="col-md-2">
            <div class="input-group mb-3">
                <select name="produit_q_type" id="" class="form-control" aria-label="Default select example" aria-describedby="basic-addon1">
                    <option value="unité">unité</option>
                    <option value="kg">kg</option>
                    </select>
            </div>
        </div>
    </div>


     
     <div class="form-group">
        <label for="post_content">Quantité critique</label>
        <input type="int" class="form-control" name="produit_q_critique">
     </div>
     
     

      <div class="form-group">
         <input class="btn btn-primary" type="submit" name="create_produit" value="Add product">
     </div>


</form>

</div>