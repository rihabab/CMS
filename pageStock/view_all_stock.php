<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Stock</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Tous les produits</li>
        </ol>
        
        <div class="card mb-4">
        <hr class="hr" />
            <div class="card-header" id="">
                <i class="fa fa-shopping-cart" aria-hidden="true" ></i>
                Produits
                
                <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" style="float:right">
                    <div class="input-group">
                    <input type="search" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."  class="form-control">
                        <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </form>
                
            </div> 
            <hr class="hr" />

            <div >
                
                
                <table class="table table-bordered"  id="myTable">
                    <thead>
                        <tr>
                            <th>Libellé</th>
                            <th>Référence</th>
                            <th>Prix/unité</th>
                            <th>Image</th>
                            <th>Quantité disponible</th>
                            <th>à commander</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
if(isset($_SESSION['user_email'])){

    $query = "SELECT * FROM produits ";
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


        echo "<tr>";
        

        if($produit_q_dispo == 0 ){
            echo "<td><b><a href='stock.php?source=view_stock&p_id={$produit_id}' style='color: black;'><i class='fa fa-exclamation-triangle' style='color: #dc3545;padding:5px;' ></i>$produit_label</a></b></td>";
            echo "<td style='width:30%;'><a href='stock.php?source=view_stock&p_id={$produit_id}' style='color: black;'>$produit_reference</a></td>";
            echo "<td>$produit_prix</td>";
            echo "<td><img width='100' src='images/$produit_image' alt='image'></td>";
            echo "<td>$produit_q_dispo $produit_q_type</td>";
            echo "<td style='background-color: #dc3545;'><b>OUT OF STOCK</b></td>";
        }else if ($produit_q_dispo <= $produit_q_critique){
            echo "<td><b><a href='stock.php?source=view_stock&p_id={$produit_id}' style='color: black;'><i class='fa fa-exclamation-circle' style='color:  #ffc107;padding:5px;'></i>$produit_label</a></b></td>";
            echo "<td style='width:30%;'><a href='stock.php?source=view_stock&p_id={$produit_id}' style='color: black;'>$produit_reference</a></td>";
            echo "<td>$produit_prix</td>";
            echo "<td><img width='100' src='images/$produit_image' alt='image'></td>";
            echo "<td>$produit_q_dispo $produit_q_type</td>";
            echo "<td style='background-color: #ffc107;'><b>COMMANDEZ</b></td>";
        }else {
            echo "<td><b><a href='stock.php?source=view_stock&p_id={$produit_id}' style='color: black;'><i class='fa fa-check-circle-o' style='color:  #20c997;padding:5px;'></i>$produit_label</a></b></td>";
            echo "<td style='width:30%;'><a href='stock.php?source=view_stock&p_id={$produit_id}' style='color: black;'>$produit_reference</a></td>";
            echo "<td>$produit_prix</td>";
            echo "<td><img width='100' src='images/$produit_image' alt='image'></td>";
            echo "<td>$produit_q_dispo $produit_q_type</td>";
            echo "<td>disponible</td>";
        }


        
        echo "<td><a href='stock.php?source=edit&p_id={$produit_id}'><i class='fa fa-pencil' aria-hidden='true'></i></a></td>";
        echo "<td><a href='stock.php?source=view&delete={$produit_id}'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>";
        echo "<tr>";
        
    }
  
}

?>
                   
<?php 

if(isset($_GET['delete'])){
    $the_produit_id= $_GET['delete'];

    $query = "DELETE FROM produits WHERE produit_id={$the_produit_id}" ;
    $delete_query = mysqli_query($connection, $query);

    header("Location: stock.php?source=view");



}
?>





                    
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</main>