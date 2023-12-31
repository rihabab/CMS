<?php include "includes/db.php" ?>
<?php ob_start() ?>
<?php include "includes/functions.php" ?>

<?php

if (isset($_GET['d_id'])) {
    $part_adresse = "undef";
    $part_city = "undef";
    $the_devis_id = $_GET['d_id'];

    $query = "SELECT * FROM devis WHERE devis_id='$the_devis_id'";
    $get_devis_query = mysqli_query($connection, $query);
    confirm($get_devis_query);
    while ($row = mysqli_fetch_assoc($get_devis_query)) {
        $devis_supplier_name = $row['devis_supplier_name'];
        $devis_supplier_ice = $row['devis_supplier_ice'];
        $devis_date = $row['devis_date'];
    }

    $query = "SELECT * FROM suppliers WHERE supplier_ice='$devis_supplier_ice'";
    $get_part_query = mysqli_query($connection, $query);
    confirm($get_part_query);
    if (mysqli_num_rows($get_part_query) != 0) {

        while ($row = mysqli_fetch_assoc($get_part_query)) {
            $part_adresse = $row['supplier_adresse'];
            $part_city = $row['supplier_city'];
        }
    } else {
        $query = "SELECT * FROM clients WHERE client_ice='$devis_supplier_ice'";
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
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            padding: 10px;
        }

        #def {
            display: flex;
            flex-direction: row;
            color: red;
        }

        .tablet {
            padding-inline: 10px;
            border: 2px solid black;
            margin-bottom: 10px;
        }

        .right {
            margin-left: 20%;
        }

        .facture {
            padding-top: 100px;
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
                        <h4>Devis <?php echo $the_devis_id ?>/2023</h4>
                        <h6>Date du devis :</h6>
                        <p><?php echo $devis_date ?></p>
                    </div>
                </td>
                <td>
                    <div class="right">
                        <div class="tablet">
                            <p><?php echo $devis_supplier_name ?></p>
                            <p><?php echo $devis_supplier_ice ?></p>
                        </div>
                        <div>Adresse de facturation :</div>
                        <div class="tablet">
                            <?php echo $part_adresse ?>
                        </div>
                        <div class="tablet">
                            Devis N <?php echo $the_devis_id; ?>
                        </div>
                        <div class="tablet">
                            Bon de commande N XX
                        </div>


                    </div>
                </td>
            </tbody>
        </table>

    </div><br>




















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

            $query = "SELECT * FROM devis WHERE devis_supplier_name='$devis_supplier_name'  ";
            $get_facture_query = mysqli_query($connection, $query);
            confirm($get_facture_query);



            while ($row = mysqli_fetch_assoc($get_facture_query)) {
                $devis_produit_label = $row['devis_produit_label'];
                $devis_produit_type = $row['devis_produit_type'];
                $devis_produit_prix = $row['devis_produit_prix'];
                $devis_produit_q = $row['devis_produit_q'];
                $devis_totale = $row['devis_totale'];
                


                echo "<tr>";
                echo "<td><b>$devis_produit_label</b></td>";
                echo "<td >$devis_produit_q</td>";
                echo "<td >$devis_produit_type</td>";
                echo "<td >$devis_produit_prix</td>";
                echo "<td>$devis_totale</td>";

                echo "</tr>";
            }


            ?>






        </tbody>
    </table>
    <table style="margin-left:70%; width:200px;">
        <tbody>
            <tr>
                <th style="background-color: rgb(29, 136, 202);color:white;border: 2px solid white;">
                    <h6>Total :</h6>
                </th>
                <th style="text-align:end;font-family: 'Courier New', Courier, monospace;font-size:15px;"><?php echo $devis_totale; ?> MAD</th>
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