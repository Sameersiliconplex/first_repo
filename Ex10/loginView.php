<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Echo session variables that were set on previous page
echo "My Email address is" . $_SESSION["Semail"] . ".<br>";
echo "My Password " . $_SESSION["Spassword"] . ".";
?>

</body>
</html>