<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Clients</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Tous les clients</li>
        </ol>
        
        <div class="card mb-4">
        <hr class="hr" />
            <div class="card-header" id="">
                <i class="fa fa-users" aria-hidden="true"  style="padding:10px;"></i>
                Clients
                
                <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" style="float:right">
                    <div class="input-group">
                    <input type="search" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."  class="form-control">
                        <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </form>
                
            </div> 
            <hr class="hr" />

            <div class="container">
                
                
                <table class="table table-bordered"  id="myTable">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>ICE</th>
<!-- 
                            <th>numero tel</th>
                            <th>Email</th>
                            <th>Ville</th>
                            <th>Adresse</th> -->

                            <th>Montant non payé </th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
if(isset($_SESSION['user_email'])){

    $query = "SELECT * FROM clients ";
    $get_clients_query = mysqli_query($connection , $query);
    confirm($get_clients_query);

    while($row = mysqli_fetch_assoc($get_clients_query)){
        $client_id=$row['client_id'];
        $client_name=$row['client_name'];
        $client_ice=$row['client_ice'];
        $client_num_tel=$row['client_num_tel'];
        $client_email=$row['client_email'];
        $client_city=$row['client_city'];
        $client_adresse=$row['client_adresse'];

        $query="SELECT * FROM facture WHERE facture_part_nom='$client_name' AND facture_statut='non-payée' ";
        $get_facture_query = mysqli_query($connection , $query);
        confirm($get_facture_query);
        $facture_non_paye=0;
        while($row = mysqli_fetch_assoc($get_facture_query)){
            $facture_non_paye+=$row['facture_totale'];
        }




        echo "<tr>";
        echo "<td><a href='clients.php?source=view_profile&c_id={$client_id}' style='color: black;'>$client_name</td>";
        echo "<td>$client_ice</td>";
        //echo "<td>$client_num_tel</td>";
        //echo "<td>$client_email</td>";
        //echo "<td>$client_city</td>";
        echo "<td>$facture_non_paye MAD</td>";
        echo "<td><a href='clients.php?source=edit&c_id={$client_id}'><i class='fa fa-pencil' aria-hidden='true'></i></a></td>";
        echo "<td><a href='clients.php?source=view&delete={$client_id}'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>";
        echo "<tr>";
    }
  
}

?>
                   
<?php 

if(isset($_GET['delete'])){
    $the_client_id= $_GET['delete'];

    $query = "DELETE FROM clients WHERE client_id={$the_client_id}" ;
    $delete_query = mysqli_query($connection, $query);

    header("Location: clients.php?source=view");



}
?>





                    
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</main>