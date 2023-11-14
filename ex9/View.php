<!-- 
    echo$_SESSION["lease"];
    echo$_SESSION["Landlord"];
    echo$_SESSION["rental_f"];
    echo$_SESSION["Other_F"];
    echo$_SESSION["parking"];

    echo$_SESSION["Lease_Option"];
  
  
 -->


<?php



session_start();

if ($_SESSION['Semail']) {
    echo "Email  = <strong>" . $_SESSION['Semail'] . "</strong><br><br>";
    }
    
    if ($_SESSION['Spassword']) {
    echo "Password  = <strong>" . $_SESSION['Spassword'] . "</strong> <br><br>" ;
    }
    
    //  
    if($_SESSION['property']){
    echo "*Property name  = <strong>" . $_SESSION['property'] . "</strong>";
    ?>
    
        <br>
        <br>
    
    <?php
    }
    //  
    
    if($_SESSION['location']){
    
        echo "location  = <strong>" . $_SESSION["location"] . "</strong>";
        ?>
     
        <br>
        <br>
        <?php
    }
    if($_SESSION['city']){
        echo "*City = <strong>" .   $_SESSION["city"] . "</strong>";
        ?>
        <br>
        <br>
    
        <?php
    }
        if($_SESSION['state']){
    
        echo "*State = <strong>" .   $_SESSION["state"] . "</strong>";
        ?>
    <br>
        <br> 
        <?php
        }
        if($_SESSION['zip']){
        echo "*Zip = <strong>" . $_SESSION["zip"] . "</strong>";
        ?>
        <br>
        <br> 
        <?php
        }
        if($_SESSION['appartment']){
        echo "Apartment No = <strong>" . $_SESSION["appartment"] . "</strong>";
        ?>
        <br>
        <br>
        <?php
        }
        if($_SESSION['floor']){
        echo "Floor Level = <strong>" . $_SESSION["floor"] . "</strong>";
        ?>
        <br>
        <br>
        <?php
        }
        if($_SESSION['street']){
         echo "Street No = <strong>" . $_SESSION["street"] . "</strong>";
         ?>
        <br>
        <br>
        <?php
        }
        if($_SESSION['street_level']){
        echo "Street Letter = <strong>" . $_SESSION["street_level"] . "</strong>" ; 
        ?>
        <br>
        <br>
        <?php
        }
        if($_SESSION['rent']){
        echo "*Rent = <strong>" . $_SESSION["rent"] . "</strong>";
        ?>
        <br>
        <br>
        <?php
        }
        if($_SESSION['bed']){
    
        echo "*Bedrooms = <strong>" . $_SESSION["bed"] . "</strong>"; 
        ?>
        <br>
        <br>
        <?php
        }
        if($_SESSION['bath']){
        echo "*Bathroom = <strong>" . $_SESSION["bath"] . "</strong>";
        ?>
        <br>
        <br>
        <?php
        }
        if($_SESSION['deposite']){
    
        echo "Deposite = <strong>" . $_SESSION["deposite"] . "</strong>"; 
        ?>
        <br>
        <br>
        
    
        <?php
        }
        if($_SESSION['utility']){
        echo "Cost Of Utilities = <strong>" . $_SESSION["utility"] . "</strong>";
        ?>
        <br>
        <br>
        <?php
        }
        if($_SESSION['building']){
    
        echo "Building Type = <strong>" . $_SESSION["building"] . "</strong>"; 
        ?>
        <br>
        <br>
        <?php
        }
        if($_SESSION['room_furnished']){
        echo "Room_Furnished = <strong>" . $_SESSION["room_furnished"] . "</strong>";
        ?>
        <br>
        <br>
        <?php
        }
        if($_SESSION['date_negotiable']){
        echo "Date_Negotiable = <strong>" . $_SESSION["date_negotiable"] . "</strong>"; 
      
        ?>
      <br>
      <br>
    
    <?php
      }
    if($_SESSION['fts']){
        echo "*Sq. Ft = <strong>" . $_SESSION["fts"] . "</strong>"; 
        ?>
        <br>
        <br>
    
        <?php
    }
    if($_SESSION['leasetype']){
        echo "lease_type===================== = <strong>" .$_SESSION["leasetype"] . "</strong>";
        ?>
        <br>
        <br>
        <?php
    }
    if($_SESSION['lease_type_value']){
        echo "lease_type_value================== = <strong>" . $_SESSION["lease_type_value"] . "</strong>";
        ?>
        <br>
        <br>
    
        <?php
    }
    if($_SESSION['inter']){
        echo "Intersection = <strong>" . $_SESSION["inter"] . "</strong>";
        ?>
        <br>
        <br>
    
        <?php
    }
    
    if($_SESSION['additional_details']){
        echo "*Additional Details = <strong>" . $_SESSION["additional_details"] . "</strong>"; 
        ?>
        <br>
        <br>
       
        <?php
    }
    if($_SESSION['im_looking_for']){
        echo "*I'm Looking For = <strong>" . $_SESSION["im_looking_for"] . "</strong>"; 
        ?>
        <br>
       <br>
        <?php
    }
    if($_SESSION['maximum_number']){
        echo "*Maximum number of Occupants = <strong>" . $_SESSION["maximum_number"] . "</strong>"; 
        ?>
        <br>
        <br>
    
        <?php
    }
    if($_SESSION['preference']){
        echo "Gender = <strong>" . $_SESSION["preference"] . "</strong>"; 
        ?>
        <br>
        <br>
    
    <!-- //date -->
    
    <!-- //date -->
    
    <?php
    }
    echo "<u><strong>Date and Time</strong></u><br>";
    echo "Date = <strong>" . $_SESSION['dated'] . "</strong>";
    ?>
        <br>
    
        <?php
    echo "Month = <strong>" . $_SESSION['month'] . "</strong>";
    ?>
    
        <br>
    
        <?php
    echo "Year = <strong>" . $_SESSION['year'] . "</strong>";
    ?>
        <br>
        <br>
    
    <!-- //end date -->
       
    
    <!-- //end date -->

    <!-- //Starting Checkbox section -->
    <!-- 
    // --End Checkbox section  -->
    <?php 
      $options = json_decode($_SESSION["required_js"]); 
    if($options){
    echo"<u><strong>Required</strong></u><br>";
   
    foreach ($options  as $key => $option){

        echo "Option " . ($key+1) . "= <strong>" . $option . "</strong>";

        if ($option == "Security")
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Security amount = <strong>" . $_SESSION["security_amount"] . "</strong>";
        if ($option == "Broker's Fee")
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Broker fee amount = <strong>" . $_SESSION["brokerfee_amount"] . "</strong>";
        ?>
        <br>
        <?php
        }

        ?>
        <br>
        <br>
        <?php
        }

        if($Option2){
       $Option2=json_decode($_SESSION["hres_apartment_js"]);

       echo"<u><strong>HRES Apartment Source Pays For</strong></u>";
       echo"<br>";

       foreach ($Option2 as $key => $op2) {
       echo "Option " .($key+1). "=<strong> " .$op2. "</strong>";
    
        ?>
        <br>
        <?php
        }
        echo"<br>";
        echo"<br>";
    }

    $rental_features=json_decode($_SESSION["rental_features_js"]);

    if($rental_features){
        echo"<u><strong>rental_features</strong></u><br>";

        

        foreach ($rental_features as $key => $r_f) {
           echo"Option " .($key+1). "=<strong>" .$r_f. "</strong>";
           echo"<br>";
        }

        echo"<br>";
        echo"<br>";
    }
    $community_features=json_decode($_SESSION["other_features_js"]);
    if($community_features){
        echo"<u><strong>Community_features</strong></u><br>";

       


        foreach ($community_features as $key => $c_f) {
            echo"Option " .($key+1). "=<strong>" .$c_f. "</strong>";
            echo"<br>";
        }

        echo"<br>";
        echo"<br>";
    }
    $parking_section=json_decode($_SESSION["parking_section_js"]);
    if($parking_section){

        echo"<u><strong>Parking Section</strong></u>";
       
        echo"<br>";

    // var_dump( $parking_section);
    // die;

        foreach ($parking_section as $key => $p_r) {
            echo"Option " .($key+1). "=<strong>" .$p_r. "</strong>";

            if ($p_r == "Garage") {

                echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Off street = <strong> " .$_SESSION["garage_amount"]. "</strong>"; 
            }
            if ($p_r == "Off Street") {
                echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Off street = <strong> " .$_SESSION["off_street_amount"]. "</strong>"; 
            }
            echo"<br>";

        
        }

        echo"<br>";
        echo"<br>";
    }
        
       echo'<a href="index.php">View All Data</a>';


        ?>

