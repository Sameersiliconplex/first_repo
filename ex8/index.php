
<?php
require_once "connection.php";
session_start();
if (isset($_POST['Reset'])) {
  header("location:index.php");
}
if (isset($_POST['SubmitAdd'])) {

    $_SESSION["property_name"] = $property_name = $_POST['propertyName'];
    $_SESSION["location"] = $location = $_POST['Location'];
    $_SESSION["city"] = $city = $_POST['city'];
    $_SESSION["state"] = $state = $_POST['state'];
    $_SESSION["zip"] = $zip = $_POST['zip'];

    $_SESSION["appartment"] = $appartment = $_POST['ApartmentNo'];
    $_SESSION["floor"] = $floor = $_POST['FloorLevel'];
    $_SESSION["street"] = $street = $_POST['StreetNo'];
    $_SESSION["street_level"] = $street_level = $_POST['StreetLetter'];

    $_SESSION["rent"] = $rent = $_POST['RentAmount'];
    $_SESSION["bed"] = $bed = $_POST['Bedrooms'];
    $_SESSION["deposite"] = $deposite = $_POST['DepositAmount'];
    $_SESSION["bath"] = $bath = $_POST['Bathrooms'];

    $_SESSION["utility"] = $utility = $_POST['Utilities'];
    $_SESSION["building"] = $building = $_POST['BuildingTypeID'];

    //skip dates
    $_SESSION["room_furnished"] = $room_furnished = $_POST['IsRoomFurnished'];
    $_SESSION["date_negotiable"] = $date_negotiable = $_POST['DateNegotiable'];

    //Lease Type
    $_SESSION["leasetype"] = $leasetype = $_POST['LeaseType'];
    $_SESSION["lease_type_value"] = $lease_type_value = $_POST['LeaseType_Value'];

    // sq.fts and intersection
    $_SESSION["fts"] = $fts = $_POST['sqft'];
    $_SESSION["inter"] = $inter = $_POST['intersection'];

    //last four field
    $_SESSION["additional_details"] = $additional_details = $_POST['additionalDetails']; //*
    $_SESSION["im_looking_for"] = $im_looking_for = $_POST['LookingFor']; //*
    $_SESSION["maximum_number"] = $maximum_number = $_POST['NumberOfMembers']; //*
    $_SESSION["preference"] = $preference = $_POST['Preference'];

    // date and time
    $_SESSION["dated"] = $date = $_POST['AvailDay'];
    $_SESSION["month"] = $month = $_POST['AvailMonth'];
    $_SESSION["year"] = $year = $_POST['AvailYear'];

    // 1)Required
    // $_SESSION["required"] = $required = json_encode($_POST['Required']);
    $_SESSION["required"] = $required = $_POST['Required'];
    $_SESSION["security_amount"] = $security_amount = $_POST['SecurityAmount'];
    $_SESSION["brokerfee_amount"] = $brokerfee_amount = $_POST['BrokerFeeAmount'];

    // $required_db = "";
    // foreach (json_decode($required) as $required_data) {
    //     $required_db .= $required_data . ",";

    // }

    // 2)hres_apartment
    // $hres = "";
    $_SESSION["No_Utilities"] = $No_Utilities = $_POST['No_Utilities'];
    $_SESSION['hres_apartment'] = $hres_apartment = $_POST['hres_apartment'];


    // if ($hres_apartment) {
    //     foreach (json_decode($hres_apartment) as $hres_data) {
    //         $hres .= $hres_data . ",";
    //     }
    // } else {
    //     $No_Utilities = $hres;
    // }

    // 3)rental_features
    $_SESSION["rental_features"] = $community_feature = $_POST['rental_features2'];
    // $rental_features_db = "";
    // foreach (json_decode($rental_features) as $rent_data) {
    //     $rental_features_db .= $rent_data . ",";

    // }
  
    // 4)other_features
    $_SESSION["other_features"] = $other_features = $_POST['other_features'];
    // $community_features_db = "";
    // foreach (json_decode($other_features) as $other_data) {
    //     $community_features_db .= $other_data . ",";
    // var_dump($other_features);
    // die;

    // }

    // 5) parking_section
    $_SESSION["parking_section"] = $parking_section =$_POST['Parking_Section2'];
    $_SESSION["garage_amount"] = $garage_amount = $_POST['GarageAmount'];
    $_SESSION["off_street_amount"] = $off_street_amount = $_POST['OffstreetAmount'];
    // $parking_section[]= "";

    // foreach (json_decode($parking_section) as $parking_data) {
    //     $parking_section[]_db .= $parking_data . ",";
    // }

    // //Date and time
    // $_SESSION["dateandtime"] = $AvailMonth = json_encode($_POST['dateandtime']);

    // if blank box
    // "This Field is Required";
    $property_name_error = empty($_POST['propertyName']) ? "This Field is Required" : ""; //1
    $city_error = empty($city) ? "Please Select the value" : ""; //2
    $zip_error = empty($zip) ? "Please Select the value" : ""; //3

    $state_error = empty($state) ? "Please select one" : ""; //4

    $rent_error = empty($rent) ? "Please Enter Rent_Amount" : ""; //5
    $bed_error = empty($bed) ? "Please Select one !!" : ""; //6
    $bath_error = empty($bath) ? "Please Select one" : ""; //7
    $inter_error = empty($inter) ? "Please Enter" : ""; //8
    $im_looking_for_error = empty($im_looking_for) ? "Please fill up" : ""; //9
    $fts_error = empty($fts) ? "Please Enter" : ""; //10
    $additional_details_error = empty($additional_details) ? "Enter addition details" : ""; //11
    $maximum_number_error = empty($maximum_number) ? "Please Enter" : ""; //12
    // $date_error = empty($date) || empty($month) || empty($year) ? "Please Select Correct Date" : ""; //13

    // if(empty($property_name_error)|| empty( $city_error)||empty( $zip_error)||empty($state_error) ||empty($rent_error)||empty($bed_error)
    // ||empty($bath_error)||empty($inter_error)||empty($im_looking_for_error)||empty($fts_error)||empty($additional_details_error)||empty($maximum_number_error))
    
    if (empty($property_name_error) && empty($city_error) && empty($zip_error) && empty($state_error) &&
        empty($rent_error) && empty($im_looking_for_error) && empty($fts_error) &&
        empty($additional_details_error) && empty($maximum_number_error) && empty($bath_error) && empty($inter_error) &&  empty($date_error)
    )
    {
    $data = "INSERT INTO `addproperty`(`name`,`location`,`city`,`state`,`appartment_no`,`zip`,`floor_level`,`street_no`,`street_letter`,`rent`,`bathroom`,`bedroom`,`deposit`,`cost_of_utility`,`building_type`,`room_furnished`,`date_negotiable`,`sq_fit`,`inters`,`leased_type`,`leased`,`addition_details`,`im_look`,`max_no`,`preference`)
        VALUES('$property_name', '$location','$city','$state','$appartment','$zip','$floor','$street','$street_level','$rent','$bath','$bed','$deposite','$utility','$building','$room_furnished','$date_negotiable','$fts','$inter','$leasetype','$lease_type_value','$additional_details','$im_looking_for','$maximum_number','$preference')";

    $exc = mysqli_query($conn, $data);
    if ($exc) {
      $last_id = $conn->insert_id;


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
    }

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
        header("location:index.php");
      }
  }
}
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
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

  function Parking_SectionChk(checkbox)
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
$opt = $required;

$opt2 = $hres_apartment;

$opt3 = $community_feature;

$opt4 = $other_features;

$opt5 = $parking_section;

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
                        id=propertyName maxLength=100  name=propertyName value="<?=$property_name ? "$property_name" : ""?>" >
                        <?=$property_name_error ? '<p style="color:red; font-size: 10px;">' . $property_name_error . '</p>' : '';?>

                      </TD>
                      <TD>&nbsp;</TD></TR>
                    <TR>
                      <TD align=right height=29><SPAN
                        class=sbgreen></SPAN><STRONG>Location:</STRONG>&nbsp;</TD>
                      <TD colSpan=4 height=29><SELECT class=inputtext
                        id=Location name=Location > <OPTION
                        <?=$location == 'AG' ? "selected" : "";
?>

                        value=AG selected>AGASSIZ</OPTION>

                        <OPTION
                        <?=$location == 'AH' ? "selected" : "";?>
                        value=AH>AVON
                          HILL</OPTION>


                          <?=$location == 'BR' ? "selected" : "";?>
                            value=BR>BRATTLE</OPTION>
                          <OPTION
                          <?=$location == 'CP' ? "selected" : "";?>
                           value=CP>CAMBRIDGEPORT</OPTION>
                           <OPTION
                           <?=$location == 'CS' ? "selected" : "";?>
                            value=CS>CENTRAL SQUARE</OPTION>
                           <OPTION
                           <?=$location == 'EC' ? "selected" : "";?>
                            value=EC>EAST CAMBRIDGE</OPTION>
                          <OPTION
                          <?=$location == 'FE' ? "selected" : "";?>
                           value=FE>FRESH POND EAST</OPTION>
                          <OPTION
                          <?=$location == 'FS' ? "selected" : "";?>
                           value=FS>FRESH POND SOUTH</OPTION>
                          <OPTION
                          <?=$location == 'FW' ? "selected" : "";?>
                           value=FW>FENWAY</OPTION>
                          <OPTION
                          <?=$location == 'HS' ? "selected" : "";?>
                           value=HS>HARVARD SQUARE</OPTION>
                          <OPTION
                          <?=$location == 'IS' ? "selected" : "";?>
                           value=IS>INMAN SQUARE</OPTION>

                          <OPTION
                          <?=$location == 'MC' ? "selected" : "";?>
                           value=MC>MID-CAMBRIDGE</OPTION>
                          <OPTION
                          <?=$location == 'NC' ? "selected" : "";?>
                           value=NC>NORTH CAMBRIDGE</OPTION>
                          <OPTION
                          <?=$location == 'OT' ? "selected" : "";?>
                           value=OT>OUTSIDE CAMBRIDGE</OPTION>
                          <OPTION
                          <?=$location == 'PS' ? "selected" : "";?>
                           value=PS>PORTER SQUARE</OPTION>
                          <OPTION
                          <?=$location == 'RV' ? "selected" : "";?>
                           value=RV>RIVERSIDE</OPTION>
                          <OPTION
                          <?=$location == 'SC' ? "selected" : "";?>
                           value=SC>SOMERVILLE</OPTION></SELECT> </TD>
                      <TD>&nbsp;</TD></TR>
                      <TR>
                      <TD align=right height=29><SPAN class=sbgreen><B>*
                        </B></SPAN><STRONG>City:</STRONG>&nbsp;</TD>
                      <TD colSpan=4 height=29>
                        <TABLE cellSpacing=0 cellPadding=0 width=100 border=0>
                          <TBODY>
                          <TR>
                            <TD width=10><INPUT class=radio type=radio
                              value=City1 name=city  <?=$city == "City1" ? "checked" : "";?> > </TD>
                            <TD width=90>City1&nbsp;&nbsp;&nbsp;&nbsp; </TD>
                            <TD width=10><INPUT class=radio type=radio
                              value=City2 name=city <?=$city == "City2" ? "checked" : "";?> > </TD>
                            <TD width=90>City2&nbsp;&nbsp;&nbsp;&nbsp; </TD>
                            <TD width=10><INPUT class=radio type=radio
                              value=City3 <?=$city == "City3" ? "checked" : "";?> name=city> </TD>
                            <TD width=90>City3&nbsp;&nbsp;&nbsp;&nbsp; </TD>
                            <TD width=10><INPUT class=radio type=radio
                              value=City4 <?=$city == "City4" ? "checked" : "";?> name=city> </TD>
                            <TD width=90>City4&nbsp;&nbsp;&nbsp;&nbsp; </TD>
                            <TD width=10><INPUT class=radio type=radio
                              value=City5 <?=$city == "City5" ? "checked" : "";?> name=city> </TD>
                            <TD width=90>City5&nbsp;&nbsp;&nbsp;&nbsp; </TD>
                          <TR>
                            <TD width=10><INPUT class=radio type=radio
                              value=City6 <?=$city == "City6" ? "checked" : "";?> name=city> </TD>
                            <TD width=90>City6&nbsp;&nbsp;&nbsp;&nbsp; </TD>
                            <TD width=10><INPUT class=radio type=radio
                              value=City7 <?=$city == "City7" ? "checked" : "";?> name=city> </TD>
                            <TD width=90>City7&nbsp;&nbsp;&nbsp;&nbsp; </TD>
                            <TD width=10><INPUT class=radio type=radio
                              value=City8 <?=$city == "City8" ? "checked" : "";?> name=city> </TD>
                            <TD width=90>City8&nbsp;&nbsp;&nbsp;&nbsp; </TD>


                            <TD width=10><INPUT class=radio type=radio
                              value=City9 name=city> <?=$city == "City9" ? "checked" : "";?> </TD>
                            <TD width=90>City9&nbsp;&nbsp;&nbsp;&nbsp; </TD>


                            <TD width=10 class="d-flex flex-column"><INPUT class=radio type=radio
                            value=City10 <?=$city == "City10" ? "checked" : "";?> name=city>
                          </TD>
                          <TD width=90>City10&nbsp;&nbsp;&nbsp;&nbsp; </TD>

                          </TR>
                          <tr>
                            <td colspan="10">
                            <?=$city_error ? '<p style="color:red; font-size: 10px;">' . $city_error . '</p>' : '';?>


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
                           <OPTION <?=$state == "Alaska" ? "selected" : "";?> value=Alaska>Alaska</OPTION>
                          <OPTION <?=$state == "Arizona" ? "selected" : "";?>  value=Arizona>Arizona</OPTION>
                           <OPTION <?=$state == "Arkansas" ? "selected" : "";?> value=Arkansas>Arkansas</OPTION>
                         <OPTION <?=$state == "California" ? "selected" : "";?> value=California>California</OPTION>
                         <OPTION <?=$state == "Colorado" ? "selected" : "";?> value=Colorado>Colorado</OPTION>
                         <OPTION <?=$state == "Connecticut" ? "selected" : "";?> value=Connecticut>Connecticut</OPTION>
                         <OPTION <?=$state == "Delaware" ? "selected" : "";?> value=Delaware>Delaware</OPTION>
                         <OPTION <?=$state == "District of Columbia" ? "selected" : "";?> value="District of Columbia">District of Columbia</OPTION>
                         <OPTION <?=$state == "Florida" ? "selected" : "";?> value=Florida>Florida</OPTION>
                         <OPTION <?=$state == "Georgia" ? "selected" : "";?> value=Georgia>Georgia</OPTION>
                          <OPTION
                          <?=$state == "Guam" ? "selected" : "";?> value=Guam>Guam</OPTION>
                           <OPTION
                           <?=$state == "Hawaii" ? "selected" : "";?> value=Hawaii>Hawaii</OPTION>
                           <OPTION
                           <?=$state == "Idaho" ? "selected" : "";?> value=Idaho>Idaho</OPTION>
                          <OPTION
                          <?=$state == "Illinois" ? "selected" : "";?> value=Illinois>Illinois</OPTION>
                          <OPTION
                          <?=$state == "Indiana" ? "selected" : "";?> value=Indiana>Indiana</OPTION>
                           <OPTION
                          <?=$state == "Iowa" ? "selected" : "";?> value=Iowa>Iowa</OPTION>
                           <OPTION
                           <?=$state == "Kansas" ? "selected" : "";?>value=Kansas>Kansas</OPTION>
                           <OPTION
                         <?=$state == "Kentucky" ? "selected" : "";?>  value=Kentucky>Kentucky</OPTION>
                           <OPTION
                         <?=$state == "Louisiana" ? "selected" : "";?>  value=Louisiana>Louisiana</OPTION>
                           <OPTION
                         <?=$state == "Maine" ? "selected" : "";?>  value=Maine>Maine</OPTION>
                           <OPTION
                         <?=$state == "Maryland" ? "selected" : "";?>  value=Maryland>Maryland</OPTION>
                           <OPTION
                         <?=$state == "Massachusetts" ? "selected" : "";?>  value=Massachusetts>Massachusetts</OPTION>
                           <OPTION
                        <?=$state == "Michigan" ? "selected" : "";?>   value=Michigan>Michigan</OPTION>
                           <OPTION
                         <?=$state == "Minnesota" ? "selected" : "";?>  value=Minnesota>Minnesota</OPTION>
                           <OPTION
                         <?=$state == "Mississippi" ? "selected" : "";?>  value=Mississippi>Mississippi</OPTION>
                         </SELECT>
                    <!-- /////// -->

                    <?=$state_error ? '<p style="color:red; font-size: 10px;">' . $state_error . '</p>' : '';?>
                        </TD>

                      <TD align=right height=29><SPAN class=sbgreen><B>*
                        </B></SPAN><STRONG>Zip:</STRONG>&nbsp;</TD>
                      <TD colSpan=2 height=29><INPUT class=inputtext id=zip
                        maxLength=100 name=zip value="<?=$zip ? "$zip" : "";?>" >

                        <?=$zip_error ? '<p style="color:red; font-size: 10px;">' . $zip_error . '</p>' : '';?>


                      </TD>
                      <TD>&nbsp;</TD></TR>
                    <TR>
                      <TD align=right height=29><STRONG>Apartment No
                        :</STRONG>&nbsp;</TD>
                      <TD height=29><INPUT class=inputtext id=ApartmentNo
                        maxLength=100 name=ApartmentNo value="<?=$appartment ? "$appartment" : "";?>" ></TD>
                      <TD align=right height=29><STRONG>Floor
                      Level:</STRONG>&nbsp;</TD>
                      <TD colSpan=2 height=29><INPUT class=inputtext
                        id=FloorLevel maxLength=100 name=FloorLevel type="number" value="<?=$floor ? "$floor" : "";?>"  ></TD>
                      <TD>&nbsp;</TD></TR>
                    <TR>
                      <TD align=right height=29><STRONG>Street
                      No:</STRONG>&nbsp;</TD>
                      <TD height=29><INPUT class=inputtext id=StreetNo
                        maxLength=100 name=StreetNo type="number" value="<?=$street ? "$street" : "";?>" ></TD></TD>
                      <TD align=right height=29><STRONG>Street Letter
                        :</STRONG>&nbsp;</TD>
                      <TD colSpan=2 height=29><INPUT class=inputtext
                        id=StreetLetter maxLength=100 name=StreetLetter  value="<?=$street_level ? "$street_level" : "";?>"   </TD>
                      <TD>&nbsp;</TD></TR>
                    <TR>
                      <TD align=right height=29><SPAN class=sbgreen><B>*
                        </B></SPAN><STRONG>Rent:&nbsp;</STRONG></TD>
                      <TD width=193 height=29><STRONG>$</STRONG> <INPUT
                        class=inputtext maxLength=5 size=6 type="number" name=RentAmount value="<?=$rent ? "$rent" : "";?>">
                        <?=$rent_error ? '<p style="color:red; font-size: 10px;">' . $rent_error . '</p>' : '';?>

                      </TD>
                      <TD align=right width=156 height=29><SPAN
                        class=sbgreen><B>*
                        </B></SPAN><STRONG>Bedrooms:&nbsp;</STRONG></TD>
                      <TD colSpan=2 height=29><SELECT class=inputtext
                        name=Bedrooms> <OPTION value="" selected>Please Select</OPTION>
                          <OPTION <?=$bed == "1" ? "selected" : "";?> value=1>1</OPTION>
                          <OPTION <?=$bed == "2" ? "selected" : "";?>value=2>2</OPTION>
                          <OPTION <?=$bed == "3" ? "selected" : "";?>value=3>3</OPTION>
                           <OPTION
                           <?=$bed == "4" ? "selected" : "";?> value=4>4</OPTION></SELECT>
                        <?=$bed_error ? '<p style="color:red; font-size: 10px;">' . $bed_error . '</p>' : '';?>

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
name=DepositAmount type="number" value="<?=$rent ? "$rent" : "";?>" ></TD>
                      <TD align=right width=156 height=29><SPAN
                        class=sbgreen><B>*
                        </B></SPAN><STRONG>Bathrooms:&nbsp;</STRONG></TD>
                      <TD colSpan=2 height=29><SELECT class=inputtext

                        name=Bathrooms> <OPTION value="" selected>Please Select

                        </OPTION>
                          <OPTION  <?=$bath == "2" ? "selected" : "";?> value=2>2</OPTION>
                          <OPTION <?=$bath == "3" ? "selected" : "";?> value=3>3</OPTION>
                          <OPTION <?=$bath == "4" ? "selected" : "";?> value=4>4</OPTION>
                          <OPTION
                          <?=$bath == "5" ? "selected" : "";?> value=5>5</OPTION> </SELECT>
                        <?=$bath_error ? '<p style="color:red; font-size: 10px;">' . $bath_error . '</p>' : '';?>

                        <SCRIPT>

						</SCRIPT>                         </TD>
                      <TD><IMG height=29 alt=""
                        src="Landlord Application - Add Listing_files/spacer.gif"
                        width=1></TD></TR>
                    <TR>
                      <TD align=right height=29><STRONG>Cost Of
                        Utilities:&nbsp;</STRONG> </TD>
                      <TD width=193 height=29><STRONG>$</STRONG> <INPUT
                        class=inputtext maxLength=5 size=6 name=Utilities type="number" value="<?=$utility ? "$utility" : "";?>" >
                        <I>per month</I></TD>
                      <TD align=right width=156 height=29><STRONG>Building
                        Type:&nbsp;</STRONG> </TD>
                      <TD colSpan=2 height=29><SELECT class=inputtext
                        name=BuildingTypeID> <OPTION  value=0 <?=$building == '0' ? "selected" : "";?>
                          selected>Room</OPTION> <OPTION
                          <?=$building == '1' ? "selected" : "";?> value=1>High
                          Rise</OPTION> <OPTION <?=$building == '2' ? "selected" : "";?> value=2>Low Rise</OPTION>
                          <OPTION <?=$building == '3' ? "selected" : "";?> value=3>House</OPTION> <OPTION
                          <?=$building == '4' ? "selected" : "";?> value=4>Brownstone</OPTION> <OPTION
                          <?=$building == '5' ? "selected" : "";?> value=5>Apartment</OPTION> <OPTION
                          <?=$building == '6' ? "selected" : "";?> value=6>Townhouse</OPTION> <OPTION
                          <?=$building == '7' ? "selected" : "";?> value=7>Other</OPTION></SELECT> </TD>
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
                          <OPTION  value="" selected>Please Select</OPTION>
                        <OPTION <?=$month == '1' ? "selected" : "";?>  value=1>Jan</OPTION>
                        <OPTION <?=$month == '2' ? "selected" : "";?> value=2>Feb</OPTION>
                        <OPTION <?=$month == '3' ? "selected" : "";?> value=3>Mar</OPTION>
                        <OPTION <?=$month == '4' ? "selected" : "";?> value=4>Apr</OPTION>
                        <OPTION <?=$month == '6' ? "selected" : "";?> value=5>May</OPTION>
                        <OPTION <?=$month == '7' ? "selected" : "";?> value=6>Jun</OPTION> <OPTION value=7>Jul</OPTION>
                        <OPTION <?=$month == '8' ? "selected" : "";?> value=8>Aug</OPTION>
                        <OPTION <?=$month == '9' ? "selected" : "";?> value=9>Sep</OPTION>
                        <OPTION <?=$month == '10' ? "selected" : "";?> value=10>Oct</OPTION>
                        <OPTION <?=$month == '11' ? "selected" : "";?> value=11>Nov</OPTION>
                        <OPTION <?=$month == '12' ? "selected" : "";?> value=12>Dec</OPTION></SELECT>
                        <SELECT class=inputtext
                        name=AvailDay>
                          <OPTION value="">Please Select</OPTION>
                        <OPTION <?=$date == '1' ? "selected" : "";?> value=1>1</OPTION>
                        <OPTION <?=$date == '2' ? "selected" : "";?> value=2>2</OPTION>
                        <OPTION <?=$date == '3' ? "selected" : "";?> value=3>3</OPTION>
                        <OPTION <?=$date == '4' ? "selected" : "";?> value=4>4</OPTION>
                        <OPTION <?=$date == '5' ? "selected" : "";?> value=5>5</OPTION>
                        <OPTION <?=$date == '6' ? "selected" : "";?> value=6>6</OPTION>
                        <OPTION <?=$date == '7' ? "selected" : "";?> value=7>7</OPTION>
                        <OPTION <?=$date == '8' ? "selected" : "";?> value=8>8</OPTION>
                        <OPTION <?=$date == '9' ? "selected" : "";?> value=9>9</OPTION>
                        <OPTION <?=$date == '10' ? "selected" : "";?> value=10>10</OPTION>
                        <OPTION <?=$date == '11' ? "selected" : "";?> value=11>11</OPTION>
                        <OPTION <?=$date == '12' ? "selected" : "";?> value=12>12</OPTION>
                        <OPTION <?=$date == '13' ? "selected" : "";?> value=13>13</OPTION>
                        <OPTION <?=$date == '14' ? "selected" : "";?> value=14>14</OPTION>
                        <OPTION <?=$date == '15' ? "selected" : "";?> value=15>15</OPTION>
                        <OPTION <?=$date == '16' ? "selected" : "";?> value=16>16</OPTION>
                        <OPTION <?=$date == '17' ? "selected" : "";?> value=17>17</OPTION>
                        <OPTION <?=$date == '18' ? "selected" : "";?> value=18>18</OPTION>
                        <OPTION <?=$date == '19' ? "selected" : "";?> value=19>19</OPTION>
                        <OPTION <?=$date == '20' ? "selected" : "";?> value=20>20</OPTION>
                        <OPTION <?=$date == '21' ? "selected" : "";?> value=21>21</OPTION>
                        <OPTION <?=$date == '22' ? "selected" : "";?> value=22>22</OPTION>
                        <OPTION <?=$date == '23' ? "selected" : "";?> value=23>23</OPTION>
                        <OPTION <?=$date == '24' ? "selected" : "";?> value=24>24</OPTION>
                        <OPTION <?=$date == '25' ? "selected" : "";?> value=25>25</OPTION>
                        <OPTION <?=$date == '26' ? "selected" : "";?> value=26>26</OPTION>
                        <OPTION <?=$date == '27' ? "selected" : "";?> value=27>27</OPTION>
                        <OPTION <?=$date == '28' ? "selected" : "";?> value=28>28</OPTION>
                        <OPTION <?=$date == '29' ? "selected" : "";?> value=29>29</OPTION>
                        <OPTION <?=$date == '30' ? "selected" : "";?> value=30>30</OPTION>
                        <OPTION <?=$date == '31' ? "selected" : "";?> value=31>31</OPTION></SELECT>

                        <SELECT class=inputtext onchange=checkDays();  name=AvailYear>
                          <OPTION value="" >Please Select</OPTION>
                          <OPTION <?=$year == '2007' ? "selected" : "";?> value=2007>2007</OPTION>
                          <OPTION <?=$year == '2008' ? "selected" : "";?> value=2008>2008</OPTION>
                          <OPTION <?=$year == '2009' ? "selected" : "";?> value=2009>2009</OPTION>
                          <OPTION <?=$year == '2010' ? "selected" : "";?> value=2010>2010</OPTION>
                          <OPTION <?=$year == '2011' ? "selected" : "";?> value=2011>2011</OPTION>
                          <OPTION <?=$year == '2012' ? "selected" : "";?> value=2012>2012</OPTION>
                          <OPTION <?=$year == '2006' ? "selected" : "";?> value=2006>2006</OPTION>
                          <OPTION <?=$year == '2013' ? "selected" : "";?> value=2013>2013</OPTION>
                          <OPTION <?=$year == '2014' ? "selected" : "";?> value=2014>2014</OPTION>
                          <OPTION <?=$year == '2015' ? "selected" : "";?> value=2015>2015</OPTION>
                          <OPTION <?=$year == '2016' ? "selected" : "";?> value=2016>2016</OPTION>
                          <OPTION <?=$year == '2017' ? "selected" : "";?> value=2017>2017</OPTION>
                          <OPTION <?=$year == '2018' ? "selected" : "";?> value=2018>2018</OPTION>
                          <OPTION <?=$year == '2019' ? "selected" : "";?> value=2019>2019</OPTION>
                          <OPTION <?=$year == '2020' ? "selected" : "";?> value=2020>2020</OPTION>
                          <OPTION <?=$year == '2021' ? "selected" : "";?> value=2021>2021</OPTION>
                          <OPTION <?=$year == '2022' ? "selected" : "";?> value=2022>2022</OPTION>
                          <OPTION <?=$year == '2023' ? "selected" : "";?> value=2023>2023</OPTION>
                        </SELECT>
                        <SCRIPT>

							currdate();

							checkDays();
						</SCRIPT>
          <?=$date_error ? '<p style="color:red; font-size: 10px;">' . $date_error . '</p>' : '';?>

          </TD>
                      <TD align=right width=156 height=29><STRONG>Room
                        Furnished:&nbsp;</STRONG></TD>
                      <TD colSpan=2 height=29><INPUT class=radio type=checkbox
                        name=IsRoomFurnished  <?php if ($room_furnished == true) {echo "checked";}?>  ></TD>
                      <TD><IMG height=29 alt=""
                        src="Landlord Application - Add Listing_files/spacer.gif"
                        width=1></TD></TR>
                    <TR>
                      <TD align=right height=30><STRONG>Dates Negotiable
                        :&nbsp;</STRONG></TD>
                      <TD height=30><!--<input name="sqft" class="inputtext" id="sqft" value="" size="8" maxlength="6" />//--><INPUT
                        class=radio id=DateNegotiable type=checkbox value=Yes
                        name=DateNegotiable  <?php if ($date_negotiable == true) {echo "checked";}?> > </TD>
                      <TD align=right height=30>&nbsp;</TD>
                      <TD colSpan=2 height=30>&nbsp;</TD>
                      <TD>&nbsp;</TD></TR>
                    <TR>
                      <TD align=right height=30><SPAN class=sbgreen><B>*
                        </B></SPAN><STRONG>Sq. Ft:&nbsp;</STRONG>
                        <?=$fts_error ? '<p style="color:red; font-size: 10px;">' . $fts_error . '</p>' : '';?>

                      </TD>
                      <TD height=30><!--<input name=sqft class="inputtext" id="sqft" value="" size="8" maxlength="6">//--><INPUT
                        class=inputtext id=sqft maxLength=6 size=8 name=sqft  type="number"
                        value="<?=$fts ? "$fts" : "";?>"
                        > <!--<select name=sqft class="inputtext">

	  						  <option value="" selected></option>

	  						  <option value=""></option>

						</select>//--></TD>
                      <TD align=right height=30><SPAN class=sbgreen><B>*
                        </B></SPAN><STRONG>Intersection:&nbsp;</STRONG></TD>
                      <TD colSpan=2 height=30><INPUT class=inputtext
                        id=intersection maxLength=255 name=intersection
                        value="<?=$inter ? "$inter" : "";?>"
                        >
                        <?=$inter_error ? '<p style="color:red; font-size: 10px;">' . $inter_error . '</p>' : '';?>

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
                              type=radio  <?php if ($leasetype == 'Lease') {echo "checked";}?>  value=Lease name=LeaseType> </TD>
                            <TD width="15%">Lease </TD>
                            <TD width="17%">


                            <SELECT class=inputtext
                              id=LeaseType_Value  name=LeaseType_Value <?php if ($_COOKIE['lease_type'] != 'Lease') {echo "disabled";}?>>
                              <OPTION <?php if ($lease_type_value == 'Lease 1') {echo "selected";}?> value="Lease 1">Lease 1</OPTION>
                              <OPTION <?php if ($lease_type_value == 'Lease 2') {echo "selected";}?> value="Lease 2">Lease 2</OPTION>
                              <OPTION <?php if ($lease_type_value == 'Lease 3') {echo "selected";}?> value="Lease 3">Lease 3</OPTION>
                            </SELECT>
                           </TD>

                            <TD width="61%">&nbsp;</TD></TR>


                            <TR>
                            <TD><INPUT class=radio
                              onclick="EnableDisable1(this, NewProfile.LeaseType_Value);"
                              type=radio value=TAW name=LeaseType

                              <?php if ($leasetype == 'TAW') {echo "checked";}?>
                           > </TD>
                            <TD colSpan=3>TAW (Tenant at Will)</TD></TR>
                          <TR>
                            <TD><INPUT class=radio
                              onclick="EnableDisable1(this, NewProfile.LeaseType_Value);"
                              type=radio
                              <?php if ($leasetype == 'Short Term Rental') {echo "checked";}?>  value="Short Term Rental"
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
                            <?php if ($security_amount != 'Security') {echo "disabled";}
?>
                               value="<?php echo $security_amount ?>"
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
                            <?php if ($brokerfee_amount != 'Security') {echo "disabled";}
?>
                               value="<?php echo $brokerfee_amount ?>"
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
                              value="No Utilities" name="No_Utilities"
                              <?php if ($no_utilities=="No Utilities") {echo "checked";}?>


                             >

                              
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
                              <?php if ($garage_amount != 'Security') {echo "disabled";}
?>
                               value="<?php echo $garage_amount ?>"
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

                              <?php if ($off_street_amount != 'Security') {echo "disabled";}
?>
                               value="<?php echo $off_street_amount ?>"
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
                      <TD colSpan=3 height=58><TEXTAREA class=inputtext id=additionalDetails onKeyDown="CheckCharacters(this, 'additionalDetails_Count', 400);" onBlur="CheckCharacters(this, 'additionalDetails_Count', 400);" onKeyUp="CheckCharacters(this, 'additionalDetails_Count', 400);" onFocus="CheckCharacters(this, 'additionalDetails_Count', 400);" name=additionalDetails val rows=5 wrap=VIRTUAL cols=60><?=$additional_details ? "$additional_details" : "";?></TEXTAREA>
                        <BR>
                        <DIV align=right><SPAN
                        class=smallbluetext><B>characters:</B></SPAN>
                        <DIV id=additionalDetails_Count
                        style="DISPLAY: inline">0</DIV>/400 <IMG height=15
                        src="Landlord Application - Add Listing_files/spacer.gif"
                        width=18>
                        <?=$additional_details_error ? ' <p style="color: red; font-size:10px;" >' . $additional_details_error . '<p>' : "";?>

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
                      <TD colSpan=3 height=71><TEXTAREA class=inputtext name=LookingFor rows=5 wrap=VIRTUAL cols=60><?=$im_looking_for ? "$im_looking_for" : "";?></TEXTAREA>
                         <BR>
                        <DIV align=right><SPAN
                        class=smallbluetext><B>characters:</B></SPAN>
                        <DIV id=LookingFor_Count
                        style="DISPLAY: inline">0</DIV>/400 <IMG height=15
                        src="Landlord Application - Add Listing_files/spacer.gif"
                        width=18>
                        <?=$im_looking_for_error ? ' <p style="color: red; font-size:10px;" >' . $im_looking_for_error . '<p>' : "";?>
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
                              size=4 name=NumberOfMembers value="<?=$maximum_number ? "$maximum_number" : "";?>" >
                              <?=$maximum_number_error ? ' <p style="color: red; font-size:10px;" >' . $maximum_number_error . '<p>' : "";?>
</TD>
</TD>
                            <TD width=110>
                              <DIV align=right><STRONG>Preference :
                              </STRONG></DIV></TD>
                            <TD width=20><INPUT class=radio id=Preference
                              type=checkbox value=Male name=Preference
                              <?php if ($_SESSION["preference"] == 'Male' ||$preference == 'Male') {echo "checked";}?>
                              ></TD>
                            <TD width=51>Male(s)</TD>
                            <TD width=20><INPUT class=radio id=Preference
                              type=checkbox value=Female name=Preference
                              <?php if ($_SESSION["preference"] == 'Female'||$preference == 'Female') {echo "checked";}?>
                              ></TD>
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
                        type=hidden value=1 name=PartnerID>  <INPUT class=button type=submit value=Reset  name=Reset>
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

