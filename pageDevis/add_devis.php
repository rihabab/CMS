<?php

if (isset($_POST['add_devis'])) {


    $devis_supplier_name = $_POST['devis_fournisseur_name'];
    $devis_supplier_ice = $_POST['devis_fournisseur_ice'];
    $devis_date = $_POST['devis_date'];
    $devis_produit_label = $_POST['devis_label_produit'];
    $devis_produit_prix = $_POST['devis_produit_prix'];
    $devis_q = $_POST['devis_q'];
    $devis_totale = $devis_produit_prix * $devis_q;



    $query = "INSERT INTO devis(devis_supplier_name,devis_supplier_ice, devis_date,devis_produit_label, devis_produit_prix, devis_produit_q,devis_totale) ";
    $query .= "VALUES('{$devis_supplier_name}','{$devis_supplier_ice}','{$devis_date}','{$devis_produit_label}','{$devis_produit_prix}','{$devis_q}','{$devis_totale}') ";

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
                <div class="col-md-3">
                    <label for="users">Prix du produit</label>
                    <div class="input-group mb-3">

                        <input type="int" class="form-control" name="devis_produit_prix">
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="users">Quantité du produit</label>
                    <div class="input-group mb-3">

                        <input type="int" class="form-control" name="devis_q">
                    </div>
                </div>
            </div>

        </div>



        <!-- Button trigger modal -->

        <!-- 

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
</button> -->

        <!-- Modal -->
        <!-- 
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="margin-left:50px;">
        <div class="modal-content" style="width:800px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>

            <div class="container-fluid px-4">


                <form action="" method="post" enctype="multipart/form-data">






                    <div class="row mb-3">

                        <div class="col-md-5">
                            <label for="post_tags">Produit label</label>
                            <div class="input-group mb-3">

                                <input type="text" class="form-control" name="facture_label_produit">
                            </div>

                        </div>
                        <div class="col-md-3">
                            <label for="users">Prix du produit</label>
                            <div class="input-group mb-3">

                                <input type="int" class="form-control" name="produit_reference">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="users">Quantité du produit</label>
                            <div class="input-group mb-3">

                                <input type="int" class="form-control" name="produit_reference">
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="create_facture" value="Add facture">
                    </div>


                </form>

            </div>




            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div> -->

        <!-- Fin modal -->









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