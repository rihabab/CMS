<?php include "includes/db.php"?>
<?php ob_start()?>
<?php include "includes/functions.php"?>

<?php 


require __DIR__ . "/vendor/autoload.php";
use Dompdf\Dompdf;
use Dompdf\Options;


// $html = '<h1 style="color: green">Example</h1>';
// $html .= "Hello <em>$name</em>";
// $html .='<img style="width: 100px" src="pic1.PNG">';
// $html .="Quantity: $quantity";



$options=new Options;
$options->setChroot(__DIR__);
$options->setIsRemoteEnabled(true);


$name = $_POST["facture_part_nom"];
$ice = $_POST["facture_part_ice"];


$dompdf=new Dompdf($options);

$html = file_get_contents("template.php");
$html = str_replace(["{{ name }}", "{{ ice }}"], [$name, $ice], $html);

$f_id=$_GET["f_id"];

    // if (isset($_POST['facture_label_produit0'])) {
    //     $facture_label_produit = $_POST['facture_label_produit0'];
    //     $facture_produit_prix = $_POST['facture_produit_prix0'];
    //     $facture_q = $_POST['facture_q0'];
    //     $facture_totale = $facture_q * $facture_produit_prix;
    //     $html = str_replace(
    //         [
    //             "{{ facture_label_produit0 }}",
    //             "{{ facture_produit_prix0 }}",
    //             "{{ facture_q0 }}"
    //         ],
    //         [
    //             $facture_label_produit,
    //             $facture_produit_prix,
    //             $facture_q
    //         ],
    //         $html
    //     );
    // }


    $html = file_get_contents("http://localhost/stage/template.php?f_id=$f_id");
    

    
    $dompdf->loadHtml($html);
    //$dompdf->loadHtmlFile("template.html");
    $dompdf->render();
    $dompdf->stream("facture.pdf");


?>