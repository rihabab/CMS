<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Facture</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Toutes les factures</li>
        </ol>

        <div class="card mb-4">
            <hr class="hr" />
            <div class="card-header" id="">
                <i class="fa fa-usd" aria-hidden="true" style="padding-left:10px;"></i><i class="fa fa-usd" aria-hidden="true" style="padding-right:10px;"></i>
                Facture

                <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" style="float:right">
                    <div class="input-group">
                        <input type="search" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." class="form-control">
                        <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </form>

            </div>
            <hr class="hr" />

            <div>


                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>ICE</th>
                            <th>Date</th>
                            <th>Montant de la facture</th>
                            <th>Status</th>

<?php 
if ($user_role == 'admin') {
    echo "<th>Edit</th>";
    echo "<th>Delete</th>";
}


?>



                            
                            

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_SESSION['user_email'])) {

                            $query = "SELECT * FROM facturetitre ";
                            $get_facturetitre_query = mysqli_query($connection, $query);
                            confirm($get_facturetitre_query);

                            while ($row = mysqli_fetch_assoc($get_facturetitre_query)) {
                                $facture_titre_id = $row['facture_titre_id'];
                                $facture_titre_nom = $row['facture_titre_nom'];
                                $facture_titre_ice = $row['facture_titre_ice'];
                                $facture_titre_date = $row['facture_titre_date'];
                                $facture_status = $row['facture_status'];

                                $query = "SELECT * FROM facture WHERE facture_part_nom='$facture_titre_nom' AND facture_date='$facture_titre_date' ";
                                $get_facture_query = mysqli_query($connection, $query);
                                confirm($get_facture_query);
                                $facture_totale_facture = 0;
                                while ($row = mysqli_fetch_assoc($get_facture_query)) {

                                    $facture_totale_facture += $row['facture_totale'];
                                }



                                echo "<tr>";



                                echo "<td><b><a href='facture.php?source=view_profile&f_id={$facture_titre_id}' style='color: black;'>$facture_titre_nom</a></b></td>";
                                echo "<td>$facture_titre_ice</td>";
                                echo "<td>$facture_titre_date</td>";
                                echo "<td>$facture_totale_facture MAD</td>";
                                echo "<td>$facture_status</td>";


                                if ($user_role == 'admin') {
                                    echo "<td><a href='facture.php?source=edit&f_id={$facture_titre_id}'><i class='fa fa-pencil' aria-hidden='true'></i></a></td>";
                                    echo "<td><a href='facture.php?source=view&delete={$facture_titre_id}'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>";
                                }





                                echo "<tr>";
                            }
                        }

                        ?>

                        <?php

                        if (isset($_GET['delete'])) {
                            $the_facture_id = $_GET['delete'];

                            $query = "SELECT * FROM facturetitre WHERE facture_titre_id=$the_facture_id";
                            $get_facturetitre_query = mysqli_query($connection, $query);
                            confirm($get_facturetitre_query);

                            while ($row = mysqli_fetch_assoc($get_facturetitre_query)) {
                                $facture_titre_id = $row['facture_titre_id'];
                                $facture_titre_nom = $row['facture_titre_nom'];
                                $facture_titre_ice = $row['facture_titre_ice'];
                                $facture_titre_date = $row['facture_titre_date'];
                                $facture_status = $row['facture_status'];
                            }

                            $query = "DELETE FROM facture WHERE facture_part_nom='$facture_titre_nom' AND facture_date='$facture_titre_date' ";
                            $delete_facture_query = mysqli_query($connection, $query);
                            confirm($delete_facture_query);






                            $query = "DELETE FROM facturetitre WHERE facture_titre_id='{$facture_titre_id}'";
                            $delete_query = mysqli_query($connection, $query);
                            confirm($delete_query);

                            header("Location: facture.php?source=view");
                        }
                        ?>






                    </tbody>
                </table>
            </div>


        </div>
    </div>
</main>