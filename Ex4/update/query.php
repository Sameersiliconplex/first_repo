<?php
session_start();

if(isset($_POST['SubmitAdd'])){

    
    $propertyName = $_POST['propertyName'];                                         
    $location = $_POST['Location'];                           
    $City = $_POST['city'];                         
    $zip = $_POST['zip'];                         
    $state = $_POST['state'];                         
    $appartment = $_POST['ApartmentNo'];                         
    $floor = $_POST['FloorLevel'];                         
    $street = $_POST['StreetNo'];                         
    $streetlevel = $_POST['StreetLetter'];                         
    $rent = $_POST['RentAmount'];                         
    $bed = $_POST['Bedrooms'];                         
    $bath = $_POST['Bathrooms'];                         
    $deposite = $_POST['DepositAmount'];                         
    $utility = $_POST['Utilities'];                         
    $building = $_POST['BuildingTypeID'];                         
    $Room_Furnished = $_POST['IsRoomFurnished'];                         
    $Date_Negotiable = $_POST['DateNegotiable'];  
    $LeaseType_Op=$_POST['LeaseType_Option'];
    $lease_type  = $_POST['LeaseType'];                     
    $lease_type_value = $_POST['LeaseType_Value'];
    $SecurityAmount=$_POST['SecurityAmount'];
    $LeaseType_Option2=$_POST['LeaseType_Option2'];
    $BrokerFeeAmount=$_POST['BrokerFeeAmount'];
    $Parking_Section2=$_POST['Parking_Section2'];
    $GarageAmount =$_POST['GarageAmount'];
    $OffstreetAmount =$_POST['OffstreetAmount'];
    $Lease_Option = $_POST['LeaseType_Option'];                         
    $Landlord  = $_POST['LandlordPay_Option'];                         
    $rental_f = $_POST['rental_features'];                         
    $Other_F = $_POST['community_features'];                         
    $parking = $_POST['Parking_Section'];                         
                           
    $txt2 = $_POST['LookingFor'];                         
    $fts = $_POST['sqft'];                         
    $add = $_POST['additionalDetails'];                         
    $inter = $_POST['intersection'];                         
    $LK = $_POST['LookingFor'];                         
    $meb = $_POST['NumberOfMembers'];
    
    $Prefer = $_POST['Preference'];  
    
    //date and time

    $date = $_POST['AvailDay'];                         
    $month = $_POST['AvailMonth'];                         
    $year = $_POST['AvailYear'];  




    //security task
    $option = json_encode($_POST['Option1']);
    $security_amount= $_POST['SecurityAmount'];
    $broker_fee_amount = $_POST['BrokerFeeAmount'];




    
    // //checking process
    // $First_Month_Rent=$_POST['LeaseType_Option1'];
    // $Last_Month_Rent=$_POST['LeaseType_Option2'];
    // $security=$_POST['LeaseType_Optio3'];
    // $BrokerFee=$_POST['BrokerFeeAmount'];
    // $References=$_POST['LeaseType_Option4'];



    $_SESSION["propertyName"] = empty($_POST['propertyName']) ? "This Field is Required" : "";
    $_SESSION["check1"]= empty($City) ? "Please Select the value" : "";
    $_SESSION["zipp"]= empty($zip) ? "Please Enter zip" : "";
    $_SESSION["state"]= empty($state) ? "Please select one" : "";
    $_SESSION["RentAmount"]=empty($rent) ? "Please Enter Rent_Amount": "";
    $_SESSION["Bedd"]=empty($bed) ? "Please Select one !!":"";
    $_SESSION["bathh"]=empty($bath) ? "Please Select one" :"";
    $_SESSION["InterS"] =empty($inter) ? "Please Enter":"";
    $_SESSION["txtt"]=empty($txt2) ? "please fillup" :"";
    $_SESSION["ft"]=empty($fts) ? "Please Enter": "";
    $_SESSION["addD"] =empty($add) ? "Enter addition details": "";
    $_SESSION["lkF"] =empty($add) ? "Enter Looking_For": "";
    $_SESSION["mem"] =empty($meb) ?"Please Enter": "";
    $_SESSION["date"] =empty($date) || empty($month) || empty($year) ?"Please Select Correct Date": "";

}
//next if start hai yaha per    

if($_SESSION["propertyName"] || $_SESSION["check1"] || $_SESSION["zipp"]|| $_SESSION["state"] || 
 $_SESSION["RentAmount"] || $_SESSION["Bedd"] || $_SESSION["bathh"] || $_SESSION["InterS"] || 
  $_SESSION["txtt"] || $_SESSION["ft"] || $_SESSION["addD"] || $_SESSION["lkF"] || 
  $_SESSION["mem"] || $_SESSION["date"]
){
   header("location:index.php");
} else {

setcookie('property',$propertyName);
setcookie('location',$location);
setcookie('city',$City);
setcookie('zip',$zip);
setcookie('state',$state);
setcookie('appartment',$appartment);
setcookie('floor',$floor);
setcookie('street',$street);
setcookie('streetlevel',$streetlevel);
setcookie('rent',$rent);
setcookie('bed',$bed);
setcookie('bath',$bath);
setcookie('deposite',$deposite);
setcookie('utility',$utility);
setcookie('building',$building);
setcookie('Room_Furnished',$Room_Furnished);
setcookie('Date_Negotiable',$Date_Negotiable);
setcookie('lease_type',$lease_type);
setcookie('lease_type_value',$lease_type_value);
setcookie('LeaseType_Option',$lLeaseType_Option);
setcookie('BrokerFeeAmount',$BrokerFeeAmount);
setcookie('LeaseType_Option2',$LeaseType_Option2);
setcookie('SecurityAmount',$SecurityAmount);
setcookie('Parking_Section2',$Parking_Section2);
setcookie('GarageAmount',$GarageAmount);
setcookie('OffstreetAmount',$OffstreetAmount);
setcookie('Landlord', $Landlord);
setcookie('rental_f',$rental_f);
setcookie('Other_F',$Other_F);
setcookie('parking',$parking);
setcookie('Prefer',$Prefer);
setcookie('Lease_Option',$Lease_Option);
setcookie('txt2',$txt2);
setcookie('add',$add);
setcookie('LK',$LK);
setcookie('meb',$meb);
setcookie('date',$date);
setcookie('month',$month);
setcookie('year',$year);


setcookie('fts',$fts);
setcookie('inter',$inter);

//date and time 

setcookie('date',$date);
setcookie('month',$month);
setcookie('year',$year); 

setcookie('Prefer',$Prefer);


//security option
setcookie('option', $option);
setcookie('security_amount', $security_amount);
setcookie('broker_fee_amount', $broker_fee_amount);

// //checking coookies
// setcookie('First_Month_Rent',$First_Month_Rent);
// setcookie('Last_Month_Rent',$Last_Month_Rent);
// setcookie('security2',$security);
// setcookie('BrokerFee', $BrokerFee);
// setcookie('References',$References);



    header("location:View.php"); // view call karo usme data display karao


}