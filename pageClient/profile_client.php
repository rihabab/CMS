<?php

if (isset($_GET['c_id'])) {
    $client_id = $_GET['c_id'];

    $query = "SELECT * FROM clients WHERE client_id=$client_id ";
    $get_client_query = mysqli_query($connection, $query);
    confirm($get_client_query);
    while ($row = mysqli_fetch_assoc($get_client_query)) {
        $client_ice = $row['client_ice'];
        $client_name = $row['client_name'];
        $client_email = $row['client_email'];
        $client_num_tel = $row['client_num_tel'];
        $client_city = $row['client_city'];
        $client_adresse = $row['client_adresse'];
    }
}


?>




<div class="container-fluid px-4">
    <h1 class="mt-4"><?php echo $client_name ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Entreprise cliente</li>
    </ol>
    <hr class="hr" />
    <div class="row mb-3">
        <div class="col-md-3">
            <label for="title"><b>Nom : </b><?php echo $client_name ?></label>

        </div>

        <div class="col-md-3">
            <label for="title"><b>ICE : </b><?php echo $client_ice ?></label>

        </div>



        <div class="col-md-3">
            <label for="title"><b>Email : </b><?php echo $client_email ?></label>

        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            <label for="title"><b>Numero du télephone : </b><?php echo $client_num_tel ?></label>

        </div>



        <div class="col-md-3">
            <label for="title"><b>Ville : </b><?php echo $client_city ?></label>

        </div>


        <div class="col-md-3">
            <label for="title"><b>Adresse : </b><?php echo $client_adresse ?></label>

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
$facture_titre_nom=$client_name;
$facture_titre_ice=$client_ice;


$query="SELECT * FROM facturetitre WHERE facture_titre_nom='$facture_titre_nom' AND facture_titre_ice='$facture_titre_ice'";
$get_facture_for_client=mysqli_query($connection,$query);
confirm($get_facture_for_client);
while ($row = mysqli_fetch_assoc($get_facture_for_client)) {
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