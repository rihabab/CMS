<?php

// getting the info for the page from the backend
if (isset($_GET['f_id'])) {
    $the_facture_id = $_GET['f_id'];
    $query = "SELECT * FROM facturetitre WHERE facture_titre_id='$the_facture_id'";
    $get_facturetitre_query = mysqli_query($connection, $query);
    confirm($get_facturetitre_query);
    while ($row = mysqli_fetch_assoc($get_facturetitre_query)) {
        $facture_titre_nom = $row['facture_titre_nom'];
        $facture_titre_ice = $row['facture_titre_ice'];
        $facture_titre_date = $row['facture_titre_date'];
        $facture_status = $row['facture_status'];
    }
}
?>








<div class="container-fluid px-4">
    <h1 class="mt-4">Facture</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Ajouter une facture</li>
    </ol>
    <hr class="hr" />

    <form action="" method="post" enctype="multipart/form-data">





        <div class="row mb-3">
            <div class="col-md-5">
                <label for="post_tags">Nom</label>
                <div class="input-group mb-3">
                    <input type="int" class="form-control" name="facture_part_nom" <?php echo "value='$facture_titre_nom'" ?>>
                </div>

            </div>
            <div class="col-md-5">
                <label for="post_tags">ICE</label>
                <div class="input-group mb-3">
                    <input type="int" class="form-control" name="facture_part_ice" value="<?php echo $facture_titre_ice ?>">
                </div>

            </div>
        </div>



        <?php

        $emptyArray = [];
        $j = 0;

        $query = "SELECT * FROM facture WHERE facture_part_nom='$facture_titre_nom' AND facture_date='$facture_titre_date' ";
        $get_facture_query = mysqli_query($connection, $query);
        confirm($get_facture_query);

        // desplaying the products

        while ($row = mysqli_fetch_assoc($get_facture_query)) {
            array_push($emptyArray, $row['facture_id']);
            //echo $row['facture_id'];
            $facture_label_produit = $row['facture_label_produit'];
            $facture_produit_prix = $row['facture_produit_prix'];
            $facture_q = $row['facture_q'];
            $facture_q_type = $row['facture_q_type'];


            echo "
    
    <div class='row mb-3'>

            <div class='col-md-5'>
                <label for='post_tags'>Produit label</label>
                <div class='input-group mb-3'>

                    <input type='text' class='form-control' name='facture_label_produit$j' value='$facture_label_produit'>
                </div>

            </div>
            <div class='col-md-2'>
                <label for='users'>Prix du produit</label>
                <div class='input-group mb-3'>

                    <input type='int' class='form-control' name='facture_produit_prix$j' value='$facture_produit_prix'>
                </div>
            </div>
            <div class='col-md-2'>
                <label for='users'>Quantité du produit</label>
                <div class='input-group mb-3'>

                    <input type='int' class='form-control' name='facture_q$j'  value='$facture_q'>
                </div>
            </div>
            <div class='col-md-2'>
                    <label for='user'>unité</label>
                    <select name='facture_q_type$j'  class='form-control' aria-label='Default select example' aria-describedby='basic-addon1'>
                        <option value='$facture_q_type'>$facture_q_type</option>
                        <option value='unité'>unité</option>
                        <option value='Kg'>Kg</option>
                        <option value='L'>L</option>
                    </select>
                </div>
        </div>
    
    
    
    
    
    
    
    
    ";
            $j++;
        }



        ?>














        <div class="row mb-3">
            <div class="col-md-2">
                <label for="users">Date de la facture</label>
                <div class="input-group mb-3">
                    <input type="date" class="form-control" name="facture_date" <?php echo "value='$facture_titre_date'"; ?>>
                </div>

            </div>
            <div class="col-md-2">
                <label for="users">payée</label>
                <div class="input-group mb-3">
                    <label class="toggle-switch">
                        <input type="checkbox" name="payed">
                        <span class="slider"></span>
                    </label>
                </div>
            </div>
        </div>




        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="update_facture" value="update facture">
        </div>


    </form>

</div>


<?php

// updating the facture


if (isset($_POST['update_facture'])) {

    $facture_part_nom = $_POST['facture_part_nom'];
    $facture_part_ice = $_POST['facture_part_ice'];
    $facture_date = $_POST['facture_date'];
    if (isset($_POST['payed'])) {
        $facture_statut = 'payée';
    } else {
        $facture_statut = 'non-payée';
    }


    for ($i = 0; $i <= $j; $i++) {

        if (isset($_POST['facture_label_produit' . $i])) {

            if (isset($emptyArray[$i])) {

                $facture_id = $emptyArray[$i];

                $facture_label_produit = $_POST['facture_label_produit' . $i];
                $facture_produit_prix = $_POST['facture_produit_prix' . $i];
                $facture_q = $_POST['facture_q' . $i];
                $facture_q_type = $_POST['facture_q_type' . $i];
                $facture_totale = $facture_q * $facture_produit_prix;

                $query  = "UPDATE facture SET ";
                $query .= "facture_part_nom = '{$facture_part_nom}', ";
                $query .= "facture_part_ice       = '{$facture_part_ice}', ";
                $query .= "facture_statut       = '{$facture_statut}', ";
                $query .= "facture_date      = '{$facture_date}', ";
                $query .= "facture_label_produit      = '{$facture_label_produit}', ";
                $query .= "facture_produit_prix        = {$facture_produit_prix}, ";
                $query .= "facture_q_type        = '{$facture_q_type}', ";
                $query .= "facture_q        = {$facture_q}, ";
                $query .= "facture_totale     = {$facture_totale}  ";
                $query .= "WHERE facture_id   = {$facture_id} ";
               

                $update_facture_query = mysqli_query($connection, $query);

                confirm($update_facture_query);
            } else {
                echo "     not set";
            }
        }
    }



    $query = "UPDATE facturetitre SET ";
    $query .= "facture_titre_nom        = '{$facture_part_nom}', ";
    $query .= "facture_titre_ice        = '{$facture_part_ice}', ";
    $query .= "facture_titre_date        = '{$facture_date}', ";
    $query .= "facture_status     = '{$facture_statut}'  ";
    $query .= "WHERE facture_titre_id   = {$the_facture_id} ";


    $update_facturetitre_query = mysqli_query($connection, $query);

    confirm($update_facturetitre_query);
    header("Refresh:0");
}



?>