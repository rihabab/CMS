<?php include "includes/db.php" ;?>
<?php include 'includes/functions.php';?>

<?php session_start()?>
<?php 

if(isset($_POST['login'])){

$user_email=$_POST['user_email'];


$query = "SELECT * FROM users WHERE user_email='{$user_email}' ";
$select_user_query = mysqli_query($connection, $query);
confirm($select_user_query);

if(mysqli_num_rows($select_user_query) !== 0){
    $user_password=$_POST['user_password'];
    $row = mysqli_fetch_assoc($select_user_query); 
    $the_password = $row['user_password'];

    if($the_password !== $user_password){
        echo "<h1>password incorrecte</h1>";
        
    
    }else{
        $_SESSION['user_email']=$user_email;

    header("Location: index.php");
        
    }
    


}else{
    echo "<h1>Email not found</h1>";
}


/*
$user_password=$_POST['user_password'];
$query = "SELECT * FROM users WHERE user_email='{$user_email}' AND user_password='{$user_password}' ";
$select_user_query = mysqli_query($connection, $query);
confirm($select_user_query);
*/
/*

if($password == $confirm_password && !empty($password)){

$firstname= $_POST['firstname'];
$lastname=$_POST['lastname'];
$email= $_POST['email'];
$role= $_POST['user_role'];

$firstname=mysqli_real_escape_string($connection, $firstname);
$lastname=mysqli_real_escape_string($connection, $lastname);
$email=mysqli_real_escape_string($connection, $email);
$password=mysqli_real_escape_string($connection, $password);
$role=mysqli_real_escape_string($connection, $role);


$query = "INSERT INTO users(user_firstname, user_lastname, user_email, user_role, user_password ) ";
$query .= "VALUES('{$firstname}','{$lastname}','{$email}','{$role}','{$password}')";
$insert_user_query = mysqli_query($connection, $query);
if(!$insert_user_query){
    die("failed" . mysqli_error($connection));
}




$_SESSION['user_email']=$email;

header("Location: index.php");

}else {
    echo "<h1>Password not confirmed</h1>";
}


*/

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
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="form-floating mb-3">
                                                <input name="user_email" class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input name="user_password" class="form-control" id="inputPassword" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                    <input class="btn btn-primary btn-block" type="submit" name="login" value="login">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
