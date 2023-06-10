<?php include 'db.php' ;?>
<?php 

function confirm($result){
    global $connection;
    if(!$result){
        die("fail" . mysqli_error($connection));
    }

}


?>