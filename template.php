<?php include "includes/db.php" ?>
<?php ob_start() ?>
<?php include "includes/functions.php" ?>

<?php
$j = 0;
$facture_totalet=0;
if (isset($_GET['f_id'])) {
    $part_adresse="undef";
    $part_city="undef";
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

    $query = "SELECT * FROM suppliers WHERE supplier_ice='$facture_titre_ice'";
    $get_part_query = mysqli_query($connection, $query);
    confirm($get_part_query);
    if(mysqli_num_rows($get_part_query)!=0){

        while ($row = mysqli_fetch_assoc($get_part_query)) {
            $part_adresse = $row['supplier_adresse'];
            $part_city = $row['supplier_city'];
            
        }

    }else{
    $query = "SELECT * FROM clients WHERE client_ice='$facture_titre_ice'";
    $get_part_query = mysqli_query($connection, $query);
    confirm($get_part_query);
    if(mysqli_num_rows($get_part_query)!=0){
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
                    <h1 class="center" style="font-size:60px">Facture</h1>
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
                <th><?php echo $facture_titre_nom ?></th>
                <th><?php echo $part_adresse ?></th>
                <th>Date:<?php echo $facture_titre_date ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><?php echo $facture_titre_ice ?></th>
                <th><?php echo $part_city ?></th>
                <th><?php echo $facture_status ?></th>
                
            </tr>
        </tbody>
    </table><br><br>




    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
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
                $facture_q = $row['facture_q'];
                $facture_totale = $row['facture_totale'];
                $facture_totalet+=$facture_totale;

                echo "<tr>";
                echo "<td><b>$facture_label_produit</b></td>";
                echo "<td >$facture_q</td>";
                echo "<td>$facture_totale</td>";

                echo "</tr>";

                $j++;
            }


            ?>






        </tbody>
    </table>
            <p style="margin-left:80%;font-size:20px;">Totale :<?php echo $facture_totalet;?></p>
    <footer style="margin-top:60%;">
        <p>our company name</p>
        <p>rue 6 Octobre -ex Convention, q. Racine, Grand Casablanca</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>