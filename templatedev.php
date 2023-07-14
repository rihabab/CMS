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
        }

        #def {
            display: flex;
            flex-direction: row;
            color: red;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>
                    <h1 class="center" style="font-size:60px">Devis</h1>
                </th>
                <th><img style="width:100px; margin-left:65%;" src="logo.jpg" alt=""></th>
            </tr>
        </thead>
    </table>

    <div class="col-md-3">
        <p>our company name</p>
        <p>654871314500</p>
    </div>


    <table>
        <thead>
            <tr>
                <th><?php echo $devis_supplier_name ?></th>
                <th><?php echo $part_adresse ?></th>
                <th>Date:<?php echo $devis_date ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><?php echo $devis_supplier_ice ?></th>
                <th><?php echo $part_city ?></th>


            </tr>
        </tbody>
    </table><br><br>




    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
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
                $devis_produit_q = $row['devis_produit_q'];
                $devis_totale = $row['devis_totale'];


                echo "<tr>";
                echo "<td><b>$devis_produit_label</b></td>";
                echo "<td >$devis_produit_q</td>";
                echo "<td>$devis_totale</td>";

                echo "</tr>";
            }


            ?>






        </tbody>
    </table>
    <p style="margin-left:80%;font-size:20px;">Totale :<?php echo $devis_totale; ?></p>
    <footer style="margin-top:60%;">
        <p>our company name</p>
        <p>rue 6 Octobre -ex Convention, q. Racine, Grand Casablanca</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>