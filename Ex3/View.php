
<?php



session_start();

if ($_COOKIE['email']) {
echo "Email  = <strong>" . $_COOKIE['email'] . "</strong><br><br>";
}

if ($_COOKIE['password']) {
echo "Password  = <strong>" . $_COOKIE['password'] . "</strong> <br><br>" ;
}

//  
if($_COOKIE['property']){
echo "*Property name  = <strong>" . $_COOKIE['property'] . "</strong>";
?>

    <br>
    <br>

<?php
}
//  

if($_COOKIE['location']){

    echo "location  = <strong>" . $_COOKIE["location"] . "</strong>";
    ?>
 
    <br>
    <br>
    <?php
}
if($_COOKIE['city']){
    echo "*City = <strong>" .   $_COOKIE["city"] . "</strong>";
    ?>
    <br>
    <br>

    <?php
}
    if($_COOKIE['state']){

    echo "*State = <strong>" .   $_COOKIE["state"] . "</strong>";
    ?>
<br>
    <br> 
    <?php
    }
    if($_COOKIE['zip']){
    echo "*Zip = <strong>" . $_COOKIE["zip"] . "</strong>";
    ?>
    <br>
    <br> 
    <?php
    }
    if($_COOKIE['appartment']){
    echo "Apartment No = <strong>" . $_COOKIE["appartment"] . "</strong>";
    ?>
    <br>
    <br>
    <?php
    }
    if($_COOKIE['floor']){
    echo "Floor Level = <strong>" . $_COOKIE["floor"] . "</strong>";
    ?>
    <br>
    <br>
    <?php
    }
    if($_COOKIE['street']){
     echo "Street No = <strong>" . $_COOKIE["street"] . "</strong>";
     ?>
    <br>
    <br>
    <?php
    }
    if($_COOKIE['street_level']){
    echo "Street Letter = <strong>" . $_COOKIE["street_level"] . "</strong>" ; 
    ?>
    <br>
    <br>
    <?php
    }
    if($_COOKIE['rent']){
    echo "*Rent = <strong>" . $_COOKIE["rent"] . "</strong>";
    ?>
    <br>
    <br>
    <?php
    }
    if($_COOKIE['bed']){

    echo "*Bedrooms = <strong>" . $_COOKIE["bed"] . "</strong>"; 
    ?>
    <br>
    <br>
    <?php
    }
    if($_COOKIE['bath']){
    echo "*Bathroom = <strong>" . $_COOKIE["bath"] . "</strong>";
    ?>
    <br>
    <br>
    <?php
    }
    if($_COOKIE['deposite']){

    echo "Deposite = <strong>" . $_COOKIE["deposite"] . "</strong>"; 
    ?>
    <br>
    <br>
    

    <?php
    }
    if($_COOKIE['utility']){
    echo "Cost Of Utilities = <strong>" . $_COOKIE["utility"] . "</strong>";
    ?>
    <br>
    <br>
    <?php
    }
    if($_COOKIE['building']){

    echo "Building Type = <strong>" . $_COOKIE["building"] . "</strong>"; 
    ?>
    <br>
    <br>
    <?php
    }
    if($_COOKIE['room_furnished']){
    echo "Room_Furnished = <strong>" . $_COOKIE["room_furnished"] . "</strong>";
    ?>
    <br>
    <br>
    <?php
    }
    if($_COOKIE['date_negotiable']){
    echo "Date_Negotiable = <strong>" . $_COOKIE["date_negotiable"] . "</strong>"; 
  
    ?>
  <br>
  <br>

<?php
  }
if($_COOKIE['fts']){
    echo "*Sq. Ft = <strong>" . $_COOKIE["fts"] . "</strong>"; 
    ?>
    <br>
    <br>

    <?php
}
if($_COOKIE['leasetype']){
    echo "lease_type===================== = <strong>" .$_COOKIE["leasetype"] . "</strong>";
    ?>
    <br>
    <br>
    <?php
}
if($_COOKIE['lease_type_value']){
    echo "lease_type_value================== = <strong>" . $_COOKIE["lease_type_value"] . "</strong>";
    ?>
    <br>
    <br>

    <?php
}
if($_COOKIE['inter']){
    echo "Intersection = <strong>" . $_COOKIE["inter"] . "</strong>";
    ?>
    <br>
    <br>

    <?php
}

if($_COOKIE['additional_details']){
    echo "*Additional Details = <strong>" . $_COOKIE["additional_details"] . "</strong>"; 
    ?>
    <br>
    <br>
   
    <?php
}
if($_COOKIE['im_looking_for']){
    echo "*I'm Looking For = <strong>" . $_COOKIE["im_looking_for"] . "</strong>"; 
    ?>
    <br>
   <br>
    <?php
}
if($_COOKIE['maximum_number']){
    echo "*Maximum number of Occupants = <strong>" . $_COOKIE["maximum_number"] . "</strong>"; 
    ?>
    <br>
    <br>

    <?php
}
if($_COOKIE['preference']){
    echo "Gender = <strong>" . $_COOKIE["preference"] . "</strong>"; 
    ?>
    <br>
    <br>

<!-- //date -->

<!-- //date -->

<?php
}
echo "<u><strong>Date and Time</strong></u><br>";
echo "Date = <strong>" . $_COOKIE['date'] . "</strong>";
?>
    <br>

    <?php
echo "Month = <strong>" . $_COOKIE['month'] . "</strong>";
?>

    <br>

    <?php
echo "Year = <strong>" . $_COOKIE['year'] . "</strong>";
?>
    <br>
    <br>

<!-- //end date -->
   

<!-- //end date -->
<?php
$options = json_decode($_COOKIE['required']);
if ($options) {

echo "<u><strong>Required</strong></u><br>";
// var_dump($_COOKIE['required']);
// die;

foreach ($options as $key => $option) {

    echo "Option " . ($key + 1) . "= <strong>" . $option . "</strong>";

    if ($option == "Security") {
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Security amount = <strong>" . $_COOKIE['security_amount'] . "</strong>";
    }

    if ($option == "Broker's Fee") {
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Broker fee amount = <strong>" . $_COOKIE['brokerfee_amount'] . "</strong>";
    }

    ?><br>
        <?php
}

?>
        <br>

        <?php
}


// var_dump(json_decode($_COOKIE['option2']));
// die;
$option2 = json_decode($_COOKIE['hres_apartment']);
if($option2){
echo "<u><strong>HRES Apartment Source Pays</strong></u><br>";
foreach ($option2 as $key => $value) {

    echo "Option " . ($key + 1) . "= <strong>" . $value . "</strong><br>";
}
if ($_COOKIE['noutilities']) {
    echo "Option 1 = <strong>" . $_COOKIE['noutilities'] . "</strong><br>";
}

?>
        <br>
        <?php
}
$option3 = json_decode($_COOKIE['rental_features']);
if($option3){
echo "<u><strong>Rental Features </strong></u><br>";


foreach ($option3 as $key => $op3) {
    echo "Option " . ($key + 1) . "= <strong>" . $op3 . "</strong><br>";

}

?>
        <br>
        <?php
}

$option4 = json_decode($_COOKIE['other_features']);
if ($option4) {

echo "<u><strong>Other Features</strong></u><br>";

foreach ($option4 as $key => $op4) {
    echo "Option " . ($key + 1) . "= <strong>" . $op4 . "</strong><br>";
}

?>
        <br>
        <?php
}

$Parking_Section2 = json_decode($_COOKIE['parking_section']);
if($Parking_Section2){
echo "<u><strong>Parking Section</strong></u><br>";


foreach ($Parking_Section2 as $key => $op5) {
    echo "Option " . ($key + 1) . "= <strong>" . $op5 . "</strong>";

    if ($op5 == "Garage") {
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Security amount = <strong>" . $_COOKIE['garage_amount'] . "</strong>";
    }
    if ($op5 == "Off Street") {
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Broker fee amount = <strong>" . $_COOKIE['off_street_amount'] . "</strong>";

    }
    ?>
<br>
<?php
}
}

?>