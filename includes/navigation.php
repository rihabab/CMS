<?php include "includes/db.php"?>
<?php ob_start()?>
<?php include "includes/functions.php"?>
<?php session_start()?>



<?php 

if(isset($_SESSION['user_email'])){
    $user_email = $_SESSION['user_email'];
    $query = "SELECT * FROM users WHERE user_email='{$user_email}'";
    $get_user_query = mysqli_query($connection , $query);
    confirm($get_user_query);

    while($row = mysqli_fetch_assoc($get_user_query)){
        $user_firstname=$row['user_firstname'];
        $user_lastname=$row['user_lastname'];
        $user_role=$row['user_role'];
        
    }
  
}else{
    header("Location: ..");
}

?>




        <nav id="top"class="navbar bg-body-tertiary " data-bs-theme="dark" style="background-color: #1f1e1e; color:azure;  margin: 0;">
            <div class="container-fluid">
                <div>
                    <a class="navbar-brand" style="width:200px"><?php echo $user_lastname . " " . $user_firstname?></a>
                    <button type="button" id="sidebarCollapse" class="btn " >
                        <i class="fa fa-bars fa-2xs" aria-hidden="true" style="color:white"></i>
                      </button>
                </div>
             
                <div class="btn-group dropleft">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user" aria-hidden="true" style="padding:10px;"></i>
                </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="profile.php">Profile</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </div>
              
              <!-- <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4" style="display: flex; flex-direction: row;">
                
                <li class="active" >
                    <a href="#user" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user" aria-hidden="true" style="padding:10px;"></i>Fournisseurs</a>
                    <ul class="collapse list-unstyled" id="user">
                        <li>
                            <a href="suppliers.php?source=view">Afficher tous les fournisseurs</a>
                        </li>
                        <li>
                            <a href="suppliers.php?source=add">Ajouter un fournisseur</a>
                        </li>
                        
                    </ul>
                </li>

               
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user" aria-hidden="true" aria-hidden="true" style="padding:10px;"></i>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li> 
            </ul> -->
            </div>
        </nav>
        
        




