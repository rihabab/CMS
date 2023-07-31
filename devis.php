<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="css/style1.css" rel="stylesheet" />
    <link href="other.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>





    <nav style="height: 100vh;">

        <?php include 'includes/navigation.php'; ?>
        <div style="display: flex; flex-direction:row; height:auto;">
            <?php include 'includes/sidenav.php'; ?>









            <div class="content" id="content">
                <?php

                if (isset($_GET['source'])) {
                    $source = $_GET['source'];
                } else {
                    $source = '';
                }
                switch ($source) {
                    case 'view';
                        include 'pageDevis/view_all_devis.php';
                        break;

                    case 'add';
                        include 'pageDevis/add_devis.php';
                        break;

                    case 'edit';
                        include 'pageDevis/edit_devis.php';
                        break;


                    case 'view_profile';
                        include 'pageDevis/profile_devis.php';
                        break;

                        /*
                       default :
                       include 'includes/view_all_posts.php';
                       break;  */
                }




                ?>


                <!-- 

<div class="todo">
    <div id="myDIV" class="header">
            <h2>My To Do List</h2>
            <input type="text" id="myInput" placeholder="Title...">
            <span onclick="newElement()" class="addBtn">Add</span>
        </div>

        

        <ul id="myUL">
            
        </ul>
</div>

 -->





                <?php

                /*
$data = json_decode(file_get_contents("php://input"), true);

var_dump($data); // Output the received data for debugging

if (isset($data["name"]) && isset($data["email"])) {
    echo "Hello, " . $data["name"] . "!" . PHP_EOL;
    echo "Your email address is " . $data["email"];
} else {
    http_response_code(400); // Set the response code to indicate a bad request
    echo "Invalid data received.";
}*/


                ?>






            </div>





        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/js.js"></script>
    <script src="javascript.js"></script>




    <script type="text/javascript">
        $('#btn').on('click', function() {
            $('#goalmodal').modal('show');
        });
    </script>

    <script>
        //JavaScript function to be called
        function printFiledev(source) {
            w = window.open('templatedev.php?d_id=' + encodeURIComponent(source));
            w.print();
        }

        // Call the function
        //printFile($the_devis_id);
    </script>
</body>

</html>