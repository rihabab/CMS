<?php

if (isset($_POST['add_devis'])) {


    $devis_supplier_name = $_POST['devis_fournisseur_name'];
    $devis_supplier_ice = $_POST['devis_fournisseur_ice'];
    $devis_date = $_POST['devis_date'];
    $devis_produit_label = $_POST['devis_label_produit'];
    $devis_produit_prix = $_POST['devis_produit_prix'];
    $devis_produit_type = $_POST['devis_produit_type'];
    $devis_q = $_POST['devis_q'];
    $devis_totale = $devis_produit_prix * $devis_q;



    $query = "INSERT INTO devis(devis_supplier_name,devis_supplier_ice, devis_date,devis_produit_label, devis_produit_prix,devis_produit_type, devis_produit_q,devis_totale) ";
    $query .= "VALUES('{$devis_supplier_name}','{$devis_supplier_ice}','{$devis_date}','{$devis_produit_label}','{$devis_produit_prix}','{$devis_produit_type}','{$devis_q}','{$devis_totale}') ";

    $create_devis_query = mysqli_query($connection, $query);

    confirm($create_devis_query);

    header("Location: devis.php?source=view");
}



?>










<div class="container-fluid px-4">
    <h1 class="mt-4">Devis</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Ajouter un devis</li>
    </ol>
    <hr class="hr" />

    <form action="" method="post" enctype="multipart/form-data">















        <div class="row mb-3">
            <div class="col-md-5">
                <label for="post_tags">Fournisseur</label>
                <div class="input-group mb-3">
                    <input type="int" class="form-control" name="devis_fournisseur_name">
                </div>

            </div>
            <div class="col-md-5">
                <label for="post_tags">ICE</label>
                <div class="input-group mb-3">
                    <input type="int" class="form-control" name="devis_fournisseur_ice">
                </div>

            </div>
        </div>




        <div id="myUL" style="padding:0px; margin:0px;">











            <div class="row mb-3 produit">

                <div class="col-md-5">
                    <label for="post_tags">Produit label</label>
                    <div class="input-group mb-3">

                        <input type="text" class="form-control" name="devis_label_produit">
                    </div>

                </div>
                <div class="col-md-2">
                    <label for="users">Prix du produit</label>
                    <div class="input-group mb-3">

                        <input type="int" class="form-control" name="devis_produit_prix">
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="users">Quantité du produit</label>
                    <div class="input-group mb-3">

                        <input type="int" class="form-control" name="devis_q">
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="users">unité</label>
                    <select name="devis_produit_type"  class="form-control" aria-label="Default select example" aria-describedby="basic-addon1">
                        <option value='unité'>unité</option>
                        <option value='Kg'>Kg</option>
                        <option value='L'>L</option>
                    </select>
                </div>
            </div>

        </div>





        <div class="row mb-3">
            <div class="col-md-2">
                <label for="users">Date de la devis</label>
                <div class="input-group mb-3">
                    <input type="date" class="form-control" name="devis_date">
                </div>

            </div>

        </div>




        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="add_devis" value="Ajouter devis">
        </div>


    </form>

</div>