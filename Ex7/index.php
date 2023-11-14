<?php 
include_once "connection.php";

$name="";
$email="";
$password="";
$number="";
$gender="";
$address="";
$message="";

if(isset($_POST["use"]))
{
$name =$_POST["name"];
$email =$_POST["email"];
$password =$_POST["password"];
$number =$_POST["number"];
$gender =$_POST["gender"];
$address =$_POST["Address"];
$message="";
$hashed_password = password_hash($password, PASSWORD_DEFAULT);  

$select_query = "select * from user where email = '$email'";
$select_excute = mysqli_query($conn,$select_query);
// var_dump($select_excute);
// die;

$row = mysqli_fetch_array($select_excute);
// $chek=$row['email'];
// var_dump($chek);
// die;

if($email==$row['email'])
{
    
    $message="Email already exists";
    

}
else{

$insert_query ="INSERT INTO `user`(`name`, `email`,`password`, `phone`, `gender`,`address` ) VALUES 
('$name','$email','$hashed_password','$number','$gender','$address')";
 
// var_dump($insert_query);    
// die;


$excute =mysqli_query($conn,$insert_query);

if ($excute) {
  
   
        $message=" Data Insert Sucessful !!";
        $name="";
        $email="";
        $password="";
        $number="";
        $gender="";
        $address="";
        // header("location:index.php");
      
}
else{
    $message="Not Insert!!";
}
}
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
    <title>LOGIN FORM</title>

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
                    <h2 class="title">Registration Form</h2>
                    <form action=""  method="POST">
                        <div class="input-group">
                            <input class="input--style-1" required type="text" placeholder="Name" name="name" value="<?= $name ?>">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" required  type="email" placeholder="Email" name="email" value="<?= $email ?>">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" required type="password" placeholder="Password" name="password">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" required type="tel" placeholder="Phone" name="number" value="<?= $number ?>">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender">
                                            <option value=""   >GENDER</option>
                                            <option value="male"<?=$gender == "male" ? "selected" : "";?> >Male</option>
                                            <option value="female" <?=$gender == "female" ? "selected" : "";?>  >Female</option>
                                            <option value="">Other</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="input-group">
                            <input class="input--style-1" required type="text" placeholder="Address" name="Address" value="<?= $address ?>">
                        </div>
                       <div class="row row-space">
                           
                        </div> 
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" name="use" type="submit">Submit</button>
                        </div>

                        <?php if (!empty($message)) {?>
                    <p style="color:red; font-size: 20px;">  <?php
                      echo $message;
                     
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
