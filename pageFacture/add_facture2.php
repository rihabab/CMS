<?php

if (isset($_POST['create_facture'])) {
    
    
    $facture_part_nom = $_POST['facture_part_nom'];
    $facture_part_ice = $_POST['facture_part_ice'];
    $facture_date=$_POST['facture_date'];
    if(isset($_POST['payed'])){
        $facture_statut='payée';
    }else{
        $facture_statut='non-payée';
    }
    $facture_totale=0;
    for($i = 0; $i <= 10; $i++){
        if(isset($_POST['facture_label_produit' . $i ])){
            $facture_label_produit =$_POST['facture_label_produit' . $i ];
            $facture_produit_prix =$_POST['facture_produit_prix' . $i ];
            $facture_q =$_POST['facture_q' . $i ];
            $facture_totale = $facture_q * $facture_produit_prix ;
            

            $query = "INSERT INTO facture(facture_part_nom,facture_part_ice, facture_statut,facture_date,facture_label_produit,facture_produit_prix,facture_q,facture_totale) ";
            $query .= "VALUES('{$facture_part_nom}','{$facture_part_ice}','{$facture_statut}','{$facture_date}','{$facture_label_produit}',{$facture_produit_prix}, {$facture_q},{$facture_totale}) ";

            $create_facture_query= mysqli_query($connection, $query);

            confirm($create_facture_query);

        }
    }


    $query = "SELECT * FROM suppliers WHERE supplier_ice='$facture_part_ice'";
    $get_part_query = mysqli_query($connection, $query);
    confirm($get_part_query);
    if(mysqli_num_rows($get_part_query)!=0){

        $query = "INSERT INTO facturetitre(facture_titre_nom,facture_titre_ice, facture_titre_date,facture_status) ";
        $query .= "VALUES('{$facture_part_nom}','{$facture_part_ice}','{$facture_date}','{$facture_statut}') ";
    
        $create_facturetitre_query= mysqli_query($connection, $query);
    
        confirm($create_facturetitre_query);

    }else {
        
    $query = "SELECT * FROM clients WHERE client_ice='$facture_part_ice'";
    $get_part_query = mysqli_query($connection, $query);
    confirm($get_part_query);
    if(mysqli_num_rows($get_part_query)!=0){
    while ($row = mysqli_fetch_assoc($get_part_query)) {
        
        $query = "INSERT INTO facturetitre(facture_titre_nom,facture_titre_ice, facture_titre_date,facture_status) ";
        $query .= "VALUES('{$facture_part_nom}','{$facture_part_ice}','{$facture_date}','{$facture_statut}') ";

        $create_facturetitre_query= mysqli_query($connection, $query);

        confirm($create_facturetitre_query);
        
    }
}else{
    echo "ice not found";
    }
}









    
    
}



?>


<?php
/*

if (isset($_GET['variable'])) {
    $receivedVariable = $_GET['variable'];
    // Rest of your code
} else {
    echo "Variable is not set.";
}
echo $_GET['variable'];
error_reporting(E_ALL);
ini_set('display_errors', 1);
*/

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
                    <input type="int" class="form-control" name="facture_part_nom">
                </div>

            </div>
            <div class="col-md-5">
                <label for="post_tags">ICE</label>
                <div class="input-group mb-3">
                    <input type="int" class="form-control" name="facture_part_ice">
                </div>

            </div>
        </div>


<!-- 

        <div class="todo">
            <div id="myDIV" class="header">
                <h2>My To Do List</h2>
                <input type="text" id="myInput" placeholder="Title...">
                <span onclick="newElement()" class="addBtn">Add</span>
            </div>



            <ul id="myUL">

            </ul>
        </div> -->


        

        <div id="myUL" style="padding:0px; margin:0px;">

        









        <div class="row mb-3 produit">

            <div class="col-md-5">
                <label for="post_tags">Produit label</label>
                <div class="input-group mb-3">

                    <input type="text" class="form-control" name="facture_label_produit0">
                </div>

            </div>
            <div class="col-md-3">
                <label for="users">Prix du produit</label>
                <div class="input-group mb-3">

                    <input type="int" class="form-control" name="facture_produit_prix0">
                </div>
            </div>
            <div class="col-md-3">
                <label for="users">Quantité du produit</label>
                <div class="input-group mb-3">

                    <input type="int" class="form-control" name="facture_q0">
                </div>
            </div>
        </div>

        </div>
        
        <span onclick="newElement()" class="addBtn btn btn-primary" type="submit" >Add</span>





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
                <label for="users">Date de la facture</label>
                <div class="input-group mb-3">
                    <input type="date" class="form-control" name="facture_date">
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
            <input class="btn btn-primary" type="submit" name="create_facture" value="Add facture">
        </div>


    </form>

</div>