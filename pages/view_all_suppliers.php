<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Fournisseurs</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Tous les fournisseurs</li>
        </ol>
        
        <div class="card mb-4">
            
            <div class="card-header" id="">
                <i class="fa fa-shopping-cart" aria-hidden="true" ></i>
                Fournisseurs
                <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" style="float:right">
                    <div class="input-group">
                    <input type="search" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."  class="form-control">
                        <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </form>
                
            </div> 

            <div class="container">
                
                
                <table class="table table-bordered"  id="myTable">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>numero tel</th>
                            <th>Email</th>
                            <th>Ville</th>
                            <th>Adresse</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
if(isset($_SESSION['user_email'])){

    $query = "SELECT * FROM suppliers ";
    $get_suppliers_query = mysqli_query($connection , $query);
    confirm($get_suppliers_query);

    while($row = mysqli_fetch_assoc($get_suppliers_query)){
        $supplier_id=$row['supplier_id'];
        $supplier_lastname=$row['supplier_lastname'];
        $supplier_firstname=$row['supplier_firstname'];
        $supplier_num_tel=$row['supplier_num'];
        $supplier_email=$row['supplier_email'];
        $supplier_city=$row['supplier_city'];
        $supplier_adresse=$row['supplier_adresse'];

        echo "<tr>";
        echo "<td>$supplier_lastname</td>";
        echo "<td>$supplier_firstname</td>";
        echo "<td>$supplier_num_tel</td>";
        echo "<td>$supplier_email</td>";
        echo "<td>$supplier_city</td>";
        echo "<td>$supplier_adresse</td>";
        echo "<td><a href='suppliers.php?source=edit&s_id={$supplier_id}'>Edit</a></td>";
        echo "<td><a href='suppliers.php?source=view&delete={$supplier_id}'>Delete</a></td>";
        echo "<tr>";
    }
  
}

?>
                   
<?php 

if(isset($_GET['delete'])){
    $the_supplier_id= $_GET['delete'];

    $query = "DELETE FROM suppliers WHERE supplier_id={$the_supplier_id}" ;
    $delete_query = mysqli_query($connection, $query);

    header("Location: suppliers.php?source=view");



}
?>





                    
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</main>