<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
if ($_SESSION["email"]==true && $_SESSION["password"]) {
  
echo "My Email address is = <strong><u>" . $_SESSION["email"] . ".</u></strong><br>";
echo "My Password is = <strong><u>" . $_SESSION["password"] . ".</u></strong><br>"; 

echo"<a href='login.php'>Return</a>";
}
?>

</body>
</html>