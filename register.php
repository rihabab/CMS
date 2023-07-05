<?php include "includes/db.php"?>

<?php session_start()?>
<?php 

if(isset($_POST['register'])){

$password=$_POST['password'];
$confirm_password=$_POST['confirm_password'];

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
        <title>Register - SB Admin</title>
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
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="input-group mb-3">
                                                        
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" name="firstname" aria-describedby="basic-addon1"/>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-6">
                                                    
                                                    <div class="input-group mb-3">
                                                        <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" name="lastname" aria-describedby="basic-addon1"/>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="input-group mb-3">
                                                        <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" name="email" aria-describedby="basic-addon1"/>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group mb-3">
                                                        <select name="user_role" id="" class="form-control" aria-label="Default select example" aria-describedby="basic-addon1">
                                                            <option value="subsriber">Select option</option>
                                                            <option value="admin">admin</option>
                                                            <option value="subsriber">user</option>
                                                            </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="input-group mb-3">
                                                        <input class="form-control" id="inputPassword" type="password" placeholder="Create a password" name="password" aria-describedby="basic-addon1"/>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-6">
                                                    
                                                    <div class="input-group mb-3">
                                                        <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" name="confirm_password" aria-describedby="basic-addon1"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><input class="btn btn-primary btn-block" type="submit" name="register" value="submit"></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
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
