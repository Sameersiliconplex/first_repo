<?php
    echo "*Property Name = <strong>" . $_COOKIE['property'] . "</strong>";
    ?>
    <br>
    <br>
    <?php

    echo "Location = <strong>" . $_COOKIE['location'] . "</strong>";
    ?>
    <br>
    <br>
    <?php
    echo "*City = <strong>" .   $_COOKIE['city'] . "</strong>";
    ?>
    <br>
    <br>

    <?php
    echo "*State = <strong>" .   $_COOKIE['state'] . "</strong>";
    ?>
<br>
    <br> 
    <?php
    echo "*<strong>Zip = " . $_COOKIE['zip'] . "</strong>";
    ?>
    <br>
    <br> 
    <?php
    echo "Apartment No = <strong>" . $_COOKIE['appartment'] . "</strong>";
    ?>
    <br>
    <br>
    <?php

    echo "Floor Level = <strong>" . $_COOKIE['floor'] . "</strong>";
    ?>
    <br>
    <br>
    <?php
     echo "Street No = <strong>" . $_COOKIE['street'] . "</strong>";
     ?>
    <br>
    <br>
    <?php

    echo "Street Letter = <strong>" . $_COOKIE['streetlevel'] . "</strong>" ; 
    ?>
    <br>
    <br>
    <?php
    echo "*Rent = <strong>" . $_COOKIE['rent'] . "</strong>";
    ?>
    <br>
    <br>
    <?php

    echo "*Bedrooms = <strong>" . $_COOKIE['bed'] . "</strong>"; 
    ?>
    <br>
    <br>
    <?php
    echo "*Bathroom = <strong>" . $_COOKIE['bath'] . "</strong>";
    ?>
    <br>
    <br>
    <?php

    echo "Deposite = <strong>" . $_COOKIE['deposite'] . "</strong>"; 
    ?>
    <br>
    <br>

    <?php
    echo "Cost Of Utilities = <strong>" . $_COOKIE['utility'] . "</strong>";
    ?>
    <br>
    <br>
    <?php

    echo "Building Type = <strong>" . $_COOKIE['building'] . "</strong>"; 
    ?>
    <br>
    <br>
    <?php
    echo "Room_Furnished = <strong>" . $_COOKIE['Room_Furnished'] . "</strong>";
    ?>
    <br>
    <br>
    <?php
    echo "Date_Negotiable = <strong>" . $_COOKIE['Date_Negotiable'] . "</strong>"; 
    ?>
    <br>
    <br>

<!-- //date -->


    <?php
    echo "Date = <strong>" . $_COOKIE['date'] . "</strong>"; 
    ?>
    <br>
    <br>
    <?php
    echo "Month = <strong>" . $_COOKIE['month'] . "</strong>"; 
    ?>
    <br>
    <br>

    <?php
    echo "Year = <strong>" . $_COOKIE['year'] . "</strong>"; 
    ?>
    <br>
    <br>

<!-- //end date -->


<?php
    echo "*Sq. Ft = <strong>" . $_COOKIE['fts'] . "</strong>"; 
    ?>
    <br>
    <br>

    <?php
    echo "lease_type===================== = <strong>" . $_COOKIE['lease_type'] . "</strong>";
    ?>
    <br>
    <br>
    <?php
    echo "lease_type_value================== = <strong>" . $_COOKIE['lease_type_value'] . "</strong>";
    ?>
    <br>
    <br>

    <?php
    echo "Intersection = <strong>" . $_COOKIE['inter'] . "</strong>";
    ?>
    <br>
    <br>
<!-- //Starting Checkbox section -->



    <br>
    <br>

<!-- 
// --End Checkbox section  -->


    <?php
    echo "*Additional Details = <strong>" . $_COOKIE['add'] . "</strong>"; 
    ?>
    <br>
    <br>
   
    <?php
    echo "*I'm Looking For = <strong>" . $_COOKIE['LK'] . "</strong>"; 
    ?>
    <br>
   <br>
    <?php
    echo "*Maximum number of Occupants = <strong>" . $_COOKIE['meb'] . "</strong>"; 
    ?>
    <br>
    <br>

    <?php
    echo "Gender = <strong>" . $_COOKIE['Prefer'] . "</strong>"; 
    ?>
    <br>
    <br>
    <?php 
    $options = json_decode($_COOKIE['option']); 
   
    foreach ($options as $key => $option){
        echo "Option " . ($key+1) . "= <strong>" . $option . "</strong>";

        if ($option == "Security")
            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Security amount = <strong>" . $_COOKIE['security_amount'] . "</strong>";

        if ($option == "Broker's Fee")
            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Broker fee amount = <strong>" . $_COOKIE['broker_fee_amount'] . "</strong>";
    
        ?><br><?php
        }
    ?>
    <br>

    <a href="index2.php">Previous Form</a>

    <?php






// session_start();
//     echo$_SESSION["PropertyName"];
//     echo$_SESSION["location"];
//     echo$_SESSION["City"];
//     echo$_SESSION["zip"];
//     echo$_SESSION["state"];
//     echo$_SESSION["appartment"];
//     echo$_SESSION["floor"];
//     echo$_SESSION["street"];
//     echo$_SESSION["streetlevel"];
//     echo$_SESSION["rent"];
//     echo$_SESSION["bed"];
//     echo$_SESSION["bath"];
//     echo$_SESSION["deposite"];
//     echo$_SESSION["utility"];
//     echo$_SESSION["building"];
//     echo$_SESSION["Room_Furnished"];
//     echo$_SESSION["Date_Negotiable"];
//     echo$_SESSION["lease"];
//     echo$_SESSION["Landlord"];
//     echo$_SESSION["rental_f"];
//     echo$_SESSION["Other_F"];
//     echo$_SESSION["parking"];
//     echo$_SESSION["Prefer"];
//     echo$_SESSION["Lease_Option"];
//     echo$_SESSION["txt2"];
//     echo$_SESSION["fts"];
//     echo$_SESSION["add"];
//     echo$_SESSION["inter"];
//     echo$_SESSION["LK"];
//     echo$_SESSION["meb"];
//     echo$_SESSION["dated"];
//     echo$_SESSION["month"];
//     echo$_SESSION["year"];

?>
    <br>
    <?php

?>