
<?php
session_start();
// require_once("connection.php");
require_once"connection.php";


if (isset($_POST['SubmitAdd'])) {

  $property_name = $_POST['propertyName'];
  $location = $_POST['Location'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zip = $_POST['zip'];

  $appartment = $_POST['ApartmentNo'];
  $floor = $_POST['FloorLevel'];
  $street = $_POST['StreetNo'];
  $street_level = $_POST['StreetLetter'];

  $rent = $_POST['RentAmount'];
  $bed = $_POST['Bedrooms'];
  $deposite = $_POST['DepositAmount'];
  $bath = $_POST['Bathrooms'];

  $utility = $_POST['Utilities'];
  $building = $_POST['BuildingTypeID'];
  //skip dates
  $room_furnished = $_POST['IsRoomFurnished'];
  $date_negotiable = $_POST['DateNegotiable'];

  //leasetype
  $leasetype = $_POST['LeaseType'];
  $lease_type_value = $_POST['LeaseType_Value'];

  // sq.fts and intersection
  $fts = $_POST['sqft'];
  $inter = $_POST['intersection'];

  //last four field
  $additional_details = $_POST['additionalDetails']; //*
  $im_looking_for = $_POST['LookingFor']; //*
  $maximum_number = $_POST['NumberOfMembers']; //*
  $preference = $_POST['Preference'];

  //date and time
  $date = $_POST['AvailDay'];
  $month = $_POST['AvailMonth'];
  $year = $_POST['AvailYear'];

  //  1)required checkbox
  $required = $_POST['Required'];
  
  $security_amount = $_POST['SecurityAmount'];
  $brokerfee_amount = $_POST['BrokerFeeAmount'];

  ///  2)HRES Apartment Source Pays For
  $no_utilities = $_POST['No_Utilities'];
  $hres_apartment = $_POST['hres_apartment'];

  //  3)rental_features
  $rental_features = $_POST['rental_features2'];

  //  4)community_features2
  $other_features = $_POST['other_features'];

  //  5)Parking_Section
  $parking_section = $_POST['Parking_Section2'];
  $garage_amount = $_POST['GarageAmount'];
  $off_street_amount = $_POST['OffstreetAmount'];

  //Date and time
  $availmonth = $_POST['dateandtime'];

    
//  //js code
//  $_SESSION["required_js"] = json_encode($_POST['Required']);
//  $_SESSION['hres_apartment_js'] = json_encode($_POST['hres_apartment']);
//  $_SESSION["rental_features_js"] = json_encode($_POST['rental_features2']);
//  $_SESSION["other_features_js"]=json_encode($_POST['other_features']);
//  $_SESSION["parking_section_js"] = json_encode($_POST['Parking_Section2']);





    // if blank box
    // "This Field is Required";
    $property_name_error = empty($_POST['propertyName']) ? "This Field is Required" : "";
    $city_error = empty($city) ? "Please Select the value" : "";
    $zip_error = empty($zip) ? "Please Select the value" : "";
   
    $state_error = empty($state) ? "Please select one" : "";

    $rent_error = empty($rent) ? "Please Enter Rent_Amount" : "";
    $bed_error = empty($bed) ? "Please Select one !!" : "";
    $bath_error = empty($bath) ? "Please Select one" : "";
    $inter_error = empty($inter) ? "Please Enter" : "";
    $im_looking_for_error = empty($im_looking_for) ? "Please fill up" : "";
    $fts_error = empty($fts) ? "Please Enter" : "";
    $additional_details_error = empty($additional_details) ? "Enter addition details" : "";
    $maximum_number_error = empty($maximum_number) ? "Please Enter" : "";
    $date_error = empty($date) || empty($month) || empty($year) ? "Please Select Correct Date" : "";
    

    
    if (empty($property_name_error) && empty($city_error) && empty($zip_error) && empty($state_error) &&
    empty($rent_error) && empty($im_looking_for_error) && empty($fts_error) &&
    empty($additional_details_error) && empty($maximum_number_error) && empty($bath_error) && empty($inter_error) &&  empty($date_error)
) {
    $data = "INSERT INTO `addproperty`(`name`,`location`,`city`,`state`,`appartment_no`,`zip`,`floor_level`,`street_no`,`street_letter`,`rent`,`bathroom`,`bedroom`,`deposit`,`cost_of_utility`,`building_type`,`room_furnished`,`date_negotiable`,`sq_fit`,`inters`,`leased_type`,`leased`,`addition_details`,`im_look`,`max_no`,`preference`)
        VALUES('$property_name', '$location','$city','$state','$appartment','$zip','$floor','$street','$street_level','$rent','$bath','$bed','$deposite','$utility','$building','$room_furnished','$date_negotiable','$fts','$inter','$leasetype','$lease_type_value','$additional_details','$im_looking_for','$maximum_number','$preference')";

    $exc = mysqli_query($conn, $data);
;
    if ($exc) {
      $last_id = $conn->insert_id;


      // var_dump($exc);
      // die;
      //1)db required
      foreach ($required as $key => $req_value) {

        if ($req_value == "Security") {
           $req_data = "INSERT INTO `rental_features`(`name`,`addproperty_id`,`security_amount`) VALUES('$req_value','$last_id','$security_amount')";
        }
        
      elseif($req_value == "Broker\'s Fee") {
    
        $req_data = "INSERT INTO `rental_features`(`name`,`addproperty_id`,`broker_amount`) VALUES('$req_value','$last_id','$brokerfee_amount')";

      }
      else{
        $req_data = "INSERT INTO `rental_features`(`name`,`addproperty_id`) VALUES('$req_value','$last_id')";
    }
        $excute = mysqli_query($conn, $req_data);
      }
    

      
      //2)db hres
    foreach ($hres_apartment as $key => $hres_value) {
      
      $hres_data="INSERT INTO `hres`(`name`,`addproperty_id`) VALUES('$hres_value','$last_id')";
    $excute = mysqli_query($conn, $hres_data);
    var_dump($hres_data);
    die;
    }
    // var_dump($last_id);
    // die;

    if ($No_Utilities) {
      $hres_data="INSERT INTO `hres`(`name`,`addproperty_id`) VALUES('$No_Utilities','$last_id')";  
      $excute = mysqli_query($conn, $hres_data);

    }
}


    foreach ($community_feature as $key => $cf_value) {
          $community_data="INSERT INTO `cummunity_features`(`name`, `addproperty_id`) VALUES('$cf_value','$last_id')";
          mysqli_query($conn, $community_data);
      }

    //4)db other_features
    foreach ($other_features as $key => $of_value) {
     
      $community_data="INSERT INTO `other_features`(`name`, `addproperty_id`) VALUES('$of_value','$last_id')";
        $excute = mysqli_query($conn, $community_data);
      }

        //5) parking Section
      foreach ($parking_section as $key => $ps_value) {


        if ($ps_value == "Garage") {
           $ps_data = "INSERT INTO `parking_section` (`name`,`garage`, `addproperty_id`) VALUES('$ps_value','$garage_amount','$last_id')";
       
          }
      elseif($ps_value == "Off Street") {
    
           $ps_data = "INSERT INTO `parking_section` (`name`,`off_street`,`addproperty_id`) VALUES('$ps_value', '$off_street_amount','$last_id')";

      }
      else{
           $ps_data = "INSERT INTO `parking_section` (`name`,`addproperty_id`) VALUES('$ps_value','$last_id')";
    }
        $excute = mysqli_query($conn, $ps_data);
      }


      if ($excute) {
        header("location:View.php");
      }
  }
}
if (empty($_SESSION['password'])) {
  ?>
  <script>
         alert("Email is Invalid!");
         </script>
 
 <?php
 $_SESSION["redirect"]="Please Login!!!!";
  header("location:login.php");
 
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<!-- saved from url=(0054)http://192.168.4.22:140/administration/add_listing.asp -->
<!-- Includes necessary files -->
<HTML
xmlns="http://www.w3.org/1999/xhtml"><HEAD><TITLE>Landlord Application - Add Listing</TITLE>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1"><LINK
href="Landlord Application - Add Listing_files/ie.css" type=text/css
rel=stylesheet>
<SCRIPT>
  function CheckCharacters(obj, counterPlace, totalLength) {
    if(totalLength >= obj.value.length){
      document.getElementById(counterPlace).innerHTML = obj.value.length;
    }else{
      obj.value = obj.value.substr(0,totalLength);
      alert("You can only enter " + totalLength + " characters");
    }
  }
  function PayOption_NoUtilities()
  {
  //alert("kashif");
  if (document.NewProfile.LandlordPay_Option[0].checked==true)
  {
    document.NewProfile.LandlordPay_Option[1].disabled=true;
    document.NewProfile.LandlordPay_Option[2].disabled=true;
    document.NewProfile.LandlordPay_Option[3].disabled=true;
    document.NewProfile.LandlordPay_Option[4].disabled=true;
    document.NewProfile.LandlordPay_Option[5].disabled=true;
    document.NewProfile.CheckPays.value="No Utility";
  }
  else
  {
    document.NewProfile.LandlordPay_Option[1].disabled=false;
    document.NewProfile.LandlordPay_Option[2].disabled=false;
    document.NewProfile.LandlordPay_Option[3].disabled=false;
    document.NewProfile.LandlordPay_Option[4].disabled=false;
    document.NewProfile.LandlordPay_Option[5].disabled=false;
    document.NewProfile.CheckPays.value="";
  }
  }

  function PayOption_AllUtilities()
  {
  if (document.NewProfile.LandlordPay_Option[5].checked==true)
  {
    document.NewProfile.LandlordPay_Option[0].disabled=true;
    document.NewProfile.LandlordPay_Option[1].checked=true;
    document.NewProfile.LandlordPay_Option[2].checked=true;
    document.NewProfile.LandlordPay_Option[3].checked=true;
    document.NewProfile.LandlordPay_Option[4].checked=true;
    document.NewProfile.CheckPays.value="All Utility";
  }
  else
  {
    document.NewProfile.LandlordPay_Option[0].disabled=false;
    document.NewProfile.LandlordPay_Option[1].checked=false;
    document.NewProfile.LandlordPay_Option[2].checked=false;
    document.NewProfile.LandlordPay_Option[3].checked=false;
    document.NewProfile.LandlordPay_Option[4].checked=false;
    document.NewProfile.CheckPays.value="";
  }
  }

  function CheckPayOption_AllUtilities()
  {
  if ((document.NewProfile.LandlordPay_Option[1].checked==true)&&(document.NewProfile.LandlordPay_Option[2].checked==true)&&(document.NewProfile.LandlordPay_Option[3].checked==true)&&(document.NewProfile.LandlordPay_Option[4].checked==true))
  {
    document.NewProfile.LandlordPay_Option[0].disabled=true;
    document.NewProfile.LandlordPay_Option[5].checked=true;
    document.NewProfile.CheckPays.value="All Utility";
  }
  else
  {
    document.NewProfile.LandlordPay_Option[0].disabled=false;
    document.NewProfile.LandlordPay_Option[5].checked=false;
    document.NewProfile.CheckPays.value="";
  }
  }

  function Parking_SectionChk(checkbox)$_SESSION["rental_features"]
  {
    if (checkbox.checked==true)
    {
     for (i=1;i<=9;i++)
     {
       document.NewProfile.Parking_Section[i].checked=false;
       document.NewProfile.Parking_Section[i].disabled=true;
       document.NewProfile.GarageAmount.value="";
       document.NewProfile.GarageAmount.disabled=true;
       document.NewProfile.OffstreetAmount.value="";
       document.NewProfile.OffstreetAmount.disabled=true;
     }
    }
    else
    {
     for (i=1;i<=9;i++)
     {
       document.NewProfile.Parking_Section[i].disabled=false;
     }
    }
  }
</SCRIPT>

<STYLE type=text/css>.style110 {
  FONT-WEIGHT: bold; COLOR: #000000
}
</STYLE>

<META content="MSHTML 6.00.2900.3020" name=GENERATOR></HEAD>
<BODY>


<?php 


$opt=json_decode($_SESSION["required_js"]);
// var_dump($opt);
// die;


$opt2=json_decode($_SESSION["hres_apartment_js"]);

$opt3=json_decode($_SESSION["rental_features_js"]);


$opt4=json_decode($_SESSION["other_features_js"]);


$opt5=json_decode( $_SESSION["parking_section_js"]);

?>



<TABLE cellSpacing=0 cellPadding=0 width=806 border=0>
  <TBODY>
  <TR>
    <TD>
      <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD vAlign=top><!-- Add listing form start -->
            <SCRIPT language=javascript>
      function ShowZipLookup() {
        window.open("ZipCodeLocator.asp?Form=NewProfile&Field=ZipCode","zipcode",'toolbar=no,status=no,scrollbars=no,resizable=no,location=no,menubar=no,directories=no,width=200,height=250');
      }
      </SCRIPT>

            <TABLE cellSpacing=0 width=615>
              <TBODY>
              <TR>
                <TD class=topleftcorner><IMG height=7 alt=""
                  src="Landlord Application - Add Listing_files/s.gif"
                width=7></TD>
                <TD class=topborder><IMG height=7 alt=""
                  src="Landlord Application - Add Listing_files/s.gif"
                width=662></TD>
                <TD class=toprightcorner><IMG height=7 alt=""
                  src="Landlord Application - Add Listing_files/s.gif"
                width=7></TD>
                <TD><IMG height=7 alt=""
                  src="Landlord Application - Add Listing_files/s.gif"
                width=1></TD></TR>
              <TR>
                <TD class=leftborder><IMG height=40 alt=""
                  src="Landlord Application - Add Listing_files/s.gif"
                width=7></TD>
                <TD>
                  <FORM  action="" name=NewProfile method=post>
                  <TABLE cellSpacing=0 cellPadding=0 width=662>
                    <TBODY>
                    <TR>
                      <TD colSpan=5>
                        <TABLE cellSpacing=0 cellPadding=0 width="100%"
border=0>
                          <TBODY>
                          <TR>
                            <TD width="2%"><IMG height=1
                              src="C:\Documents and Settings\farshad\Desktop\Landlord Application - Add Listing_files\s(1).gif"
                              width=10></TD>
                            <TD class=largegreen noWrap width="17%">Add
                              Property </TD>
                            <TD noWrap width="2%"><IMG height=1
                              src="C:\Documents and Settings\farshad\Desktop\Landlord Application - Add Listing_files\s(1).gif"
                              width=10></TD>
                            <TD width="79%"
                            background="Landlord Application - Add Listing_files/listing_bg.gif"><IMG
                              height=20 src="" width=8></TD></TR></TBODY></TABLE></TD>
                      <TD width=6><IMG height=16 alt=""
                        src="Landlord Application - Add Listing_files/spacer.gif"
                        width=1></TD></TR>
                    <TR>
                      <TD>&nbsp;</TD>
                      <TD align=right colSpan=5><SPAN class=sbgreen><B>*
                        </B></SPAN><STRONG>Denotes Required
                        Field&nbsp;&nbsp;&nbsp;</STRONG></TD></TR>
                    <TR>
                      <TD align=right height=29><SPAN class=sbgreen><B>*
                        </B></SPAN><STRONG>Property Name:</STRONG>&nbsp;</TD>
                      <TD colSpan=4 height=29>

                        <INPUT class=inputtext
                        id=propertyName maxLength=100  name=propertyName value="<?php echo $_SESSION["property_name"];?>"> 
                        <?php echo $property_name_error ? '<p style="color:red; font-size: 10px;">' . $property_name_error . '</p>' : ''; ?>


                      </TD>
                      <TD>&nbsp;</TD></TR>
                      <TR>
                      <TD align=right height=29><SPAN 
                        class=sbgreen></SPAN><STRONG>Location:</STRONG>&nbsp;</TD>
                      <TD colSpan=4 height=29><SELECT class=inputtext 
                        id=Location name=Location > <OPTION 
                        <?php if ($_SESSION["location"]=='AG') { echo "selected";}?> 
                        value=AG selected>AGASSIZ</OPTION>
                        
                        <OPTION <?php if ($_SESSION["location"]=='AH') { echo "selected";}?>  value=AH>AVON 
                          HILL</OPTION> 
                          
                          <OPTION <?php if ($_SESSION["location"]=='BR') { echo "selected";}?>  value=BR>BRATTLE</OPTION> 
                          <OPTION <?php if ($_SESSION["location"]=='CP') { echo "selected";}?> value=CP>CAMBRIDGEPORT</OPTION>
                           <OPTION <?php if ($_SESSION["location"]=='CS') { echo "selected";}?> value=CS>CENTRAL SQUARE</OPTION> 
                           <OPTION <?php if ($_SESSION["location"]=='EC') { echo "selected";}?> value=EC>EAST CAMBRIDGE</OPTION> 
                          <OPTION <?php if ($_SESSION["location"]=='FE') { echo "selected";}?> value=FE>FRESH POND EAST</OPTION> 
                          <OPTION <?php if ($_SESSION["location"]=='FS') { echo "selected";}?> value=FS>FRESH POND SOUTH</OPTION> 
                          <OPTION <?php if ($_SESSION["location"]=='FW') { echo "selected";}?> value=FW>FENWAY</OPTION> 
                          <OPTION <?php if ($_SESSION["location"]=='HS') { echo "selected";}?> value=HS>HARVARD SQUARE</OPTION> 
                          <OPTION <?php if ($_SESSION["location"]=='IS') { echo "selected";}?> value=IS>INMAN SQUARE</OPTION> 
                          
                          <OPTION <?php if ($_SESSION["location"]=='MC') { echo "selected";}?> value=MC>MID-CAMBRIDGE</OPTION> 
                          <OPTION <?php if ($_SESSION["location"]=='NC') { echo "selected";}?> value=NC>NORTH CAMBRIDGE</OPTION> 
                          <OPTION <?php if ($_SESSION["location"]=='OT') { echo "selected";}?> value=OT>OUTSIDE CAMBRIDGE</OPTION> 
                          <OPTION <?php if ($_SESSION["location"]=='PS') { echo "selected";}?> value=PS>PORTER SQUARE</OPTION> 
                          <OPTION <?php if ($_SESSION["location"]=='RV') { echo "selected";}?> value=RV>RIVERSIDE</OPTION> 
                          <OPTION <?php if ($_SESSION["location"]=='SC') { echo "selected";}?> value=SC>SOMERVILLE</OPTION></SELECT> </TD>
                      <TD>&nbsp;</TD></TR>
                      <TD>&nbsp;</TD></TR>
                      <TR>
                      <TD align=right height=29><SPAN class=sbgreen><B>*
                        </B></SPAN><STRONG>City:</STRONG>&nbsp;</TD>
                      <TD colSpan=4 height=29>
                        <TABLE cellSpacing=0 cellPadding=0 width=100 border=0>
                        <TBODY>
                          <TR>
                            <TD width=10><INPUT class=radio type=radio 
                              value=City1 <?php if ($_SESSION["city"]=='City1') { echo "checked";}?> name=city> </TD>
                            <TD width=90>City1&nbsp;&nbsp;&nbsp;&nbsp; </TD>
                            <TD width=10><INPUT class=radio type=radio 
                              value=City2 <?php if ($_SESSION["city"]=='City2') { echo "checked";}?>  name=city> </TD>
                            <TD width=90>City2&nbsp;&nbsp;&nbsp;&nbsp; </TD>
                            <TD width=10><INPUT class=radio type=radio 
                              value=City3 <?php if ($_SESSION["city"]=='City3') { echo "checked";}?>  name=city> </TD>
                            <TD width=90>City3&nbsp;&nbsp;&nbsp;&nbsp; </TD>
                            <TD width=10><INPUT class=radio type=radio 
                              value=City4 <?php if ($_SESSION["city"]=='City4') { echo "checked";}?>  name=city> </TD>
                            <TD width=90>City4&nbsp;&nbsp;&nbsp;&nbsp; </TD>
                            <TD width=10><INPUT class=radio type=radio 
                              value=City5 <?php if ($_SESSION["city"]=='City5') { echo "checked";}?>  name=city> </TD>
                            <TD width=90>City5&nbsp;&nbsp;&nbsp;&nbsp; </TD>
                          <TR>
                            <TD width=10><INPUT class=radio type=radio 
                              value=City6 <?php if ($_SESSION["city"]=='City6') { echo "checked";}?>  name=city> </TD>
                            <TD width=90>City6&nbsp;&nbsp;&nbsp;&nbsp; </TD>
                            <TD width=10><INPUT class=radio type=radio 
                              value=City7 <?php if ($_SESSION["city"]=='City7') { echo "checked";}?>  name=city> </TD>
                            <TD width=90>City7&nbsp;&nbsp;&nbsp;&nbsp; </TD>
                            <TD width=10><INPUT class=radio type=radio 
                              value=City8 <?php if ($_SESSION["city"]=='City8') { echo "checked";}?>  name=city> </TD>
                            <TD width=90>City8&nbsp;&nbsp;&nbsp;&nbsp; </TD>


                            <TD width=10><INPUT class=radio type=radio 
                              value=City9 <?php if ($_SESSION["city"]=='City9') { echo "checked";}?>  name=city> </TD>
                            <TD width=90>City9&nbsp;&nbsp;&nbsp;&nbsp; </TD>
                            
                            
                            <TD width=10 class="d-flex flex-column"><INPUT class=radio type=radio 
                            value=City10 <?php if ($_SESSION["city"]=='City10') { echo "checked";}?>  name=city>
                          </TD>
                          <TD width=90>City10&nbsp;&nbsp;&nbsp;&nbsp; </TD>

                          </TR>
                          <tr>
                            <td colspan="10">
                    

                            </td>
                          </tr>
                    
                          </TBODY></TABLE><!--<input name="city" class="inputtext" id="city" value="" size="20" maxlength="100" />//--></TD>
                      <TD>&nbsp;</TD>

                    </TR>

                    <TR>
                      <TD align=right height=29><SPAN class=sbgreen><B>*
                        </B></SPAN><STRONG>State:</STRONG>&nbsp;</TD>
                      <TD height=29><SELECT class=inputtext id=state 
                        name=state> <OPTION value="" selected>Select 
                          State</OPTION> 
                          <OPTION <?php if ($_SESSION["state"]=='Alaska') { echo "selected";}?>
                           value=Alaska>Alaska</OPTION> 
                          <OPTION <?php if ($_SESSION["state"]=='Arizona') { echo "selected";}?>
                          value=Arizona>Arizona</OPTION> 
                          <OPTION <?php if ($_SESSION["state"]=='Arkansas') { echo "selected";}?>
                          value=Arkansas>Arkansas</OPTION> 
                          <OPTION <?php if ($_SESSION["state"]=='California') { echo "selected";}?>
                           value=California>California</OPTION>
                          <OPTION <?php if ($_SESSION["state"]=='Colorado') { echo "selected";}?>
                          value=Colorado>Colorado</OPTION>
                          <OPTION <?php if ($_SESSION["state"]=='Connecticut') { echo "selected";}?>
                          value=Connecticut>Connecticut</OPTION> 
                          <OPTION <?php if ($_SESSION["state"]=='Delaware') { echo "selected";}?>
                          value=Delaware>Delaware</OPTION> 
                          <OPTION <?php if ($_SESSION["state"]=='District of Columbia') { echo "selected";}?>
                          value="District of Columbia">District of Columbia</OPTION>
                          <OPTION <?php if ($_SESSION["state"]=='Florida') { echo "selected";}?>
                          value=Florida>Florida</OPTION> 
                          <OPTION <?php if ($_SESSION["state"]=='Georgia') { echo "selected";}?> 
                          value=Georgia>Georgia</OPTION> 
                          <OPTION <?php if ($_SESSION["state"]=='Guam') { echo "selected";}?>
                          value=Guam>Guam</OPTION>
                           <OPTION <?php if ($_SESSION["state"]=='Hawaii') { echo "selected";}?>
                          value=Hawaii>Hawaii</OPTION>
                           <OPTION <?php if ($_SESSION["state"]=='Idaho') { echo "selected";}?>
                          value=Idaho>Idaho</OPTION>
                          <OPTION <?php if ($_SESSION["state"]=='Illinois') { echo "selected";}?>
                          value=Illinois>Illinois</OPTION> 
                          <OPTION <?php if ($_SESSION["state"]=='Indiana') { echo "selected";}?>
                          value=Indiana>Indiana</OPTION> 
                          <OPTION <?php if ($_SESSION["state"]=='Iowa') { echo "selected";}?>
                          value=Iowa>Iowa</OPTION> 
                          <OPTION <?php if ($_SESSION["state"]=='Kansas') { echo "selected";}?> 
                          value=Kansas>Kansas</OPTION>
                         <OPTION <?php if ($_SESSION["state"]=='Kentucky') { echo "selected";}?>
                          value=Kentucky>Kentucky</OPTION> 
                         <OPTION <?php if ($_SESSION["state"]=='Louisiana') { echo "selected";}?> 
                          value=Louisiana>Louisiana</OPTION>
                         <OPTION <?php if ($_SESSION["state"]=='Maine') { echo "selected";}?> 
                          value=Maine>Maine</OPTION>
                         <OPTION <?php if ($_SESSION["state"]=='Maryland') { echo "selected";}?> 
                          value=Maryland>Maryland</OPTION> 
                         <OPTION <?php if ($_SESSION["state"]=='Massachusetts') { echo "selected";}?> 
                          value=Massachusetts>Massachusetts</OPTION>
                         <OPTION <?php if ($_SESSION["state"]=='Michigan') { echo "selected";}?> 
                          value=Michigan>Michigan</OPTION>
                         <OPTION <?php if ($_SESSION["state"]=='Minnesota') { echo "selected";}?> 
                          value=Minnesota>Minnesota</OPTION> 
                        <OPTION <?php if ($_SESSION["state"]=='Mississippi') { echo "selected";}?> 
                          value=Mississippi>Mississippi</OPTION></SELECT>
                    <!-- /////// -->

                    <?php echo $state_error ? '<p style="color:red; font-size: 10px;">' . $state_error . '</p>' : ''; ?>

                        </TD>



                      <TD align=right height=29><SPAN class=sbgreen><B>*
                        </B></SPAN><STRONG>Zip:</STRONG>&nbsp;</TD>
                      <TD colSpan=2 height=29><INPUT class=inputtext id=zip
                        maxLength=100 name=zip value="<?php echo  $_SESSION['zip'];?>" >


                        <?php echo $zip_error ? '<p style="color:red; font-size: 10px;">' . $zip_error . '</p>' : ''; ?>

 


                      </TD>
                      <TD>&nbsp;</TD></TR>
                    <TR>
                      <TD align=right height=29><STRONG>Apartment No
                        :</STRONG>&nbsp;</TD>
                      <TD height=29><INPUT class=inputtext id=ApartmentNo
                        maxLength=100 name=ApartmentNo  value="<?php
    echo $_SESSION["appartment"];
    ?>" ></TD>
                      <TD align=right height=29><STRONG>Floor
                      Level:</STRONG>&nbsp;</TD>
                      <TD colSpan=2 height=29><INPUT class=inputtext
                        id=FloorLevel maxLength=100 name=FloorLevel  value="<?php
    echo $_SESSION["floor"];
    ?>"  ></TD>
                      <TD>&nbsp;</TD></TR>
                    <TR>
                      <TD align=right height=29><STRONG>Street
                      No:</STRONG>&nbsp;</TD>
                      <TD height=29><INPUT class=inputtext id=StreetNo
                        maxLength=100 name=StreetNo
                        value="<?php
    echo $_SESSION["street"];
    ?>"
                        
                        ></TD>
                      <TD align=right height=29><STRONG>Street Letter
                        :</STRONG>&nbsp;</TD>
                      <TD colSpan=2 height=29><INPUT class=inputtext
                        id=StreetLetter maxLength=100 name=StreetLetter value="<?php
    echo $_SESSION["street_level"];
    ?>" ></TD>
                      <TD>&nbsp;</TD></TR>
                    <TR>
                      <TD align=right height=29><SPAN class=sbgreen><B>*
                        </B></SPAN><STRONG>Rent:&nbsp;</STRONG></TD>
                      <TD width=193 height=29><STRONG>$</STRONG> <INPUT
                        class=inputtext maxLength=5 size=6 name=RentAmount
                        value="<?php
    echo $_SESSION["rent"];
    ?>"
                        >
                      
                        <?php echo $rent_error ? '<p style="color:red; font-size: 10px;">' . $rent_error . '</p>' : ''; ?>

                      </TD>
                      <TD align=right width=156 height=29><SPAN
                        class=sbgreen><B>*
                        </B></SPAN><STRONG>Bedrooms:&nbsp;</STRONG></TD>
                      <TD colSpan=2 height=29><SELECT class=inputtext
                        name=Bedrooms> 
                        <OPTION value="" selected>Please Select</OPTION> 
                          <OPTION 
                          <?php if ($_SESSION["bed"]=='1') { echo "selected";}?> value=1>1</OPTION> <OPTION 
                          <?php if ($_SESSION["bed"]=='2') { echo "selected";}?> value=2>2</OPTION> 
                          <OPTION
                          <?php if ($_SESSION["bed"]=='3') { echo "selected";}?>  value=3>3</OPTION> <OPTION 
                          <?php if ($_SESSION["bed"]=='4') { echo "selected";}?> 
                          value=4>4</OPTION></SELECT>
                      
                        <?php echo $bed_error ? '<p style="color:red; font-size: 10px;">' . $bed_error . '</p>' : ''; ?>



                        <SCRIPT>

						</SCRIPT>                         </TD>
                      <TD><IMG height=29 alt=""
                        src="Landlord Application - Add Listing_files/spacer.gif"
                        width=1></TD></TR>
                    <TR>
                      <TD align=right
                      height=29><STRONG>Deposit:&nbsp;</STRONG></TD>
                      <TD width=193 height=29><STRONG>$</STRONG> <INPUT
                        class=inputtext maxLength=5 size=6
name=DepositAmount  value="<?php
echo $_SESSION["deposite"];
?>"

></TD>
                      <TD align=right width=156 height=29><SPAN
                        class=sbgreen><B>*
                        </B></SPAN><STRONG>Bathrooms:&nbsp;</STRONG></TD>
                      <TD colSpan=2 height=29><SELECT class=inputtext
                        name=Bathrooms>
                        <OPTION value="" selected>Please Select</OPTION> 
                          <OPTION  <?php if ($_SESSION["bath"]=='2') { echo "selected";}?>  value=2>2</OPTION> <OPTION 
                          <?php if ($_SESSION["bath"]=='3') { echo "selected";}?> value=3>3</OPTION> 
                          <OPTION 
                          <?php if ($_SESSION["bath"]=='4') { echo "selected";}?> value=4>4</OPTION> <OPTION 
                       
                          <?php if ($_SESSION["bath"]=='5') { echo "selected";}?>   value=5>5</OPTION> </SELECT>
                     
                        <?php echo $bath_error ? '<p style="color:red; font-size: 10px;">' . $bath_error . '</p>' : ''; ?>

                        <SCRIPT>

						</SCRIPT>                         </TD>
                      <TD><IMG height=29 alt=""
                        src="Landlord Application - Add Listing_files/spacer.gif"
                        width=1></TD></TR>
                    <TR>
                      <TD align=right height=29><STRONG>Cost Of
                        Utilities:&nbsp;</STRONG> </TD>
                      <TD width=193 height=29><STRONG>$</STRONG> <INPUT
                        class=inputtext maxLength=5 size=6 name=Utilities
                        value="<?php
echo $_SESSION["utility"];
?>"
                        >
                        <I>per month</I></TD>
                      <TD align=right width=156 height=29><STRONG>Building
                        Type:&nbsp;</STRONG> </TD>
                      <TD colSpan=2 height=29><SELECT class=inputtext
                        name=BuildingTypeID>
                        <OPTION 
                        value=0 <?php if ($_SESSION["building"]=='0') { echo "selected";}?> 
                          selected>Room</OPTION> <OPTION 
                          <?php if ($_SESSION["building"]=='1') { echo "selected";}?> value=1>High 
                          Rise</OPTION> <OPTION <?php if ($_SESSION["building"]=='2') { echo "selected";}?> value=2>Low Rise</OPTION> 
                          <OPTION <?php if ($_SESSION["building"]=='3') { echo "selected";}?> value=3>House</OPTION> <OPTION 
                          <?php if ($_SESSION["building"]=='4') { echo "selected";}?> value=4>Brownstone</OPTION> <OPTION 
                          <?php if ($_SESSION["building"]=='5') { echo "selected";}?> value=5>Apartment</OPTION> <OPTION 
                          <?php if ($_SESSION["building"]=='6') { echo "selected";}?> value=6>Townhouse</OPTION> <OPTION 
                          <?php if ($_SESSION["building"]=='7') { echo "selected";}?> value=7>Other</OPTION></SELECT> </TD>
                      <TD><IMG height=29 
                        src="Landlord Application - Add Listing_files/spacer.gif" 
                        width=1></TD></TR></SELECT> </TD>
                      <TD><IMG height=29
                        src="Landlord Application - Add Listing_files/spacer.gif"
                        width=1></TD></TR>
                    <TR>
                      <TD align=right height=29><SPAN class=sbgreen><B>*
                        </B></SPAN><STRONG>Date Available:&nbsp;</STRONG> </TD>
                      <TD width=193 height=29>
                        <SCRIPT language=javascript>
								// function currdate(){
								// 	var mydate= new Date();
								// 	var theyear=mydate.getFullYear();
								// 	var themonth=mydate.getMonth()+1;
								// 	var thetoday=mydate.getDate();
								// 	document.NewProfile.AvailMonth.value = themonth;
								// 	document.NewProfile.AvailDay.value = thetoday;
								// 	document.NewProfile.AvailYear.value = theyear;
								// }

								function isLeapYear(yr) {
								  return new Date(yr,2-1,29).getDate()==29;
								}

								function checkDays() {
									var days
									var month = document.NewProfile.AvailMonth.selectedIndex

									if ((month == 3) || (month == 5) || (month == 8) || (month == 10)) {
										days = 30
									} else if (month==1) {
										if(isLeapYear(document.NewProfile.AvailYear.value)){
											days = 29
										}else{
											days = 28
										}
									} else {
										days = 31
									}

									document.NewProfile.AvailDay.length = days
									for (i=0;i<days;i++) {
										document.NewProfile.AvailDay.options[i].text = i+1;
										document.NewProfile.AvailDay.options[i].value = i+1;
									}
								}
							</SCRIPT>
                        <SELECT class=inputtext onchange=checkDays();
                        name=AvailMonth>
                          <OPTION value="" selected>Please Select</OPTION>
                        <OPTION value=1>Jan</OPTION>
                          <OPTION value=2>Feb</OPTION> <OPTION
                          value=3>Mar</OPTION> <OPTION value=4>Apr</OPTION>
                          <OPTION value=5>May</OPTION> <OPTION
                          value=6>Jun</OPTION> <OPTION value=7>Jul</OPTION>
                          <OPTION value=8>Aug</OPTION> <OPTION
                          value=9>Sep</OPTION> <OPTION value=10>Oct</OPTION>
                          <OPTION value=11>Nov</OPTION> <OPTION
                          value=12>Dec</OPTION></SELECT> <SELECT class=inputtext
                        name=AvailDay>
                          <OPTION value="">Please Select</OPTION>
                        <OPTION value=1>1</OPTION>
                          <OPTION value=2>2</OPTION> <OPTION value=3>3</OPTION>
                          <OPTION value=4>4</OPTION> <OPTION value=5>5</OPTION>
                          <OPTION value=6>6</OPTION> <OPTION value=7>7</OPTION>
                          <OPTION value=8>8</OPTION> <OPTION value=9>9</OPTION>
                          <OPTION value=10>10</OPTION> <OPTION
                          value=11>11</OPTION> <OPTION value=12>12</OPTION>
                          <OPTION value=13>13</OPTION> <OPTION
                          value=14>14</OPTION> <OPTION value=15>15</OPTION>
                          <OPTION value=16>16</OPTION> <OPTION
                          value=17>17</OPTION> <OPTION value=18>18</OPTION>
                          <OPTION value=19>19</OPTION> <OPTION
                          value=20>20</OPTION> <OPTION value=21>21</OPTION>
                          <OPTION value=22>22</OPTION> <OPTION
                          value=23>23</OPTION> <OPTION value=24>24</OPTION>
                          <OPTION value=25>25</OPTION> <OPTION
                          value=26>26</OPTION> <OPTION value=27>27</OPTION>
                          <OPTION value=28>28</OPTION> <OPTION
                          value=29>29</OPTION> <OPTION value=30>30</OPTION>
                          <OPTION value=31>31</OPTION></SELECT>

                        <SELECT class=inputtext onchange=checkDays(); name=AvailYear>
                          <OPTION value="" selected>Please Select</OPTION>
                          <OPTION value=2006>2006</OPTION>
                          <OPTION value=2007>2007</OPTION>
                          <OPTION value=2008>2008</OPTION>
                          <OPTION value=2009>2009</OPTION>
                          <OPTION value=2010>2010</OPTION>
                          <OPTION value=2011>2011</OPTION>
                          <OPTION value=2012>2012</OPTION>
                          <OPTION value=2013>2013</OPTION>
                          <OPTION value=2014>2014</OPTION>
                          <OPTION value=2015>2015</OPTION>
                          <OPTION value=2016>2016</OPTION>
                          <OPTION value=2017>2017</OPTION>
                          <OPTION value=2018>2018</OPTION>
                          <OPTION value=2019>2019</OPTION>
                          <OPTION value=2020>2020</OPTION>
                          <OPTION value=2021>2021</OPTION>
                          <OPTION value=2022>2022</OPTION>
                          <OPTION value=2023>2023</OPTION>
                        </SELECT>
                        <SCRIPT>

							currdate();

							checkDays();
						</SCRIPT>

<?php echo $date_error ? '<p style="color:red; font-size: 10px;">' . $date_error . '</p>' : ''; ?>


          </TD>
                      <TD align=right width=156 height=29><STRONG>Room
                        Furnished:&nbsp;</STRONG></TD>
                      <TD colSpan=2 height=29><INPUT class=radio type=checkbox
                        name=IsRoomFurnished 
                        <?php if ($_SESSION["room_furnished"]==true) { echo "checked";}?>
                        ></TD>
                      <TD><IMG height=29 alt=""
                        src="Landlord Application - Add Listing_files/spacer.gif"
                        width=1></TD></TR>
                    <TR>
                      <TD align=right height=30><STRONG>Dates Negotiable
                        :&nbsp;</STRONG></TD>
                      <TD height=30><!--<input name="sqft" class="inputtext" id="sqft" value="" size="8" maxlength="6" />//--><INPUT
                        class=radio id=DateNegotiable type=checkbox value=Yes
                        name=DateNegotiable <?php if ($_SESSION["room_furnished"]==true) { echo "checked";}?> > </TD>
                      <TD align=right height=30>&nbsp;</TD>
                      <TD colSpan=2 height=30>&nbsp;</TD>
                      <TD>&nbsp;</TD></TR>
                    <TR>
                      <TD align=right height=30><SPAN class=sbgreen><B>*
                        </B></SPAN><STRONG>Sq. Ft:&nbsp;</STRONG>

                        <?php echo $fts_error ? '<p style="color:red; font-size: 10px;">' . $fts_error . '</p>' : ''; ?>

                      </TD>
                      <TD height=30><!--<input name=sqft class="inputtext" id="sqft" value="" size="8" maxlength="6">//--><INPUT
                        class=inputtext id=sqft maxLength=6 size=8 name=sqft
                        
                        value="<?php
echo $_SESSION["fts"];
?>"
                        > <!--<select name=sqft class="inputtext">

	  						  <option value="" selected></option>

	  						  <option value=""></option>

						</select>//--></TD>
                      <TD align=right height=30><SPAN class=sbgreen><B>*
                        </B></SPAN><STRONG>Intersection:&nbsp;</STRONG></TD>
                      <TD colSpan=2 height=30><INPUT class=inputtext
                        id=intersection maxLength=255 name=intersection
                        value="<?php
echo $_SESSION["inter"];
?>"
                        >

                        <?php echo $inter_error ? '<p style="color:red; font-size: 10px;">' . $inter_error . '</p>' : ''; ?>

                      </TD>


                      <TD><IMG height=30 alt=""
                        src="Landlord Application - Add Listing_files/spacer.gif"
                        width=1></TD></TR>
                    <TR>
                      <TD align=right height=30><SPAN
                        class=sbgreen></SPAN><STRONG>Lease Type 
                      :&nbsp;</STRONG></TD>
                      <TD colSpan=4 height=30>
                        <TABLE cellSpacing=0 cellPadding=0 width="68%" 
                          border=0><TBODY>
                          
                          <SCRIPT>
					function EnableDisable(checkbox, textbox){
							if(checkbox.checked==true){
								textbox.value="";
								textbox.disabled=false;
							}else{
								textbox.disabled=true;
								textbox.value="";
							}
						}
					function EnableDisable1(checkbox, textbox){
							if(checkbox.value=="Lease"){
								textbox.disabled=false;
							}
							else{
								textbox.disabled=true;
							}
						}
					</SCRIPT>
                          <TR>
                            <TD width="7%"><INPUT class=radio 
                              onclick="EnableDisable1(this, NewProfile.LeaseType_Value);" 
                              type=radio  <?php if ($_SESSION["leasetype"] == 'Lease') { echo "checked";}?>  value=Lease name=LeaseType> </TD>
                            <TD width="15%">Lease </TD>
                            <TD width="17%">
                              
                            
                            <SELECT class=inputtext 
                              id=LeaseType_Value  name=LeaseType_Value <?php if ($_COOKIE['lease_type'] != 'Lease') { echo "disabled";}?>> 
                              <OPTION <?php if ($_SESSION["lease_type_value"]=='Lease 1') { echo "selected";}?> value="Lease 1">Lease 1</OPTION>
                              <OPTION <?php if ($_SESSION["lease_type_value"]=='Lease 2') { echo "selected";}?> value="Lease 2">Lease 2</OPTION> 
                              <OPTION <?php if ($_SESSION["lease_type_value"]=='Lease 3') { echo "selected";}?> value="Lease 3">Lease 3</OPTION>
                            </SELECT>
                           </TD>                    

                            <TD width="61%">&nbsp;</TD></TR>


                            <TR>                     
                            <TD><INPUT class=radio 
                              onclick="EnableDisable1(this, NewProfile.LeaseType_Value);" 
                              type=radio value=TAW name=LeaseType
                            
                              <?php if ($_SESSION["leasetype"]=='TAW') { echo "checked";}?> 
                           > </TD>
                            <TD colSpan=3>TAW (Tenant at Will)</TD></TR>
                          <TR>
                            <TD><INPUT class=radio 
                              onclick="EnableDisable1(this, NewProfile.LeaseType_Value);" 
                              type=radio
                              <?php if ($_SESSION["leasetype"]=='Short Term Rental') { echo "checked";}?>  value="Short Term Rental" 
                              name=LeaseType> </TD>
                            <TD colSpan=3>Short Term Rental                        </TD></TR></TBODY></TABLE></TD>
                      <TD>&nbsp;</TD></TR>
                    <TR>
                      <TD align=right height=30><SPAN 
                        class=sbgreen></SPAN><STRONG>Required
:&nbsp;</STRONG></TD>
                      <TD colSpan=4 height=30><STRONG>&nbsp;</STRONG>
                        <table cellspacing="0" cellpadding="0" width="90%"
                          border="0">
                          <tbody>

                            <tr>
                              <td width="7%"><input class="radio" value="First Month's Rent"
                              name="Required[]" id="LeaseType_Option" type="checkbox"
        
                          <?php
if (in_array("First Month's Rent", $opt)) {echo "checked";}?>  /></td>
                              <td width="32%">First Month's Rent</td>
                              <td width="61%">&nbsp;</td>
                            </tr>
                            <tr>
                              <td><input class="radio" name="Required[]" id="LeaseType_Option"
                              type="checkbox" value="Last Month's Rent"
                              <?php

if (in_array("Last Month's Rent", $opt)) {echo "checked";}?> /></td>
                              <td>Last Month's Rent</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td><input class="radio" id="LeaseType_Option"
                              onclick="EnableDisable(this, NewProfile.SecurityAmount);"
                              type="checkbox" value="Security"
                            name="Required[]"
                            <?php

if (in_array("Security", $opt)) {echo "checked";}?>/></td>
                              <td>Security</td>
                              <td>$
                                <input class="inputtext" id="SecurityAmount"
                              disabled="disabled" maxlength="8" size="10"
                            name="SecurityAmount"
                            <?php if ($_SESSION["SecurityAmount"] != 'Security') {echo "disabled";}
?>
                               value="<?php echo $_SESSION["SecurityAmount"] ?>"
                            /></td>
                            </tr>
                            <tr>
                              <td><input class="radio" id="LeaseType_Option"
                              onclick="EnableDisable(this, NewProfile.BrokerFeeAmount);"
                              type="checkbox" value="Broker's Fee"
                              name="Required[]"
                              <?php

if (in_array("Broker's Fee", $opt)) {echo "checked";}?>
                              /></td>
                              <td>Broker's Fee </td>
                              <td>$
                                <input class="inputtext" id="BrokerFeeAmount"
                              disabled="disabled" maxlength="8" size="10"
                            name="BrokerFeeAmount"
                            <?php if ($_SESSION["BrokerFeeAmount"] != 'Security') {echo "disabled";}
?>
                               value="<?php echo $_SESSION["BrokerFeeAmount"] ?>"
                            /></td>
                            </tr>
                            <tr>
                              <td><input class="radio" id="LeaseType_Option"
                              type="checkbox" value="References"
                              name="Required[]"
                              <?php

if (in_array("References", $opt)) {echo "checked";unset($_SESSION["option1"]);}?>
                              /></td>
                              <td>References</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                          </tbody>
                        </table></TD>
                      <TD>&nbsp;</TD></TR>
                    <TR>
                      <TD align=right height=30><SPAN
                        class=sbgreen></SPAN><STRONG>HRES Apartment Source Pays
                        For :&nbsp;</STRONG></TD>
                      <TD colSpan=4 height=30><STRONG>&nbsp;</STRONG>
                        <table cellspacing="0" cellpadding="0" width="90%"
                          border="0">
                          <tbody>
                            <tr>
                              <td width="7%"><input class="radio"
                              id="LandlordPay_Option"
                              onclick="PayOption_NoUtilities()" type="checkbox"
                              value="No Utilities" name="No_Utilities" />
                              </td>
                              <td width="32%">No Utilities </td>
                              <td width="61%">&nbsp;</td>
                            </tr>
                            <tr>
                              <td><input class="radio" id="LandlordPay_Option"
                              onclick="CheckPayOption_AllUtilities()"
                              type="checkbox" value="Heat"
                            name="hres_apartment[]"
                           <?php if (in_array("Heat", $opt2)) {echo "checked";}?>
                            /></td>
                              <td>Heat</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td><input class="radio" id="LandlordPay_Option"
                              onclick="CheckPayOption_AllUtilities()"
                              type="checkbox" value="Hot Water"
                              name="hres_apartment[]"
                              <?php if (in_array("Heat", $opt2)) {echo "checked";}?>
                              /></td>
                              <td>Hot Water </td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td><input class="radio" id="LandlordPay_Option"
                              onclick="CheckPayOption_AllUtilities()"
                              type="checkbox" value="Electricity"
                              name="hres_apartment[]"
                              <?php if (in_array("Heat", $opt2)) {echo "checked";}?>
                               /></td>
                              <td>Electricity</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td><input class="radio" id="LandlordPay_Option"
                              onclick="CheckPayOption_AllUtilities()"
                              type="checkbox" value="Cooking Gas"
                              name="hres_apartment[]"
                              <?php if (in_array("Heat", $opt2)) {echo "checked";}?>
                              />
                              </td>
                              <td>Cooking Gas </td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td><input class="radio" id="LandlordPay_Option"
                              onclick="PayOption_AllUtilities()" type="checkbox"
                              value="All Utilities" name="hres_apartment[]"
                              <?php if (in_array("Heat", $opt2)) {echo "checked";}?>
                              />
                              </td>
                              <td>All Utilities </td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td></td>
                              <td><input type="hidden" name="CheckPays" /></td>
                              <td>&nbsp;</td>
                            </tr>
                          </tbody>
                        </table></TD>
                      <TD>&nbsp;</TD></TR>
                    <TR>
                      <TD align=right height=58><STRONG>Rental Features
                        :&nbsp;</STRONG></TD>
                      <TD colSpan=4 height=58><table cellspacing="0" cellpadding="0" width="100%"
border="0">
                        <tbody>
                          <tr>
                            <td valign="center"><label>
                              <input class="radio"
                              id="rental_features" type="checkbox"
                              value="Air Conditioning" name="rental_features2[]"
                              <?php if (in_array("Air Conditioning", $opt3)) {echo "checked";}?>
                              />
                            </label></td>
                            <td>Air Conditioning </td>
                            <td><input class="radio" id="rental_features"
                              type="checkbox" value="Carpeting"
                            name="rental_features2[]"
                            <?php if (in_array("Carpeting", $opt3)) {echo "checked";}?>
                             /></td>
                            <td>Carpeting</td>
                            <td><input class="radio" id="rental_features"
                              type="checkbox" value="Dishwasher"
                              name="rental_features2[]"
                              <?php if (in_array("Dishwasher", $opt3)) {echo "checked";}?>

                              /></td>
                            <td>Dishwasher</td>
                          </tr>
                          <tr>
                            <td valign="center"><label>
                              <input class="radio"
                              id="rental_features" type="checkbox" value="Disposal"
                              name="rental_features2[]
                             <?php if (in_array("Disposal", $opt3)) {echo "checked";}?>
                              " />
                            </label></td>
                            <td>Disposal</td>
                            <td><input class="radio" id="rental_features"
                              type="checkbox" value="Eat-In Kitchen"
                              name="rental_features2[]"
                             <?php if (in_array("Eat-In Kitchen", $opt3)) {echo "checked";}?>
                              /></td>
                            <td>Eat-In Kitchen </td>
                            <td><input class="radio" id="rental_features"
                              type="checkbox" value="Furnished"
                            name="rental_features2[]"
                           <?php if (in_array("Furnished", $opt3)) {echo "checked";}?>
                            /></td>
                            <td>Furnished</td>
                          </tr>
                          <tr>
                            <td><input class="radio" id="rental_features"
                              type="checkbox" value="Hardwood Floors"
                              name="rental_features2[]"
                             <?php if (in_array("Hardwood Floors", $opt3)) {echo "checked";}?>
                              /></td>
                            <td>Hardwood Floors</td>
                            <td><input class="radio" id="rental_features"
                              type="checkbox" value="Microwave"
                            name="rental_features2[]"
                           <?php if (in_array("Microwave", $opt3)) {echo "checked";}?>
                            /></td>
                            <td>Microwave</td>
                            <td><input class="radio" id="rental_features"
                              type="checkbox" value="Pets Allowed"
                              name="rental_features2[]"
                             <?php if (in_array("Pets Allowed", $opt3)) {echo "checked";}?>
                              /></td>
                            <td>Pets Allowed </td>
                          </tr>
                          <tr>
                            <td><input class="radio" id="rental_features"
                              type="checkbox" value="Porch Balcony"
                              name="rental_features2[]"
                             <?php if (in_array("Porch Balcony", $opt3)) {echo "checked";}?>
                              /></td>
                            <td>Porch Balcony </td>
                            <td><input class="radio" id="rental_features"
                              type="checkbox" value="Private Yard"
                              name="rental_features2[]"
                             <?php if (in_array("Private Yard", $opt3)) {echo "checked";}?>
                              /></td>
                            <td>Private Yard</td>
                            <td><input class="radio" id="rental_features"
                              type="checkbox" value="Refrigerator"
                              name="rental_features2[]"
                             <?php if (in_array("Refrigerator", $opt3)) {echo "checked";}?>
                              /></td>
                            <td>Refrigerator</td>
                          </tr>
                          <tr>
                            <td><input class="radio" id="rental_features"
                              type="checkbox" value="Shared Yard/Garden"
                              name="rental_features2[]"
                             <?php if (in_array("Shared Yard/Garden", $opt3)) {echo "checked";}?>
                              /></td>
                            <td>Shared Yard/Garden </td>
                            <td><input class="radio" id="rental_features"
                              type="checkbox" value="Separate Dining Room"
                              name="rental_features2[]"
                             <?php if (in_array("Separate Dining Room", $opt3)) {echo "checked";}?>
                              /></td>
                            <td>Separate Dining Room</td>
                            <td><input class="radio" id="rental_features"
                              type="checkbox" value="Smokers Allowed"
                              name="rental_features2[]"
                             <?php if (in_array("Smokers Allowed", $opt3)) {echo "checked";}?>
                              /></td>
                            <td>Smokers Allowed </td>
                          </tr>
                          <tr>
                            <td><input class="radio" id="rental_features"
                              type="checkbox" value="Storage"
                            name="rental_features2[]"
                            <?php if (in_array("Storage", $opt3)) {echo "checked";}?>
                            /></td>
                            <td>Storage </td>
                            <td><input class="radio" id="rental_features"
                              type="checkbox" value="Study/Den"
                            name="rental_features2[]"
                            <?php if (in_array("Study/Den", $opt3)) {echo "checked";}?>
                            /></td>
                            <td>Study/Den</td>
                            <td><input class="radio" id="rental_features"
                              type="checkbox" value="View" name="rental_features2[]"
                             <?php if (in_array("View", $opt3)) {echo "checked";}?>
                              /></td>
                            <td>View</td>
                          </tr>
                          <tr>
                            <td><input class="radio" id="rental_features"
                              type="checkbox" value="Washer/Dryer Access"
                              name="rental_features2[]"
                              <?php if (in_array("Washer/Dryer Access", $opt3)) {echo "checked";}?>
                              /></td>
                            <td>Washer/Dryer Access </td>
                            <td><input class="radio" id="rental_features"
                              type="checkbox" value="Washer/Dryer Hookup"
                              name="rental_features2[]"
                              <?php if (in_array("Washer/Dryer Hookup", $opt3)) {echo "checked";}?>
                              /></td>
                            <td>Washer/Dryer Hookup</td>
                            <td><input class="radio" id="rental_features"
                              type="checkbox" value="Working Fireplace"
                              name="rental_features2[]"
                              <?php if (in_array("Working Fireplace", $opt3)) {echo "checked";}?>
                              /></td>
                            <td>Working Fireplace</td>
                          </tr>
                        </tbody>
                      </table></TD>
                      <TD>&nbsp;</TD></TR>
                    <TR>
                      <TD align=right>&nbsp;</TD>
                      <TD colSpan=4>&nbsp;</TD>
                      <TD>&nbsp;</TD></TR>
                    <TR>
                      <TD align=right height=58><STRONG>Other Features
                        :&nbsp;</STRONG></TD>
                      <TD colSpan=4 height=58><table cellspacing="0" cellpadding="0" width="100%"
border="0">
                        <tbody>
                          <tr>
                            <td><input class="radio" id="community_features"
                              type="checkbox" value="Fitness Center"
                              name="other_features[]"
                              <?php if (in_array("Fitness Center", $opt4)) {echo "checked";}?>
                              /></td>
                            <td>Fitness Center </td>
                            <td><input class="radio" id="community_features"
                              type="checkbox"
                              value="Gated Entrance/Controlled Access"
                              name="other_features[]"
                                     <?php if (in_array("Gated Entrance/Controlled Access", $opt4)) {echo "checked";}?>
                              /></td>
                            <td><p>Gated Entrance/Controlled Access </p></td>
                            <td><input class="radio" id="community_features"
                              type="checkbox" value="Garages"
                              name="other_features[]"
                                     <?php if (in_array("Garages", $opt4)) {echo "checked";}?>
                              /></td>
                            <td>Garages </td>
                          </tr>
                          <tr>
                            <td><input class="radio" id="community_features"
                              type="checkbox" value="Hot Plate"
                              name="other_features[]"
                                     <?php if (in_array("Hot Plate", $opt4)) {echo "checked";}?>
                              /></td>
                            <td>Hot Plate</td>
                            <td><input class="radio" id="community_features"
                              type="checkbox" value="Kitchen Priveleges"
                              name="other_features[]"
                                     <?php if (in_array("Kitchen Priveleges", $opt4)) {echo "checked";}?>
                              /></td>
                            <td>Kitchen Priveleges</td>
                            <td><input class="radio" id="community_features"
                              type="checkbox" value="Linens Supplied"
                              name="other_features[]"
                                     <?php if (in_array("Linens Supplied", $opt4)) {echo "checked";}?>
                              /></td>
                            <td>Linens Supplied </td>
                          </tr>
                          <tr>
                            <td><input class="radio" id="community_features"
                              type="checkbox" value="New Building"
                              name="other_features[]"
                                     <?php if (in_array("New Building", $opt4)) {echo "checked";}?>
                              /></td>
                            <td>New Building </td>
                            <td><input class="radio" id="community_features"
                              type="checkbox" value="Pool"
                            name="other_features[]"
                                   <?php if (in_array("Pool", $opt4)) {echo "checked";}?>
                            /></td>
                            <td>Pool </td>
                            <td><input class="radio" id="community_features"
                              type="checkbox" value="Private Entry"
                              name="other_features[]"
                                     <?php if (in_array("Private Entry", $opt4)) {echo "checked";}?>
                              /></td>
                            <td>Private Entry</td>
                          </tr>
                          <tr>
                            <td><input class="radio" id="community_features"
                              type="checkbox" value="Shared Bath"
                              name="other_features[]"
                                     <?php if (in_array("Shared Bath", $opt4)) {echo "checked";}?>
                              /></td>
                            <td>Shared Bath</td>
                            <td><input class="radio" id="community_features"
                              type="checkbox" value="Spa/Hot Tub/Sauna"
                              name="other_features[]"
                                     <?php if (in_array("Spa/Hot Tub/Sauna", $opt4)) {echo "checked";}?>
                              /></td>
                            <td>Spa/Hot Tub/Sauna</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                        </tbody>
                      </table></TD>
                      <TD>&nbsp;</TD></TR>
                    <TR>
                      <TD align=right>&nbsp;</TD>
                      <TD colSpan=3>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD></TR>
                    <TR>
                      <TD align=right><STRONG>Parking Section :</STRONG></TD>
                      <TD colSpan=4><table cellspacing="0" cellpadding="0" width="100%"
border="0">
                        <tbody>
                          <tr>
                            <td valign="center" width="5%"><label>
                              <input
                              class="radio" id="Parking_Section"
                              onclick="Parking_SectionChk(this)" type="checkbox"
                              value="None" name="Parking_Section2[]"
                              <?php if (in_array("None", $opt5)) {echo "checked";}?>

                              />
                            </label></td>
                            <td colspan="2">None</td>
                            <td width="4%"><input class="radio"
                              id="Parking_Section" type="checkbox" value="On Street"
                              name="Parking_Section2[]"
                              <?php if (in_array("On Street", $opt5)) {echo "checked";}?>
                              /></td>
                            <td width="48%">On street</td>
                            <td width="13%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td valign="center"><label>
                              <input class="radio"
                              id="Parking_Section"
                              onclick="Parking_SectionControler(this, document.NewProfile.GarageAmount)"
                              type="checkbox" value="Garage" name="Parking_Section2[]"
                              <?php if (in_array("Garage", $opt5)) {echo "checked";}?>
                              />
                            </label></td>
                            <td width="14%">Garage</td>
                            <td width="16%">$
                              <input class="inputtext"
                              id="GarageAmount" maxlength="8" size="5"
                              name="GarageAmount"
                              <?php if ($_SESSION["GarageAmount"] != 'Security') {echo "disabled";}
?>
                               value="<?php echo $_SESSION["GarageAmount"] ?>"
                              /></td>
                            <td><input class="radio" id="Parking_Section"
                              type="checkbox" value="Deleaded"
                            name="Parking_Section2[]"
                            <?php if (in_array("Deleaded", $opt5)) {echo "checked";}?>
                            /></td>
                            <td>Deleaded </td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td><input class="radio" id="Parking_Section"
                              type="checkbox" value="Elevator Building"
                              name="Parking_Section2[]"
                              <?php if (in_array("Elevator Building", $opt5)) {echo "checked";}?>
                              /></td>
                            <td colspan="2">Elevator Building </td>
                            <td><input class="radio" id="Parking_Section"
                              type="checkbox" value="Handicap Access"
                              name="Parking_Section2[]"
                              <?php if (in_array("Handicap Access", $opt5)) {echo "checked";}?>
                              /></td>
                            <td>Handicap Access </td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td><input class="radio" id="Parking_Section"
                              onclick="Parking_SectionControler(this, document.NewProfile.OffstreetAmount)"
                              type="checkbox" value="Off Street"
                              name="Parking_Section2[]"
                              <?php if (in_array("Off Street", $opt5)) {echo "checked";}?>
                              /></td>
                            <td>Off street</td>
                            <td>$
                              <input class="inputtext" id="OffstreetAmount"
                              maxlength="8" size="5"  name="OffstreetAmount"

                              <?php if ($_SESSION["OffstreetAmount"] != 'Security') {echo "disabled";}
?>
                               value="<?php echo $_SESSION["OffstreetAmount"] ?>"
                              /></td>
                            <td><input class="radio" id="Parking_Section"
                              type="checkbox" value="Near public transportation"
                              name="Parking_Section2[]"
                              <?php if (in_array("Near public transportation", $opt5)) {echo "checked";}?>
                              /></td>
                            <td>Near public transportation</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td><input class="radio" id="Parking_Section"
                              type="checkbox" value="Owner Occupied"
                              name="Parking_Section2[]"
                              <?php if (in_array("Owner Occupied", $opt5)) {echo "checked";}?>
                              /></td>
                            <td colspan="2">Owner Occupied </td>
                            <td><input class="radio" id="Parking_Section"
                              type="checkbox"
                              value="Walking Distance to Harvard Square"
                              name="Parking_Section2[]"
                              <?php if (in_array("Walking Distance to Harvard Square", $opt5)) {echo "checked";}?>
                              /></td>
                            <td>Walking Distance to Harvard Square </td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td colspan="2">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td colspan="2">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                        </tbody>
                      </table>
                        <SCRIPT>
							function Parking_SectionControler(objOne, objTwo){
								if(objOne.checked==true){
									objTwo.disabled = false;
								}else{
									objTwo.disabled = true;
									objTwo.value = "";
								}
							}
							Parking_SectionControler(document.NewProfile.Parking_Section[6], document.NewProfile.OffstreetAmount);
							Parking_SectionControler(document.NewProfile.Parking_Section[2], document.NewProfile.GarageAmount);
					  </SCRIPT>                      </TD>
                      <TD>&nbsp;</TD></TR>
                    <TR>
                      <TD align=right>&nbsp;</TD>
                      <TD colSpan=3>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD></TR>
                    <TR>
                      <TD align=right height=58><SPAN class=sbgreen><B>*
                        </B></SPAN><STRONG>Additional Details
:&nbsp;</STRONG></TD>
                      <TD colSpan=3 height=58><TEXTAREA class=inputtext id=additionalDetails onKeyDown="CheckCharacters(this, 'additionalDetails_Count', 400);" onBlur="CheckCharacters(this, 'additionalDetails_Count', 400);" onKeyUp="CheckCharacters(this, 'additionalDetails_Count', 400);" onFocus="CheckCharacters(this, 'additionalDetails_Count', 400);" name=additionalDetails
    
                      rows=5 wrap=VIRTUAL cols=60><?php echo  $_SESSION["additional_details"]; ?></TEXTAREA>
                        <BR>
                        <DIV align=right><SPAN
                        class=smallbluetext><B>characters:</B></SPAN>
                        <DIV id=additionalDetails_Count
                        style="DISPLAY: inline">0</DIV>/400 <IMG height=15
                        src="Landlord Application - Add Listing_files/spacer.gif"
                        width=18>                      
                      <?php echo $additional_details_error ?' <p style="color: red; font-size:10px;" >'.$additional_details_error.'<p>' : ""; ?>

                    </DIV>
                        <SCRIPT>CheckCharacters(document.NewProfile.additionalDetails , 'additionalDetails_Count', 400);</SCRIPT>                      </TD>
                      <TD width=151 height=58><I><B>Warning:</B> Please <FONT
                        style="TEXT-DECORATION: underline">do not</FONT> add any
                        contact information here. We already have your contact
                        details.</I></TD>
                      <TD><IMG height=58 alt=""
                        src="Landlord Application - Add Listing_files/spacer.gif"
                        width=1></TD></TR>
                    <TR>
                      <TD align=right>&nbsp;</TD>
                      <TD colSpan=3>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD></TR>
                    <TR>
                      <TD align=right height=71><SPAN class=sbgreen><B>*
                        </B></SPAN><STRONG>I'm Looking For:&nbsp;</STRONG></TD>
                      <TD colSpan=3 height=71><TEXTAREA class=inputtext name=LookingFor rows=5 wrap=VIRTUAL cols=60><?php echo  $_SESSION["im_looking_for"];
    ?></TEXTAREA>
                         <BR>
                        <DIV align=right><SPAN
                        class=smallbluetext><B>characters:</B></SPAN>
                        <DIV id=LookingFor_Count
                        style="DISPLAY: inline">0</DIV>/400 <IMG height=15
                        src="Landlord Application - Add Listing_files/spacer.gif"
                        width=18>

                        <?php echo $im_looking_for_error ?' <p style="color: red; font-size:10px;" >'.$im_looking_for_error.'<p>' : ""; ?>

</DIV>
                        <SCRIPT>
							document.NewProfile.LookingFor.onkeydown = function(){
								CheckCharacters(document.NewProfile.LookingFor, 'LookingFor_Count', 400)
							}
							document.NewProfile.LookingFor.onkeyup = function(){
								CheckCharacters(document.NewProfile.LookingFor, 'LookingFor_Count', 400)
							}
							document.NewProfile.LookingFor.onfocus = function(){
								CheckCharacters(document.NewProfile.LookingFor, 'LookingFor_Count', 400)
							}
							document.NewProfile.LookingFor.onblur = function(){
								CheckCharacters(document.NewProfile.LookingFor, 'LookingFor_Count', 400)
							}
							CheckCharacters(document.NewProfile.LookingFor , 'LookingFor_Count', 400);</SCRIPT>                      </TD>
                      <TD>&nbsp;</TD>
                      <TD><IMG height=71 alt=""
                        src="Landlord Application - Add Listing_files/spacer.gif"
                        width=1></TD></TR>
                    <TR>
                      <TD align=right height=29><SPAN class=sbgreen><STRONG>*
                        </STRONG></SPAN><STRONG>Maximum number of
                        Occupants</STRONG></TD>
                      <TD colSpan=4 height=29>
                        <TABLE cellSpacing=0 cellPadding=0 width=490 border=0>
                          <TBODY>
                          <TR>
                            <TD width=84><INPUT class=greytext maxLength=2
                              size=4 name=NumberOfMembers
                            value="<?php echo  $_SESSION["maximum_number"];?>">
                              
                              <?php echo $maximum_number_error ?' <p style="color: red; font-size:10px;" >'.$maximum_number_error.'<p>' : ""; ?>

                            </TD>
                            <TD width=110>
                              <DIV align=right><STRONG>Preference :
                              </STRONG></DIV></TD>
                            <TD width=20><INPUT class=radio id=Preference
                              type=checkbox value=Male name=Preference></TD>
                            <TD width=51>Male(s)</TD>
                            <TD width=20><INPUT class=radio id=Preference
                              type=checkbox value=Female name=Preference></TD>
                            <TD width=205>Female(s)</TD></TR></TBODY></TABLE></TD>
                      <TD>&nbsp;</TD></TR>
                    <TR>
                      <TD class=greentext align=right height=29><SPAN
                        class=sbgreen><B><!--*//--></B></SPAN><!--<input name="tnc" type="checkbox" class="radio" id="tnc"  />//--><INPUT
                        class=radio id=tnc type=hidden value=checked name=tnc>                      </TD>
                      <TD colSpan=4 height=29><!--I've read and agree to the Landlord Terms of Service &amp; Privacy Policy //--></TD>
                      <TD>&nbsp;</TD></TR>
                    <TR>
                      <TD class=greentext align=right colSpan=5>&nbsp;</TD>
                      <TD>&nbsp;</TD></TR>
                    <TR>
                      <TD class=greentext align=right height=35>&nbsp;</TD>
                      <TD class=greentext colSpan=3 height=35>
                        <DIV align=center><INPUT id=Affiliation type=hidden
                        value=2 name=Affiliation> <INPUT id=PartnerID
                        type=hidden value=1 name=PartnerID> <INPUT class=button  http-equiv="refresh" type="reset" value=Reset name=Reset>
                 
                       
                        &nbsp; <INPUT class=button type=submit value="Save &amp; Continue" name=SubmitAdd>
                        </DIV></TD>
                      <TD height=35>&nbsp;</TD>
                      <TD>&nbsp;</TD></TR></TBODY></TABLE>
                  <SCRIPT>
					function EnableDisable(checkbox, textbox){
							if(checkbox.checked==true){
								textbox.value="";
								textbox.disabled=false;
							}else{
								textbox.disabled=true;
								textbox.value="";
							}
						}
					function EnableDisable1(checkbox, textbox){
							if(checkbox.value=="Lease"){
								textbox.disabled=false;
							}
							else{
								textbox.disabled=true;
							}
						}
					</SCRIPT>
                  </FORM></TD>
                <TD class=rightborder><IMG height=40 alt=""
                  src="Landlord Application - Add Listing_files/s.gif"
                width=2></TD>
                <TD><IMG height=40 alt=""
                  src="Landlord Application - Add Listing_files/s.gif"
                width=1></TD></TR>
              <TR>
                <TD class=bottomleftcorner><IMG height=7 alt=""
                  src="Landlord Application - Add Listing_files/s.gif"
                width=7></TD>
                <TD class=bottomborder><IMG height=7 alt=""
                  src="Landlord Application - Add Listing_files/s.gif"
                width=662></TD>
                <TD class=bottomrightcorner><IMG height=7 alt=""
                  src="Landlord Application - Add Listing_files/s.gif"
                width=7></TD>
                <TD><IMG height=7 alt=""
                  src="Landlord Application - Add Listing_files/s.gif"
                width=1></TD></TR>
              <TR>
                <TD><IMG height=1 alt=""
                  src="Landlord Application - Add Listing_files/s.gif"
                width=7></TD>
                <TD><IMG height=1 alt=""
                  src="Landlord Application - Add Listing_files/s.gif"
                width=662></TD>
                <TD><IMG height=1 alt=""
                  src="Landlord Application - Add Listing_files/s.gif"
                width=7></TD>
                <TD></TD></TR></TBODY></TABLE><!-- Add listing form end --></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE>
</BODY></HTML>