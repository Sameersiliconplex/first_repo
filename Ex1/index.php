<?php
session_start();

$email="";
$password = ""; 
$emailerr="";
$passworderr="";
 
if(!empty($_GET['session']) && $_GET['session'] == 1) {
  $email = $session['ex1_email'];
}
if(isset($_GET["submit"])) {
  $email =$_GET["email"];
  $password =$_GET["password"];

  $_SESSION['ex1_email']= "";
  $_SESSION['ex1_email']=$email;
  if(empty($_GET["email"])&&empty($_GET["password"]))
  {
      $emailerr="Email is Empty!";
      $passworderr="Password is Empty!";
  }
  elseif(empty($_GET["email"])||empty($_GET["password"]))
  { 
    if (empty($_GET["email"])) {
    $emailerr="Email is Empty!";
    }else{ 
      $passworderr="Password is Empty!";
    }
  }
  elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
    $emailerr="Email is Invalid!";
  }   
  else {  
  header("Location:view.php?email=$email&password=$password;");
  }
}
?>
  
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Login</title>
  </head>
  <body>
  <div class="half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/bg_1.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6">
            <div class="form-block">
              <div class="text-center mb-5">
              <h3>Login <strong>Form</strong></h3>
              <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
              </div>
              <form action="" method="get">
                <div class="form-group first">
                  <label for="username">Username</label>
                  <input type="text"  name="email" class="form-control" placeholder="your-email@gmail.com" id="username" value="<?= $email ?>">
               
                  <span style="color: red;" class="error">
                <?php //if($passworderr2){echo $passworderr2;}?>
                <?= $emailerr ? $emailerr:"";?> 
                 </span>  
             
               
               
                 
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Your Password" id="password" value="<?= $password ?>">
                  <span style="color: red;" class="error">
                <?php //if($passworderr2){echo $passworderr2;}?>
                <?= $passworderr ? $passworderr:"";?> 
                 </span>   
             
             
                </div>
            
            
                <input type="submit" name="submit" value="Log In" class="btn btn-block btn-primary">
              
  <br><br>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html> 


