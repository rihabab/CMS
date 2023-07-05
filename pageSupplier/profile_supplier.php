<?php

if (isset($_GET['s_id'])) {
    $supplier_id = $_GET['s_id'];

    $query = "SELECT * FROM suppliers WHERE supplier_id=$supplier_id ";
    $get_supplier_query = mysqli_query($connection, $query);
    confirm($get_supplier_query);
    while ($row = mysqli_fetch_assoc($get_supplier_query)) {
        $supplier_ice = $row['supplier_ice'];
        $supplier_name = $row['supplier_name'];
        $supplier_email = $row['supplier_email'];
        $supplier_num = $row['supplier_num'];
        $supplier_city = $row['supplier_city'];
        $supplier_adresse = $row['supplier_adresse'];
    }
}


?>




<div class="container-fluid px-4">
    <h1 class="mt-4"><?php echo $supplier_name ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Entreprise fournisseuse</li>
    </ol>
    <hr class="hr" />
    <div class="row mb-3">
        <div class="col-md-3">
            <label for="title"><b>Nom : </b><?php echo $supplier_name ?></label>

        </div>

        <div class="col-md-3">
            <label for="title"><b>ICE : </b><?php echo $supplier_ice ?></label>

        </div>



        <div class="col-md-3">
            <label for="title"><b>Email : </b><?php echo $supplier_email ?></label>

        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            <label for="title"><b>Numero du télephone : </b><?php echo $supplier_num ?></label>

        </div>



        <div class="col-md-3">
            <label for="title"><b>Ville : </b><?php echo $supplier_city ?></label>

        </div>


        <div class="col-md-3">
            <label for="title"><b>Adresse : </b><?php echo $supplier_adresse ?></label>

        </div>

    </div>
    <hr class="hr" />
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Historique des factures</li>
    </ol>
    <table class="table table-bordered" id="myTable">
        <thead>
            <tr>
                <th>Facture</th>
                <th>Montant</th>
                <th>Date</th>
                <th>Statut</th>

<!--                 
                <th>Ville</th>
                <th>Adresse</th>
                <th>Montant non payé </th> -->


            </tr>
        </thead>
        <tbody>
<?php 
$facture_titre_nom=$supplier_name;
$facture_titre_ice=$supplier_ice;


$query="SELECT * FROM facturetitre WHERE facture_titre_nom='$facture_titre_nom' AND facture_titre_ice='$facture_titre_ice'";
$get_facture_for_supplier=mysqli_query($connection,$query);
confirm($get_facture_for_supplier);
while ($row = mysqli_fetch_assoc($get_facture_for_supplier)) {
    $facture_titre_id=$row['facture_titre_id'];
    $facture_titre_date=$row['facture_titre_date'];
    $facture_status=$row['facture_status'];


    $query = "SELECT * FROM facture WHERE facture_part_nom='$facture_titre_nom' AND facture_date='$facture_titre_date' ";
    $get_facture_query = mysqli_query($connection , $query);
    confirm($get_facture_query);
    $facture_totale_facture=0;
    while($row = mysqli_fetch_assoc($get_facture_query)){
        
        $facture_totale_facture+= $row['facture_totale'];
        
    }

    echo "<tr>";
        

        
    echo "<td><b><a href='facture.php?source=view&s_id={$facture_titre_id}' style='color: black;'>$facture_titre_id</a></b></td>";
    echo "<td>$facture_totale_facture MAD</td>";
    
    echo "<td>$facture_titre_date</td>";
    
    echo "<td>$facture_status</td>";
    echo "<td><a href='facture.php?source=edit&f_id={$facture_titre_id}'><i class='fa fa-pencil' aria-hidden='true'></i></a></td>";
    echo "<td><a href='facture.php?source=view&delete={$facture_titre_id}'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>";
    echo "<tr>";

}





?>
        </tbody>
    </table>
</div>