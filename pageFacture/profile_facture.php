<?php
$j = 0;
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

    <form action="pdf.php?f_id=<?php echo $the_facture_id ;?>" method="post" enctype="multipart/form-data">




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
        

        $query = "SELECT * FROM facture WHERE facture_part_nom='$facture_titre_nom' AND facture_date='$facture_titre_date' ";
        $get_facture_query = mysqli_query($connection, $query);
        confirm($get_facture_query);



        while ($row = mysqli_fetch_assoc($get_facture_query)) {
            array_push($emptyArray, $row['facture_id']);
            //echo $row['facture_id'];
            $facture_label_produit = $row['facture_label_produit'];
            $facture_produit_prix = $row['facture_produit_prix'];
            $facture_q = $row['facture_q'];


            echo "
    
    <div class='row mb-3'>

            <div class='col-md-5'>
                <label for='post_tags'>Produit label</label>
                <div class='input-group mb-3'>

                    <input type='text' class='form-control' name='facture_label_produit$j' value='$facture_label_produit'>
                </div>

            </div>
            <div class='col-md-3'>
                <label for='users'>Prix du produit</label>
                <div class='input-group mb-3'>

                    <input type='int' class='form-control' name='facture_produit_prix$j' value='$facture_produit_prix'>
                </div>
            </div>
            <div class='col-md-3'>
                <label for='users'>Quantité du produit</label>
                <div class='input-group mb-3'>

                    <input type='int' class='form-control' name='facture_q$j'  value='$facture_q'>
                </div>
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
            <input class="btn btn-primary" type="submit"  value="Génerer">

        </div>

        
        <div class="form-group">
        <button onclick="printFile(<?php echo $the_facture_id?>)" class="btn btn-primary">Print</button>

        </div>




    </form>

</div>