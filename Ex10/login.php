<?php
session_start();
include_once "connection.php";
if (isset($_POST["button"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "select * from user_reg where Email = '$email' and Password ='$password'";
    $run = mysqli_query($conn, $query);

    $row = mysqli_num_rows($run);

    if ($row > 0) {
        $data = mysqli_fetch_array($run);
        $_SESSION['email'] = $email;
        $_SESSION['password'] =$password;
        header('Location:loginView.php');
    } else {
        $_SESSION["Error"] = "Please Check Email and password";
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
              <form action="  " method="post">
                <div class="form-group first">
                  <label for="username">Username</label>
                  <input type="email" Required name="email" class="form-control" placeholder="your-email@gmail.com" id="username">
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Password</label>
                  <input type="password" required class="form-control" name="password" placeholder="Your Password" id="password">
                </div>

                <div class="d-sm-flex mb-5 align-items-center">
                  <label class="control control--checkbox mb-3 mb-sm-0"><span class="caption">Remember me</span>
                    <input type="checkbox" checked="checked"/>
                    <div class="control__indicator"></div>
                  </label>
                  <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
                </div>

                <input type="submit" name="button" value="Log In" class="btn btn-block btn-primary">
                <p>
             
                <p style="color:red; font-size: 10px;">
                <?= $_SESSION["redirect"];;
                unset($_SESSION['redirect']);
                ?></p>

                  <?php if ($_SESSION['Error']) {?>
                    <p style="color:red; font-size: 10px;">  <?php
                     echo $_SESSION['Error'];
                     unset($_SESSION['Error']);
                    } ?>


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