<?php
session_start();
include_once "connection.php";

$email="";
$message="";

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query_hash = "select * from user where email = '$email'";
    $excute_hash = mysqli_query($conn, $query_hash);
    $data_hash = mysqli_fetch_array($excute_hash);
    $password_hash = $data_hash['password'];
    
    if (password_verify( $password, $password_hash)) {
        $message='Password is valid!';
        $email="";
        
    } else {
        $message='Invalid password.';
    }

    // var_dump($password_hash);
    // die();
    // $verify = password_verify($password,$password_hash); 
    // // var_dump($verify);    
    // die;

    // $query = "select * from user where email = '$email'";   
    // $excute = mysqli_query($conn, $query);
    // var_dump($excute);  
    // die();
    // $row = mysqli_num_rows($excute);


    // if ($row > 0) {
    //     $data = mysqli_fetch_array($excute);
    //     $_SESSION["Error"] = "Login successful !!!";
    // } else {
    //     $_SESSION["Error"] = "Email is Invalid";
    // }

}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Login form</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Login Form</h2>
                    <form action=""  method="POST">
                    

                        <div class="input-group">
                            <input class="input--style-1" required  type="email" placeholder="Email" name="email" value="<?= !empty($email) ? "$email":""; ?>">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" required type="password" placeholder="Password" name="password">
                        </div>
                 
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" name="submit" type="submit">Submit</button>
                        </div>
                        <?php if (!empty($message)) {?>
                    <p style="color:red; font-size: 20px;">  <?php
                      echo $message;
                    //   asasasasas
                    } ?></p>
                    


  
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->