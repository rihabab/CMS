<?php

if (isset($_GET['p_id'])) {
    $produit_id = $_GET['p_id'];

    $query = "SELECT * FROM produits WHERE produit_id=$produit_id ";
    $get_produit_query = mysqli_query($connection, $query);
    confirm($get_produit_query);
    while ($row = mysqli_fetch_assoc($get_produit_query)) {
        $produit_label = $row['produit_label'];
        $produit_reference = $row['produit_reference'];
        $produit_prix = $row['produit_prix'];
        $produit_image = $row['produit_image'];
        $produit_q_type = $row['produit_q_type'];
        $produit_q_dispo = $row['produit_q_dispo'];
        $produit_q_critique = $row['produit_q_critique'];
    }
}


?>




<div class="container-fluid px-4">
    <h1 class="mt-4"><?php echo $produit_label ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Produit</li>
    </ol>
    <hr class="hr" />

    <div class="container" style="display:flex;">
        <div class="col_5" style="margin-right:50px;">
            <img width="200" src="images/<?php echo $produit_image; ?>" alt="">

        </div>
        <div class="col-5">
            <div class="">
                <label for="title"><b>Label : </b><?php echo $produit_label ?></label>

            </div>

            <div class="">
                <label for="title"><b>Reference : </b><?php echo $produit_reference ?></label>

            </div>



            <div class="">
                <label for="title"><b>Prix/unité : </b><?php echo $produit_prix ?></label>

            </div>
        </div>
        <div class="col-5">
            <div class="">
                <label for="title"><b>Unité : </b><?php echo $produit_q_type ?></label>

            </div>



            <div class="">
                <label for="title"><b>Quantité disponible : </b><?php echo $produit_q_dispo ?></label>

            </div>


            <div class="">
                <label for="title"><b>Quantité critique : </b><?php echo $produit_q_critique ?></label>

            </div>

        </div>
    </div>
    <hr class="hr" />
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Historique des factures</li>
    </ol>
    <table class="table table-bordered" id="myTable">
        <thead>
            <tr>
                <th>Facture participant</th>
                <th>ICE</th>
                <th>Date</th>
                <th>Statut</th>
                <th>Quantité</th>
                <th>Montant</th>
                <th>Edit</th>
                <th>Delete</th>
                

                <!--                 
                <th>Ville</th>
                <th>Adresse</th>
                <th>Montant non payé </th> -->


            </tr>
        </thead>
        <tbody>
            <?php



            $facture_label_produit=$produit_label;


            $query="SELECT * FROM facture WHERE facture_label_produit='$facture_label_produit' ";
            $get_facture_for_produit=mysqli_query($connection,$query);
            confirm($get_facture_for_produit);
            while ($row = mysqli_fetch_assoc($get_facture_for_produit)) {
                $facture_id=$row['facture_id'];
                $facture_part_nom=$row['facture_part_nom'];
                $facture_part_ice=$row['facture_part_ice'];

                $facture_statut=$row['facture_statut'];
                $facture_date=$row['facture_date'];
                $facture_q=$row['facture_q'];
                
                $facture_totale=$row['facture_totale'];
                

                echo "<tr>";



                echo "<td><b><a href='facture.php?source=view&s_id={$facture_id}' style='color: black;'>$facture_part_nom</a></b></td>";
                echo "<td>$facture_part_ice </td>";

                echo "<td>$facture_date</td>";
                
                echo "<td>$facture_statut</td>";
                echo "<td>$facture_q</td>";
                echo "<td>$facture_totale MAD</td>";
                echo "<td><a href='facture.php?source=edit&f_id={$facture_id}'><i class='fa fa-pencil' aria-hidden='true'></i></a></td>";
                echo "<td><a href='facture.php?source=view&'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>";
                echo "<tr>";

            }





            ?>
        </tbody>
    </table>
</div>