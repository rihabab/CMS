<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Devis</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Toutes les devis</li>
        </ol>
        
        <div class="card mb-4">
        <hr class="hr" />
            <div class="card-header" id="">
            <i class="fa fa-usd" aria-hidden="true" style="padding-left:10px;"></i><i class="fa fa-usd" aria-hidden="true" style="padding-right:10px;"></i>
                Devis
                
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
                            <th>Fournisseur </th>
                            <th>ICE</th>
                            <th>Date</th>
                            <th>Produit label</th>
                            <th>Montant</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
if(isset($_SESSION['user_email'])){

    $query = "SELECT * FROM devis ";
    $get_devis_query = mysqli_query($connection , $query);
    confirm($get_devis_query);

    while($row = mysqli_fetch_assoc($get_devis_query)){
        $devis_id=$row['devis_id'];
        $devis_supplier_nom=$row['devis_supplier_name'];
        $devis_supplier_ice=$row['devis_supplier_ice'];
        $devis_date=$row['devis_date'];
        $devis_produit_label=$row['devis_produit_label'];
        $devis_totale=$row['devis_totale'];



        echo "<tr>";
        

        
        echo "<td><b><a href='devis.php?source=view_profile&d_id={$devis_id}' style='color: black;'>$devis_supplier_nom</a></b></td>";
        echo "<td>$devis_supplier_ice</td>";
        echo "<td>$devis_date</td>";
        echo "<td>$devis_produit_label </td>";
        echo "<td>$devis_totale MAD</td>";
        echo "<td><a href='devis.php?source=edit&d_id={$devis_id}'><i class='fa fa-pencil' aria-hidden='true'></i></a></td>";
        echo "<td><a href='devis.php?source=view&delete={$devis_id}'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>";
        echo "<tr>";
        
    }
  
}

?>
                   
<?php 

if(isset($_GET['delete'])){
    $the_devis_id= $_GET['delete'];




    $query = "DELETE FROM devis WHERE devis_id=$the_devis_id" ;
    $delete_query = mysqli_query($connection, $query);
    confirm($delete_query);

    header("Location: devis.php?source=view");



}
?>





                    
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</main>