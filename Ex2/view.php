
<?php



session_start();


//  
if($_GET['property_name']){
echo "*Property name  = <strong>" . $_GET['property_name'] . "</strong>";
?>

    <br>
    <br>

<?php
}
//  

if($_GET['location']){

    echo "location  = <strong>" . $_GET["location"] . "</strong>";
    ?>
 
    <br>
    <br>
    <?php
}
if($_GET['city']){
    echo "*City = <strong>" .   $_GET["city"] . "</strong>";
    ?>
    <br>
    <br>

    <?php
}
    if($_GET['state']){

    echo "*State = <strong>" .   $_GET["state"] . "</strong>";
    ?>
<br>
    <br> 
    <?php
    }
    if($_GET['zip']){
    echo "*Zip = <strong>" . $_GET["zip"] . "</strong>";
    ?>
    <br>
    <br> 
    <?php
    }
    if($_GET['appartment']){
    echo "Apartment No = <strong>" . $_GET["appartment"] . "</strong>";
    ?>
    <br>
    <br>
    <?php
    }
    if($_GET['floor']){
    echo "Floor Level = <strong>" . $_GET["floor"] . "</strong>";
    ?>
    <br>
    <br>
    <?php
    }
    if($_GET['street']){
     echo "Street No = <strong>" . $_GET["street"] . "</strong>";
     ?>
    <br>
    <br>
    <?php
    }
    if($_GET['street_level']){
    echo "Street Letter = <strong>" . $_GET["street_level"] . "</strong>" ; 
    ?>
    <br>
    <br>
    <?php
    }
    if($_GET['rent']){
    echo "*Rent = <strong>" . $_GET["rent"] . "</strong>";
    ?>
    <br>
    <br>
    <?php
    }
    if($_GET['bed']){

    echo "*Bedrooms = <strong>" . $_GET["bed"] . "</strong>"; 
    ?>
    <br>
    <br>
    <?php
    }
    if($_GET['bath']){
    echo "*Bathroom = <strong>" . $_GET["bath"] . "</strong>";
    ?>
    <br>
    <br>
    <?php
    }
    if($_GET['deposite']){

    echo "Deposite = <strong>" . $_GET["deposite"] . "</strong>"; 
    ?>
    <br>
    <br>
    

    <?php
    }
    if($_GET['utility']){
    echo "Cost Of Utilities = <strong>" . $_GET["utility"] . "</strong>";
    ?>
    <br>
    <br>
    <?php
    }
    if($_GET['building']){

    echo "Building Type = <strong>" . $_GET["building"] . "</strong>"; 
    ?>
    <br>
    <br>
    <?php
    }
    if($_GET['room_furnished']){
    echo "Room_Furnished = <strong>" . $_GET["room_furnished"] . "</strong>";
    ?>
    <br>
    <br>
    <?php
    }
    if($_GET['date_negotiable']){
    echo "Date_Negotiable = <strong>" . $_GET["date_negotiable"] . "</strong>"; 
    }
    ?>
   

<?php
if($_GET['fts']){
    echo "*Sq. Ft = <strong>" . $_GET["fts"] . "</strong>"; 
    ?>
    <br>
    <br>

    <?php
}
if($_GET['leasetype']){
    echo "lease_type===================== = <strong>" .$_GET["leasetype"] . "</strong>";
    ?>
    <br>
    <br>
    <?php
}
if($_GET['lease_type_value']){
    echo "lease_type_value================== = <strong>" . $_GET["lease_type_value"] . "</strong>";
    ?>
    <br>
    <br>

    <?php
}
if($_GET['inter']){
    echo "Intersection = <strong>" . $_GET["inter"] . "</strong>";
    ?>
    <br>
    <br>

    <?php
}

if($_GET['additional_details']){
    echo "*Additional Details = <strong>" . $_GET["additional_details"] . "</strong>"; 
    ?>
    <br>
    <br>
   
    <?php
}
if($_GET['im_looking_for']){
    echo "*I'm Looking For = <strong>" . $_GET["im_looking_for"] . "</strong>"; 
    ?>
    <br>
   <br>
    <?php
}
if($_GET['maximum_number']){
    echo "*Maximum number of Occupants = <strong>" . $_GET["maximum_number"] . "</strong>"; 
    ?>
    <br>
    <br>

    <?php
}
if($_GET['preference']){
    echo "Gender = <strong>" . $_GET["preference"] . "</strong>"; 
    ?>
    <br>
    <br>

<!-- //date -->

<!-- //date -->

<?php
}
echo "<u><strong>Date and Time</strong></u><br>";
echo "Date = <strong>" . $_GET['dated'] . "</strong>";
?>
    <br>

    <?php
echo "Month = <strong>" . $_GET['month'] . "</strong>";
?>

    <br>

    <?php
echo "Year = <strong>" . $_GET['year'] . "</strong>";
?>
    <br>
    <br>

<!-- //end date -->
   

<!-- //end date -->


    <!-- //Starting Checkbox section -->   
     <!-- 1)Checkbox # 1 -->
    <?php

    $options =$_GET["required"]; 
    $options_unserialize=json_decode($options);
    if(!empty($options_unserialize)){
    echo"<u><strong>Required</strong></u><br>";

    foreach ($options_unserialize  as $key => $option){

        echo "Option " . ($key+1) . "= <strong>" . $option . "</strong>";

        if ($option == "Security")
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Security amount = <strong>" . $_GET["security_amount"] . "</strong>";
        if ($option == "Broker's Fee")
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Broker fee amount = <strong>" . $_GET["brokerfee_amount"] . "</strong>";
        ?>
        <br>
        <?php
        }

        ?>
        <br>
        <br>
   
        <?php
         }








        //  2) checkbox # 2
       $Option2=json_decode($_GET["hres_apartment"]);
       

       if(!empty($Option2)||!empty($_GET['No_Utilities'])){
       echo"<u><strong>HRES Apartment Source Pays For</strong></u>";
       echo"<br>";

       foreach ($Option2 as $key => $op2) {
       echo "Option " .($key+1). "=<strong> " .$op2. "</strong>";
    
        ?>
        <br>
        <?php
        }
        if ($_GET['No_Utilities']) {
            echo "Option 1 = <strong>" . $_GET['No_Utilities'] . "</strong><br>";
        }
   
        echo"<br>";
        echo"<br>";
    }







    //  3) checkbox # 3
    $rental_features=json_decode($_GET["rental_features"]);
        if ( $rental_features) {
 
        echo"<u><strong>rental_features</strong></u><br>";
        foreach ($rental_features as $key => $r_f) {
           echo"Option " .($key+1). "=<strong>" .$r_f. "</strong>";
           echo"<br>";
        }

        echo"<br>";
        echo"<br>";


    }

        //  4) checkbox # 4
        $community_features=json_decode($_GET["other_features"]);
        if($community_features){
        echo"<u><strong>Community_features</strong></u><br>";
        foreach ($community_features as $key => $c_f) {
            echo"Option " .($key+1). "=<strong>" .$c_f. "</strong>";
            echo"<br>";
        }

        echo"<br>";
        echo"<br>";
    }

    
    $parking_section=json_decode($_GET["Parking_Section2"]);
    // var_dump($parking_section);
    // die;
    if ( $parking_section) {
        echo"<u><strong>Parking Section</strong></u>";
        echo"<br>";
        foreach ($parking_section as $key => $p_r) {
            echo"Option " .($key+1). "=<strong>" .$p_r. "</strong>";

            if ($p_r == "Garage") {

                echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Off street = <strong> " .$_GET["GarageAmount"]. "</strong>"; 
            }
            if ($p_r == "Off Street") {
                echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Off street = <strong> " .$_GET["OffstreetAmount"]. "</strong>"; 
            }
            echo"<br>";

        
        }

        echo"<br>";
        echo"<br>";

    }
       echo'<a href="index.php">View All Data</a>';


        ?>

