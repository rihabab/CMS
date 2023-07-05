
<?php 

if(isset($_GET['p_id'])){
    $the_produit_id = $_GET['p_id'];
}


$query = "SELECT * FROM produits WHERE produit_id=$the_produit_id ";
$get_produits_query = mysqli_query($connection , $query);
confirm($get_produits_query);

while($row = mysqli_fetch_assoc($get_produits_query)){
    $produit_id=$row['produit_id'];
    $produit_label=$row['produit_label'];
    $produit_reference=$row['produit_reference'];
    $produit_prix=$row['produit_prix'];
    $produit_image=$row['produit_image'];
    $produit_q_type=$row['produit_q_type'];
    $produit_q_dispo=$row['produit_q_dispo'];
    $produit_q_critique=$row['produit_q_critique'];
  
}

if(isset($_POST['update_produit'])){
    global $the_produit_id;
    $produit_label=$_POST['produit_label'];
    $produit_reference=$_POST['produit_reference'];
    $produit_prix=$_POST['produit_prix'];

    $produit_image=$_FILES['image']['name'];
    $produit_image_temp=$_FILES['image']['tmp_name'];

    $produit_q_type=$_POST['produit_q_type'];
    $produit_q_dispo=$_POST['produit_q_dispo'];
    $produit_q_critique=$_POST['produit_q_critique'];


    move_uploaded_file($produit_image_temp, "../images/$produit_image" );
    
    if(empty($produit_image)){

        $query = "SELECT * FROM produits WHERE produit_id=$the_produit_id ";
        $select_image = mysqli_query($connection , $query);

        while($row = mysqli_fetch_array($select_image)){
            $produit_image=$row['produit_image'];
        }
    }



    $query  = "UPDATE produits SET ";
    $query .="produit_label       = '{$produit_label}', ";
    $query .="produit_reference = '{$produit_reference}', ";
    $query .="produit_prix       = '{$produit_prix}', ";
    $query .="produit_image      = '{$produit_image}', ";
    $query .="produit_q_type      = '{$produit_q_type}', ";
    $query .="produit_q_dispo        = {$produit_q_dispo}, ";
    $query .="produit_q_critique     = {$produit_q_critique}  ";
    $query .= "WHERE produit_id   = {$the_produit_id} ";
  
    $update_post = mysqli_query($connection, $query);
    confirm($update_post);
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
         <input type="text" class="form-control" name="produit_label" value="<?php echo $produit_label ;?>">
     </div>

        
      

      <div class="form-group">
      <label for="users">Référence du produit</label>
      <input type="text" class="form-control" name="produit_reference" value="<?php echo $produit_reference ;?>">
      </div>





    
     

      <div class="form-group">
      <label for="users">Prix par unité</label>
      <input type="int" class="form-control" name="produit_prix" value="<?php echo $produit_prix ;?>">
     </div>
     
     
     
   <div class="form-group">
        <label for="produit_image">Image du produit</label>
        <img width="100" src="images/<?php echo $produit_image ;?>" alt="">
        <input  type="file" name="image">
    </div>


     <label for="post_tags">Quantité disponible</label>
     <div class="row mb-3">
        <div class="col-md-6">
            <div class="input-group mb-3">
            <input type="int" class="form-control" name="produit_q_dispo" value="<?php echo $produit_q_dispo ;?>">
            </div>
            
        </div>
        <div class="col-md-1">
            <div class="input-group mb-3">
                <select name="produit_q_type" id="" class="form-control" aria-label="Default select example" aria-describedby="basic-addon1">
                    <option value="<?php echo $produit_q_type ;?>"><?php echo $produit_q_type ;?></option>
                    <option value="unité">unité</option>
                    <option value="kg">kg</option>
                    </select>
            </div>
        </div>
    </div>


     
     <div class="form-group">
        <label for="post_content">Quantité critique</label>
        <input type="int" class="form-control" name="produit_q_critique" value="<?php echo $produit_q_critique ;?>">
     </div>
     
     

      <div class="form-group">
         <input class="btn btn-primary" type="submit" name="update_produit" value="update product">
     </div>


</form>

</div>