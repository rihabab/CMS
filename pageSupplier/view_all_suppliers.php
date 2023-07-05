<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Fournisseurs</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Tous les fournisseurs</li>
        </ol>
        
        <div class="card mb-4">
        <hr class="hr" />
            <div class="card-header" id="">
                <i class="fa fa-shopping-cart" aria-hidden="true" ></i>
                Fournisseurs
                
                <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" style="float:right">
                    <div class="input-group">
                    <input type="search" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."  class="form-control">
                        <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </form>
                
            </div> 
            <hr class="hr" />

            <div class="container">
                
                
                <table class="table table-bordered"  id="myTable">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>ICE</th>
                            
                            <th>Montant non payé</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
if(isset($_SESSION['user_email'])){

    $query = "SELECT * FROM suppliers ";
    $get_suppliers_query = mysqli_query($connection , $query);
    confirm($get_suppliers_query);

    while($row = mysqli_fetch_assoc($get_suppliers_query)){
        $supplier_id=$row['supplier_id'];
        $supplier_name=$row['supplier_name'];
        $supplier_ice=$row['supplier_ice'];
        $supplier_num_tel=$row['supplier_num'];
        $supplier_email=$row['supplier_email'];
        $supplier_city=$row['supplier_city'];
        $supplier_adresse=$row['supplier_adresse'];


        
        $query="SELECT * FROM facture WHERE facture_part_nom='$supplier_name' AND facture_statut='non-payée' ";
        $get_facture_query = mysqli_query($connection , $query);
        confirm($get_facture_query);
        $facture_non_paye=0;
        while($row = mysqli_fetch_assoc($get_facture_query)){
            $facture_non_paye+=$row['facture_totale'];
        }



        echo "<tr>";
        echo "<td><a href='suppliers.php?source=view_supplier&s_id={$supplier_id}' style='color: black;'>$supplier_name</a></td>";
        echo "<td><a href='suppliers.php?source=view_supplier&s_id={$supplier_id}' style='color: black;'>$supplier_ice</a></td>";
       
        echo "<td>$facture_non_paye</td>";
        echo "<td><a href='suppliers.php?source=edit&s_id={$supplier_id}'><i class='fa fa-pencil' aria-hidden='true'></i></a></td>";
        echo "<td><a href='suppliers.php?source=view&delete={$supplier_id}'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>";
        echo "<tr>";
        
    }
  
}

?>
                   
<?php 

if(isset($_GET['delete'])){
    $the_supplier_id= $_GET['delete'];

    $query = "DELETE FROM suppliers WHERE supplier_id={$the_supplier_id}" ;
    $delete_query = mysqli_query($connection, $query);

    header("Location: suppliers.php?source=view");



}
?>





                    
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</main>