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

    <!-- <form action="pdf.php?f_id=<?php echo $the_facture_id; ?>" method="post" enctype="multipart/form-data"> -->
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

        <!-- Modal -->

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="display:flex;justify-content:center;">
                <div class="modal-content" style="width:500px;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">



                        <div class="container-fluid px-4">

                            <?php
                            if (isset($_POST['f_facture'])) {
                                $tva = $_POST['tva'];
                                $description = $_POST['description'];
                                $description = explode(" ", $description);

                                $description = implode(",", $description);

                                header("Location: pdf.php?f_id=$the_facture_id&tva=$tva&description=$description");
                            }

                            if (isset($_POST['p_facture'])) {
                                $tva = $_POST['tva'];
                                $description = $_POST['description'];
                                $description = explode(" ", $description);

                                $description = implode(",", $description);


                                echo "<script>
                                        //JavaScript function to be called
                                        function printFile(source,tva,description) {
                                            w = window.open('template.php?f_id='+encodeURIComponent(source)+'&tva='+encodeURIComponent(tva)+'&description='+encodeURIComponent(description));
                                            w.print();
                                          }
                                        
                                        // Call the function
                                        printFile($the_facture_id,$tva,'$description');
                                    </script>";
                            }


                            ?>

                            <form action="/" method="post" enctype="multipart/form-data">

                                <div class="row mb-3">

                                    <label for="post_tags">TVA</label>
                                    <div class="input-group mb-3">
                                        <input type="int" name="tva" value="20">
                                    </div>


                                </div>
                                <div class="row mb-3">

                                    <label for="post_tags">Description</label>
                                    <div class="input-group mb-3">
                                        <textarea name="description" rows="4" cols="100" maxlength="200" placeholder="Description"></textarea>
                                    </div>


                                </div>




                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="f_facture" value="Generer une facture" data-toggle="modal" data-target="#exampleModal">
                                </div>
                                <!-- 
                                                              
                                <div style="margin-left:15px;">
                                    <button onclick="printFile(<?php echo $the_facture_id ?>,20,'description')" class="btn btn-primary" type="submit" name="p_facture">Imprimer</button>

                                </div>  -->

                                <div style="margin-left:15px;">
                                    <button  class="btn btn-primary" type="submit" name="p_facture">Imprimer</button>

                                </div>



                            </form>

                        </div>
                    </div>




                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fin modal -->

        <!-- Button trigger modal -->
        <div class="row mb-3">
            <div style="margin-left:15px;">
                <input class="btn btn-primary" type="submit" name="create_facture" value="Generer une facture" data-toggle="modal" data-target="#exampleModal">
            </div>
        </div>

        <div class="row mb-3">

            <div style="margin-left:15px;">
                <input class="btn btn-primary" type="submit" value="Génerer">

            </div>


            <div style="margin-left:15px;">
                <button onclick="printFile(<?php echo $the_facture_id ?>)" class="btn btn-primary">Imprimer</button>

            </div>

        </div>


    </form>

</div>