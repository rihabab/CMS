<?php include "includes/db.php" ;?>
<?php include 'includes/functions.php';?>

<?php session_start()?>
<?php 
/*
if(isset($_SESSION['user_email'])){
    header("Location: index.php");
}
*/


if(isset($_POST['login'])){

$user_email=$_POST['user_email'];


$query = "SELECT * FROM users WHERE user_email='{$user_email}' ";
$select_user_query = mysqli_query($connection, $query);
confirm($select_user_query);

if(mysqli_num_rows($select_user_query) !== 0){
    $user_password=$_POST['user_password'];
    $row = mysqli_fetch_assoc($select_user_query); 
    $the_password = $row['user_password'];
    $the_role = $row['user_role'];

    if($the_password !== $user_password){
        echo "<h1>password incorrecte</h1>";
        
    
    }else{
        $_SESSION['user_email']=$user_email;
        

    header("Location: index.php");
        
    }
    


}else{
    echo "<h1>Email not found</h1>";
}





}






?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="css/style1.css" rel="stylesheet" />
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
    </head>
    <body class="bg-primary">
    
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 ">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">



                                    
                                        <form action="" method="post">
                                            <div class="input-group mb-3">
                                                <input name="user_email" class="form-control" id="inputEmail" type="email" placeholder="email" aria-describedby="basic-addon1"/>
                                                
                                            </div>
                                            <div class="input-group mb-3">
                                                <input name="user_password" class="form-control" id="inputPassword" type="password" placeholder="Password" aria-describedby="basic-addon1" />
                                                
                                            </div>   
                                          
                                       
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                    <input class="btn btn-primary btn-block" type="submit" name="login" value="login">
                                                </div>
                                            </div>
                                        </form>


                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </main>
            </div>
            
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="js/js.js"></script>
    </body>
</html>
