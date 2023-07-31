<?php include "includes/db.php" ?>
<?php ob_start() ?>
<?php include "includes/functions.php" ?>

<?php
$j = 0;
$facture_totalet = 0;
if (isset($_GET['f_id'])) {


    $tva=$_GET['tva'];
    $description=$_GET['description'];
    $description = explode(",", $description); // Split the string into an array of words

    $description = implode(" ", $description);


    $part_adresse = "undef";
    $part_city = "undef";
    $the_facture_id = $_GET['f_id'];
    $query = "SELECT * FROM facturetitre WHERE facture_titre_id='$the_facture_id'";
    $get_facturetitre_query = mysqli_query($connection, $query);
    confirm($get_facturetitre_query);
    while ($row = mysqli_fetch_assoc($get_facturetitre_query)) {
        $facture_titre_nom = $row['facture_titre_nom'];
        $facture_titre_ice = $row['facture_titre_ice'];
        $facture_titre_date = $row['facture_titre_date'];
        $facture_status = $row['facture_status'];
        $facture_devis_id=$row['facture_devis_id'];
    }

    $query = "SELECT * FROM suppliers WHERE supplier_ice='$facture_titre_ice'";
    $get_part_query = mysqli_query($connection, $query);
    confirm($get_part_query);
    if (mysqli_num_rows($get_part_query) != 0) {

        while ($row = mysqli_fetch_assoc($get_part_query)) {
            $part_adresse = $row['supplier_adresse'];
            $part_city = $row['supplier_city'];
        }
    } else {
        $query = "SELECT * FROM clients WHERE client_ice='$facture_titre_ice'";
        $get_part_query = mysqli_query($connection, $query);
        confirm($get_part_query);
        if (mysqli_num_rows($get_part_query) != 0) {
            while ($row = mysqli_fetch_assoc($get_part_query)) {
                $part_adresse = $row['client_adresse'];
                $part_city = $row['client_city'];
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        body {
            color: black;
            font-size: 12px;
        }

        table {
            width: 100%;
        }

        footer {
            text-align: center;
            font-style: italic;
        }

        #def {
            display: flex;
            flex-direction: row;
            color: red;
        }
    </style>
</head>

<body>
    <img style="width:100px;" src="logo.jpg" alt="">
    <p>TIC Escort</p>
    <p>47, Av. Lalla Yacout. Etage 5,</p>
    <p>Casablanca</p>
    <p>Maroc</p>

    <div style="display:flex; flex-direction:row;">
        <table>
            <tbody>
                <td>
                    <div class="facture">
                        <h4>Facture <?php echo $the_facture_id ?>/2023</h4>
                        <h6>Date de la facture :</h6>
                        <p><?php echo $facture_titre_date ?></p>
                    </div>
                </td>
                <td>
                    <div class="right">
                        <div class="tablet">
                            <p><?php echo $facture_titre_nom ?></p>
                            <p><?php echo $facture_titre_ice ?></p>
                        </div>
                        <div>Adresse de facturation :</div>
                        <div class="tablet">
                            <?php echo $part_adresse ?>
                        </div>
                        <div class="tablet">
                            Devis N <?php 
                            if($facture_devis_id=null){
                                echo "XX" ;
                            }else{
                                echo $the_facture_id;
                            }
                            
                            ?>
                        </div>
                        <div class="tablet">
                            Bon de commande N XX
                        </div>


                    </div>
                </td>
            </tbody>
        </table>

    </div><br>


        <h6>Description:<?php echo $description ?></h6><br><br>

    <table class="table table-bordered">
        <thead>
            <tr style="background-color:rgb(14, 96, 134);color:white;">
                <th>Produit</th>
                <th>Quantité</th>
                <th>Unité</th>
                <th>Prix unitaire</th>
                <th>Prix</th>
            </tr>
        </thead>
        <tbody>
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
                $facture_q_type = $row['facture_q_type'];
                $facture_q = $row['facture_q'];
                $facture_totale = $row['facture_totale'];
                $facture_totalet += $facture_totale;

                echo "<tr>";
                echo "<td><b>$facture_label_produit</b></td>";
                echo "<td >$facture_q </td>";
                echo "<td >$facture_q_type</td>";
                echo "<td >$facture_produit_prix ,00</td>";
                echo "<td>$facture_totale ,00</td>";

                echo "</tr>";

                $j++;
            }


            ?>
        </tbody>
    </table>
    <table style="margin-left:70%; width:200px;">
        <tbody>
            <tr>
                <th style="background-color: rgb(29, 136, 202);color:white;border: 2px solid white;"> Total HT </th>
                <th style="text-align:end;font-family: 'Courier New', Courier, monospace;"><?php echo $facture_totalet; ?>,00 MAD</th>
            </tr>
            <tr>
                <th style="background-color: rgb(29, 136, 202);color:white;border: 2px solid white;">TVA <?php echo $tva; ?>%</th>
                <th style="text-align:end;font-family: 'Courier New', Courier, monospace;"><?php echo $newp=$facture_totalet*$tva ; ?> MAD</th>
            </tr>
            <tr>
                <th style="background-color: rgb(29, 136, 202);color:white;border: 2px solid white;"><h6>Total TTC</h6></th>
                <th style="text-align:end;font-family: 'Courier New', Courier, monospace;font-size:15px;"><?php echo $newp+$facture_totalet; ?> MAD</th>
            </tr>
        </tbody>
    </table>




    <footer>
        <p>TIC ESCORT; RIB: .............. ; Patente : ............ ; RC : ....... ; CNSS : ............... ; IF: ......... ;
ICE : ..... ; E-mail: ......;
Tél: ........</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>