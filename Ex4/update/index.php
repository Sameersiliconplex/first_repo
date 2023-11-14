<!-- <?php 

// }
session_start();

?>




<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
saved from url=(0054)http://192.168.4.22:140/administration/add_listing.asp -->
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
  // function PayOption_NoUtilities()
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
                  <FORM  action="query.php" name=NewProfile method=post>
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
                        id=propertyName maxLength=100  name=propertyName>
                        <?php if ($_SESSION["propertyName"]) { ?>
                          <p style="color:red; font-size: 10px;">
                        <?php echo $_SESSION["propertyName"]; 
                        unset($_SESSION['propertyName']);?>
                        </p>
                       <?php }?>

                      
                       
                      </TD>
                      <TD>&nbsp;</TD></TR>
                    <TR>
                      <TD align=right height=29><SPAN 
                        class=sbgreen></SPAN><STRONG>Location:</STRONG>&nbsp;</TD>
                      <TD colSpan=4 height=29><SELECT class=inputtext 
                        id=Location name=Location> <OPTION value=AG 
                          selected>AGASSIZ</OPTION> <OPTION value=AH>AVON 
                          HILL</OPTION> <OPTION value=BR>BRATTLE</OPTION> 
                          <OPTION value=CP>CAMBRIDGEPORT</OPTION> <OPTION 
                          value=CS>CENTRAL SQUARE</OPTION> <OPTION value=EC>EAST 
                          CAMBRIDGE</OPTION> <OPTION value=FE>FRESH POND 
                          EAST</OPTION> <OPTION value=FS>FRESH POND 
                          SOUTH</OPTION> <OPTION value=FW>FENWAY</OPTION> 
                          <OPTION value=HS>HARVARD SQUARE</OPTION> <OPTION 
                          value=IS>INMAN SQUARE</OPTION> <OPTION 
                          value=MC>MID-CAMBRIDGE</OPTION> <OPTION value=NC>NORTH 
                          CAMBRIDGE</OPTION> <OPTION value=OT>OUTSIDE 
                          CAMBRIDGE</OPTION> <OPTION value=PS>PORTER 
                          SQUARE</OPTION> <OPTION value=RV>RIVERSIDE</OPTION> 
                          <OPTION value=SC>SOMERVILLE</OPTION></SELECT> </TD>
                      <TD>&nbsp;</TD></TR>
                      <TR>
                      <TD align=right height=29><SPAN class=sbgreen><B>* 
                        </B></SPAN><STRONG>City:</STRONG>&nbsp;</TD>
                      <TD colSpan=4 height=29>
                        <TABLE cellSpacing=0 cellPadding=0 width=100 border=0>
                          <TBODY>
                          <TR>
                            <TD width=10><INPUT class=radio type=radio 
                              value=City1 name=city> </TD>
                            <TD width=90>City1&nbsp;&nbsp;&nbsp;&nbsp; </TD>
                            <TD width=10><INPUT class=radio type=radio 
                              value=City2 name=city> </TD>
                            <TD width=90>City2&nbsp;&nbsp;&nbsp;&nbsp; </TD>
                            <TD width=10><INPUT class=radio type=radio 
                              value=City3 name=city> </TD>
                            <TD width=90>City3&nbsp;&nbsp;&nbsp;&nbsp; </TD>
                            <TD width=10><INPUT class=radio type=radio 
                              value=City4 name=city> </TD>
                            <TD width=90>City4&nbsp;&nbsp;&nbsp;&nbsp; </TD>
                            <TD width=10><INPUT class=radio type=radio 
                              value=City5 name=city> </TD>
                            <TD width=90>City5&nbsp;&nbsp;&nbsp;&nbsp; </TD>
                          <TR>
                            <TD width=10><INPUT class=radio type=radio 
                              value=City6 name=city> </TD>
                            <TD width=90>City6&nbsp;&nbsp;&nbsp;&nbsp; </TD>
                            <TD width=10><INPUT class=radio type=radio 
                              value=City7 name=city> </TD>
                            <TD width=90>City7&nbsp;&nbsp;&nbsp;&nbsp; </TD>
                            <TD width=10><INPUT class=radio type=radio 
                              value=City8 name=city> </TD>
                            <TD width=90>City8&nbsp;&nbsp;&nbsp;&nbsp; </TD>


                            <TD width=10><INPUT class=radio type=radio 
                              value=City9 name=city> </TD>
                            <TD width=90>City9&nbsp;&nbsp;&nbsp;&nbsp; </TD>
                            
                            
                            <TD width=10 class="d-flex flex-column"><INPUT class=radio type=radio 
                            value=City10 name=city>
                          </TD>
                          <TD width=90>City10&nbsp;&nbsp;&nbsp;&nbsp; </TD>

                          </TR>
                          <tr>
                            <td colspan="10">
                            <?php if ($_SESSION["check1"]) { ?>
                          <p style="color:red; font-size: 10px;">
                        <?php echo $_SESSION["check1"]; 
                        unset($_SESSION['check1']);?>
                        </p>
                       <?php }?>

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
                          State</OPTION> <OPTION value=Alaska>Alaska</OPTION> 
                          <OPTION value=Arizona>Arizona</OPTION> <OPTION 
                          value=Arkansas>Arkansas</OPTION> <OPTION 
                          value=California>California</OPTION> <OPTION 
                          value=Colorado>Colorado</OPTION> <OPTION 
                          value=Connecticut>Connecticut</OPTION> <OPTION 
                          value=Delaware>Delaware</OPTION> <OPTION 
                          value="District of Columbia">District of 
                          Columbia</OPTION> <OPTION 
                          value=Florida>Florida</OPTION> <OPTION 
                          value=Georgia>Georgia</OPTION> <OPTION 
                          value=Guam>Guam</OPTION> <OPTION 
                          value=Hawaii>Hawaii</OPTION> <OPTION 
                          value=Idaho>Idaho</OPTION> <OPTION 
                          value=Illinois>Illinois</OPTION> <OPTION 
                          value=Indiana>Indiana</OPTION> <OPTION 
                          value=Iowa>Iowa</OPTION> <OPTION 
                          value=Kansas>Kansas</OPTION> <OPTION 
                          value=Kentucky>Kentucky</OPTION> <OPTION 
                          value=Louisiana>Louisiana</OPTION> <OPTION 
                          value=Maine>Maine</OPTION> <OPTION 
                          value=Maryland>Maryland</OPTION> <OPTION 
                          value=Massachusetts>Massachusetts</OPTION> <OPTION 
                          value=Michigan>Michigan</OPTION> <OPTION 
                          value=Minnesota>Minnesota</OPTION> <OPTION 
                          value=Mississippi>Mississippi</OPTION> <OPTION 
                          value=Missouri>Missouri</OPTION> <OPTION 
                          value=Montana>Montana</OPTION> <OPTION 
                          value=Nebraska>Nebraska</OPTION> <OPTION 
                          value=Nevada>Nevada</OPTION> <OPTION 
                          value="New Hampshire">New Hampshire</OPTION> <OPTION 
                          value="New Jersey">New Jersey</OPTION> <OPTION 
                          value="New Mexico">New Mexico</OPTION> <OPTION 
                          value="New York">New York</OPTION> <OPTION 
                          value="North Carolina">North Carolina</OPTION> <OPTION 
                          value="North Dakota">North Dakota</OPTION> <OPTION 
                          value=Ohio>Ohio</OPTION> <OPTION 
                          value=Oklahoma>Oklahoma</OPTION> <OPTION 
                          value=Oregon>Oregon</OPTION> <OPTION 
                          value=Pennsylvania>Pennsylvania</OPTION> <OPTION 
                          value="Puerto Rico">Puerto Rico</OPTION> <OPTION 
                          value="Rhode Island">Rhode Island</OPTION> <OPTION 
                          value="South Carolina">South Carolina</OPTION> <OPTION 
                          value="South Dakota">South Dakota</OPTION> <OPTION 
                          value=Tennessee>Tennessee</OPTION> <OPTION 
                          value=Texas>Texas</OPTION> <OPTION 
                          value=Utah>Utah</OPTION> <OPTION 
                          value=Vermont>Vermont</OPTION> <OPTION 
                          value="Virgin Islands">Virgin Islands</OPTION> <OPTION 
                          value=Virginia>Virginia</OPTION> <OPTION 
                          value=Washington>Washington</OPTION> <OPTION 
                          value="West Virginia">West Virginia</OPTION> <OPTION 
                          value=Wisconsin>Wisconsin</OPTION> <OPTION 
                          value=Wyoming>Wyoming</OPTION> <OPTION 
                          value="Alberta              ">Alberta</OPTION> <OPTION 
                          value="British Columbia     ">British 
                          Columbia</OPTION> <OPTION 
                          value="Manitoba             ">Manitoba</OPTION> 
                          <OPTION value="New Brunswick        ">New 
                          Brunswick</OPTION> <OPTION 
                          value="Newfoundland         ">Newfoundland</OPTION> 
                          <OPTION value="Northwest Territories">Northwest 
                          Territories</OPTION> <OPTION 
                          value="Nova Scotia          ">Nova Scotia</OPTION> 
                          <OPTION value="Nunavut              ">Nunavut</OPTION> 
                          <OPTION value="Ontario              ">Ontario</OPTION> 
                          <OPTION value="Prince Edward Island ">Prince Edward 
                          Island</OPTION> <OPTION 
                          value="Quebec               ">Quebec</OPTION> <OPTION 
                          value="Saskatchewan         ">Saskatchewan</OPTION> 
                          <OPTION value="Yukon Territory      ">Yukon 
                          Territory</OPTION></SELECT>
                          <?php
                          if($_SESSION["state"]){
                            ?>
                            <p style="color: red; font-size: 10px;">
                            <?php 
                            echo $_SESSION["state"];
                            unset($_SESSION['state'])
                            ?>
                            </p>

                         <?php }
                          
                          ?>
                        </TD>


                          <?php
                          if($_SESSION["state"]){
                            ?>
                            <p style="color: red; font-size: 10px;">
                            <?php 
                            echo $_SESSION["state"];
                            unset($_SESSION['state'])
                            ?>
                            </p>

                         <?php }
                          
                          ?>





                      <TD align=right height=29><SPAN class=sbgreen><B>* 
                        </B></SPAN><STRONG>Zip:</STRONG>&nbsp;</TD>
                      <TD colSpan=2 height=29><INPUT class=inputtext id=zip 
                        maxLength=100 name=zip>
                      
                      <?php
                      if($_SESSION['zipp']){
                      ?>

                    <p style="color: red; font-size: 10px;">

                    <?php
                    echo $_SESSION['zipp'];
                    unset($_SESSION['zipp']);
                    ?> 

                    </p> 

                    <?php }
                    ?>
                
                      
                      </TD>
                      <TD>&nbsp;</TD></TR>
                    <TR>
                      <TD align=right height=29><STRONG>Apartment No 
                        :</STRONG>&nbsp;</TD>
                      <TD height=29><INPUT class=inputtext id=ApartmentNo 
                        maxLength=100 name=ApartmentNo></TD>
                      <TD align=right height=29><STRONG>Floor 
                      Level:</STRONG>&nbsp;</TD>
                      <TD colSpan=2 height=29><INPUT class=inputtext 
                        id=FloorLevel maxLength=100 name=FloorLevel></TD>
                      <TD>&nbsp;</TD></TR>
                    <TR>
                      <TD align=right height=29><STRONG>Street 
                      No:</STRONG>&nbsp;</TD>
                      <TD height=29><INPUT class=inputtext id=StreetNo 
                        maxLength=100 name=StreetNo></TD>
                      <TD align=right height=29><STRONG>Street Letter 
                        :</STRONG>&nbsp;</TD>
                      <TD colSpan=2 height=29><INPUT class=inputtext 
                        id=StreetLetter maxLength=100 name=StreetLetter></TD>
                      <TD>&nbsp;</TD></TR>
                    <TR>
                      <TD align=right height=29><SPAN class=sbgreen><B>* 
                        </B></SPAN><STRONG>Rent:&nbsp;</STRONG></TD>
                      <TD width=193 height=29><STRONG>$</STRONG> <INPUT 
                        class=inputtext maxLength=5 size=6 name=RentAmount>
                        
                        <?php
                        if ($_SESSION["RentAmount"]) {
                          ?>
                          <p style="color:red; font-size:10px;">
                          <?php
                          echo $_SESSION["RentAmount"];
                          unset($_SESSION["RentAmount"]);
                          ?>
                          </p>

                        <?php }
                        ?>
                      
                      </TD>
                      <TD align=right width=156 height=29><SPAN 
                        class=sbgreen><B>* 
                        </B></SPAN><STRONG>Bedrooms:&nbsp;</STRONG></TD>
                      <TD colSpan=2 height=29><SELECT class=inputtext 
                        name=Bedrooms> <OPTION value="" selected>Please Select</OPTION> 
                          <OPTION value=1>1</OPTION> <OPTION value=2>2</OPTION> 
                          <OPTION value=3>3</OPTION> <OPTION 
                        value=4>4</OPTION></SELECT>
                        <?php
                        if($_SESSION["Bedd"]){
                          ?>
                          <p style="color: red; font-size: 10px;">
                          <?php
                      echo $_SESSION["Bedd"];
                      unset($_SESSION["Bedd"])
                          ?>
                          </p>
                        <?php
                        }
                        ?>
                        
                        
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
name=DepositAmount></TD>
                      <TD align=right width=156 height=29><SPAN 
                        class=sbgreen><B>* 
                        </B></SPAN><STRONG>Bathrooms:&nbsp;</STRONG></TD>
                      <TD colSpan=2 height=29><SELECT class=inputtext 
                        name=Bathrooms> <OPTION value="" selected>Please Select</OPTION> 
                          <OPTION value=2>2</OPTION> <OPTION value=3>3</OPTION> 
                          <OPTION value=4>4</OPTION> <OPTION 
                        value=5>5</OPTION> </SELECT>
                      <?php
                      if($_SESSION["bathh"]){
                        ?>
                        <p style="color: red; font-size: 10px;">
                        <?php
                        echo $_SESSION["bathh"];
                        unset($_SESSION["bathh"]);
                        ?>
                        </p>
                     <?php }

                      ?>


                     
                        <SCRIPT>
						  	
						</SCRIPT>                         </TD>
                      <TD><IMG height=29 alt="" 
                        src="Landlord Application - Add Listing_files/spacer.gif" 
                        width=1></TD></TR>
                    <TR>
                      <TD align=right height=29><STRONG>Cost Of 
                        Utilities:&nbsp;</STRONG> </TD>
                      <TD width=193 height=29><STRONG>$</STRONG> <INPUT 
                        class=inputtext maxLength=5 size=6 name=Utilities> 
                        <I>per month</I></TD>
                      <TD align=right width=156 height=29><STRONG>Building 
                        Type:&nbsp;</STRONG> </TD>
                      <TD colSpan=2 height=29><SELECT class=inputtext 
                        name=BuildingTypeID> <OPTION value=0 
                          selected>Room</OPTION> <OPTION value=1>High 
                          Rise</OPTION> <OPTION value=2>Low Rise</OPTION> 
                          <OPTION value=3>House</OPTION> <OPTION 
                          value=4>Brownstone</OPTION> <OPTION 
                          value=5>Apartment</OPTION> <OPTION 
                          value=6>Townhouse</OPTION> <OPTION 
                          value=7>Other</OPTION></SELECT> </TD>
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
          
                      <?php
                      if ($_SESSION["date"]) {
                        ?>
                        <p style="color:red; font-size: 10px;">
                      <?php
                      echo$_SESSION['date'];
                      unset($_SESSION["date"]);}
                      ?>  
          
          </TD>
                      <TD align=right width=156 height=29><STRONG>Room 
                        Furnished:&nbsp;</STRONG></TD>
                      <TD colSpan=2 height=29><INPUT class=radio type=checkbox 
                        name=IsRoomFurnished></TD>
                      <TD><IMG height=29 alt="" 
                        src="Landlord Application - Add Listing_files/spacer.gif" 
                        width=1></TD></TR>
                    <TR>
                      <TD align=right height=30><STRONG>Dates Negotiable 
                        :&nbsp;</STRONG></TD>
                      <TD height=30><!--<input name="sqft" class="inputtext" id="sqft" value="" size="8" maxlength="6" />//--><INPUT 
                        class=radio id=DateNegotiable type=checkbox value=Yes 
                        name=DateNegotiable> </TD>
                      <TD align=right height=30>&nbsp;</TD>
                      <TD colSpan=2 height=30>&nbsp;</TD>
                      <TD>&nbsp;</TD></TR>
                    <TR>
                      <TD align=right height=30><SPAN class=sbgreen><B>* 
                        </B></SPAN><STRONG>Sq. Ft:&nbsp;</STRONG>
                      <?php
                      if ($_SESSION["ft"]) {
                        ?>
                        <p style="color:red; font-size: 10px;">
                      <?php
                      echo$_SESSION['ft'];
                      unset($_SESSION["ft"]);
                      ?>
                      </p>
                        <?php
                      }
                      ?>
                      </TD>
                      <TD height=30><!--<input name=sqft class="inputtext" id="sqft" value="" size="8" maxlength="6">//--><INPUT 
                        class=inputtext id=sqft maxLength=6 size=8 name=sqft> <!--<select name=sqft class="inputtext">
						
	  						  <option value="" selected></option>						  
						  
	  						  <option value=""></option>
						  
						</select>//--></TD>
                      <TD align=right height=30><SPAN class=sbgreen><B>* 
                        </B></SPAN><STRONG>Intersection:&nbsp;</STRONG></TD>
                      <TD colSpan=2 height=30><INPUT class=inputtext 
                        id=intersection maxLength=255 name=intersection>

                        
                      <?php
                      if ($_SESSION['InterS']) {
                        ?>
                        <p style="color: red; font-size: 10px;">
                      <?php
                      echo $_SESSION['InterS'];
                      unset($_SESSION['InterS']);
                      ?>
                      </p>

                      <?php
                        # code...
                      }
                      ?>
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
                          <TR>
                            <TD width="7%"><INPUT class=radio 
                              onclick="EnableDisable1(this, NewProfile.LeaseType_Value);" 
                              type=radio value=Lease name=LeaseType> </TD>
                            <TD width="15%">Lease </TD>
                            <TD width="17%"><SELECT class=inputtext 
                              id=LeaseType_Value  name=LeaseType_Value diabled> 
                                <OPTION value="Lease 1" selected>Lease 
                                1</OPTION> <OPTION value="Lease 2">Lease 
                                2</OPTION> <OPTION value="Lease 3">Lease 
                                3</OPTION></SELECT> </TD>
                            <TD width="61%">&nbsp;</TD></TR>
                          <TR>
                            <TD><INPUT class=radio 
                              onclick="EnableDisable1(this, NewProfile.LeaseType_Value);" 
                              type=radio value=TAW name=LeaseType> </TD>
                            <TD colSpan=3>TAW (Tenant at Will)</TD></TR>
                          <TR>
                            <TD><INPUT class=radio 
                              onclick="EnableDisable1(this, NewProfile.LeaseType_Value);" 
                              type=radio value="Short Term Rental" 
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
                              <td width="7%"><input class="radio" 
                              id="LeaseType_Option" type="checkbox" 
                              value="First Month's Rent" 
                            name="Option1[]" /></td>
                              <td width="32%">First Month's Rent </td>
                              <td width="61%">&nbsp;</td>
                            </tr>
                            <tr>
                              <td><input class="radio" id="LeaseType_Option" 
                              type="checkbox" value="Last Month's Rent" 
                              name="Option1[]" /></td>
                              <td>Last Month's Rent</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td><input class="radio" id="LeaseType_Option" 
                              onclick="EnableDisable(this, NewProfile.SecurityAmount);" 
                              type="checkbox" value="Security" 
                            name="Option1[]" /></td>
                              <td>Security</td>
                              <td>$
                                <input class="inputtext" id="SecurityAmount" 
                              disabled="disabled" maxlength="8" size="10"
                            name="SecurityAmount" /></td>
                            </tr>
                            <tr>
                              <td><input class="radio" id="LeaseType_Option" 
                              onclick="EnableDisable(this, NewProfile.BrokerFeeAmount);" 
                              type="checkbox" value="Broker's Fee" 
                              name="Option1[]" /></td>
                              <td>Broker's Fee </td>
                              <td>$
                                <input class="inputtext" id="BrokerFeeAmount" 
                              disabled="disabled" maxlength="8" size="10" 
                            name="BrokerFeeAmount" /></td>
                            </tr>
                            
                          
                            <tr>
                              <td><input class="radio" id="LeaseType_Option" 
                              type="checkbox" value="References" 
                              name="Option1[]" /></td>
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
                              value="No Utilities" name="Option2[]" />
                              </td>
                              <td width="32%">No Utilities </td>
                              <td width="61%">&nbsp;</td>
                            </tr>
                            <tr>
                              <td><input class="radio" id="LandlordPay_Option" 
                              onclick="CheckPayOption_AllUtilities()" 
                              type="checkbox" value="Heat" 
                            name="Option2[]" /></td>
                              <td>Heat</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td><input class="radio" id="LandlordPay_Option" 
                              onclick="CheckPayOption_AllUtilities()" 
                              type="checkbox" value="Hot Water" 
                              name="Option2[]" /></td>
                              <td>Hot Water </td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td><input class="radio" id="LandlordPay_Option" 
                              onclick="CheckPayOption_AllUtilities()" 
                              type="checkbox" value="Electricity" 
                              name="Option2[]" /></td>
                              <td>Electricity</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td><input class="radio" id="LandlordPay_Option" 
                              onclick="CheckPayOption_AllUtilities()" 
                              type="checkbox" value="Cooking Gas" 
                              name="Option2[]" />
                              </td>
                              <td>Cooking Gas </td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td><input class="radio" id="LandlordPay_Option" 
                              onclick="PayOption_AllUtilities()" type="checkbox" 
                              value="All Utilities" name="Option2[]" />
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
                              value="Air Conditioning" name="Option3[]" />
                            </label></td>
                            <td>Air Conditioning </td>
                            <td><input class="radio" id="rental_features" 
                              type="checkbox" value="Carpeting" 
                            name="Option3[]" /></td>
                            <td>Carpeting</td>
                            <td><input class="radio" id="rental_features" 
                              type="checkbox" value="Dishwasher" 
                              name="Option3[]" /></td>
                            <td>Dishwasher</td>
                          </tr>
                          <tr>
                            <td valign="center"><label>
                              <input class="radio" 
                              id="rental_features" type="checkbox" value="Disposal" 
                              name="Option3[]" />
                            </label></td>
                            <td>Disposal</td>
                            <td><input class="radio" id="rental_features" 
                              type="checkbox" value="Eat-In Kitchen" 
                              name="Option3[]" /></td>
                            <td>Eat-In Kitchen </td>
                            <td><input class="radio" id="rental_features" 
                              type="checkbox" value="Furnished" 
                            name="Option3[]" /></td>
                            <td>Furnished</td>
                          </tr>
                          <tr>
                            <td><input class="radio" id="rental_features" 
                              type="checkbox" value="Hardwood Floors" 
                              name="Option3[]" /></td>
                            <td>Hardwood Floors</td>
                            <td><input class="radio" id="rental_features" 
                              type="checkbox" value="Microwave" 
                            name="Option3[]" /></td>
                            <td>Microwave</td>
                            <td><input class="radio" id="rental_features" 
                              type="checkbox" value="Pets Allowed" 
                              name="Option3[]" /></td>
                            <td>Pets Allowed </td>
                          </tr>
                          <tr>
                            <td><input class="radio" id="rental_features" 
                              type="checkbox" value="Porch Balcony" 
                              name="Option3[]" /></td>
                            <td>Porch Balcony </td>
                            <td><input class="radio" id="rental_features" 
                              type="checkbox" value="Private Yard" 
                              name="Option3[]" /></td>
                            <td>Private Yard</td>
                            <td><input class="radio" id="rental_features" 
                              type="checkbox" value="Refrigerator" 
                              name="Option3[]" /></td>
                            <td>Refrigerator</td>
                          </tr>
                          <tr>
                            <td><input class="radio" id="rental_features" 
                              type="checkbox" value="Shared Yard/Garden" 
                              name="Option3[]" /></td>
                            <td>Shared Yard/Garden </td>
                            <td><input class="radio" id="rental_features" 
                              type="checkbox" value="Separate Dining Room" 
                              name="Option3[]" /></td>
                            <td>Separate Dining Room</td>
                            <td><input class="radio" id="rental_features" 
                              type="checkbox" value="Smokers Allowed" 
                              name="Option3[]" /></td>
                            <td>Smokers Allowed </td>
                          </tr>
                          <tr>
                            <td><input class="radio" id="rental_features" 
                              type="checkbox" value="Storage" 
                            name="Option3[]" /></td>
                            <td>Storage </td>
                            <td><input class="radio" id="rental_features" 
                              type="checkbox" value="Study/Den" 
                            name="Option3[]" /></td>
                            <td>Study/Den</td>
                            <td><input class="radio" id="rental_features" 
                              type="checkbox" value="View" name="Option3[]" /></td>
                            <td>View</td>
                          </tr>
                          <tr>
                            <td><input class="radio" id="rental_features" 
                              type="checkbox" value="Washer/Dryer Access" 
                              name="Option3[]" /></td>
                            <td>Washer/Dryer Access </td>
                            <td><input class="radio" id="rental_features" 
                              type="checkbox" value="Washer/Dryer Hookup" 
                              name="Option3[]" /></td>
                            <td>Washer/Dryer Hookup</td>
                            <td><input class="radio" id="rental_features" 
                              type="checkbox" value="Working Fireplace" 
                              name="Option3[]" /></td>
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
                               name="Option4[]" /></td>
                            <td>Fitness Center </td>
                            <td><input class="radio" id="community_features" 
                              type="checkbox" 
                              value="Gated Entrance/Controlled Access" 
                               name="Option4[]" /></td>
                            <td><p>Gated Entrance/Controlled Access </p></td>
                            <td><input class="radio" id="community_features" 
                              type="checkbox" value="Garages" 
                               name="Option4[]" /></td>
                            <td>Garages </td>
                          </tr>
                          <tr>
                            <td><input class="radio" id="community_features" 
                              type="checkbox" value="Hot Plate" 
                               name="Option4[]" /></td>
                            <td>Hot Plate</td>
                            <td><input class="radio" id="community_features" 
                              type="checkbox" value="Kitchen Priveleges" 
                               name="Option4[]" /></td>
                            <td>Kitchen Priveleges</td>
                            <td><input class="radio" id="community_features" 
                              type="checkbox" value="Linens Supplied" 
                               name="Option4[]" /></td>
                            <td>Linens Supplied </td>
                          </tr>
                          <tr>
                            <td><input class="radio" id="community_features" 
                              type="checkbox" value="New Building" 
                               name="Option4[]" /></td>
                            <td>New Building </td>
                            <td><input class="radio" id="community_features" 
                              type="checkbox" value="Pool" 
                             name="Option4[]" /></td>
                            <td>Pool </td>
                            <td><input class="radio" id="community_features" 
                              type="checkbox" value="Private Entry" 
                               name="Option4[]" /></td>
                            <td>Private Entry</td>
                          </tr>
                          <tr>
                            <td><input class="radio" id="community_features" 
                              type="checkbox" value="Shared Bath" 
                               name="Option4[]" /></td>
                            <td>Shared Bath</td>
                            <td><input class="radio" id="community_features" 
                              type="checkbox" value="Spa/Hot Tub/Sauna" 
                               name="Option4[]" /></td>
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

<!-- 
//Parking Section -->


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
                              value="None" name="Parking_Section"/>

                            </label></td>
                            <td colspan="2">None</td>
                            <td width="4%"><input class="radio" 
                              id="Parking_Section" type="checkbox" value="On Street" 
                              name="Parking_Section2" /></td>
                            <td width="48%">On street</td>
                            <td width="13%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td valign="center"><label>
                              <input class="radio" 
                              id="Parking_Section" 
                              onclick="Parking_SectionControler(this, document.NewProfile.GarageAmount)" 
                              type="checkbox" value="Garage" name="Parking_Section2"
                             
                              />
                            </label></td>
                            <td width="14%">Garage</td>
                            <td width="16%">$
                              <input class="inputtext" 
                              id="GarageAmount" maxlength="8" size="5" 
                              name="GarageAmount" /></td>
                            <td><input class="radio" id="Parking_Section" 
                              type="checkbox" value="Deleaded" 
                            name="Parking_Section2" /></td>
                            <td>Deleaded </td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td><input class="radio" id="Parking_Section" 
                              type="checkbox" value="Elevator Building" 
                              name="Parking_Section2" /></td>
                            <td colspan="2">Elevator Building </td>
                            <td><input class="radio" id="Parking_Section" 
                              type="checkbox" value="Handicap Access" 
                              name="Parking_Section2" /></td>
                            <td>Handicap Access </td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td><input class="radio" id="Parking_Section" 
                              onclick="Parking_SectionControler(this, document.NewProfile.OffstreetAmount)" 
                              type="checkbox" value="Off Street" 
                              name="Parking_Section2" /></td>
                            <td>Off street</td>
                            <td>$
                              <input class="inputtext" id="OffstreetAmount" 
                              maxlength="8" size="5" name="OffstreetAmount" /></td>
                            <td><input class="radio" id="Parking_Section" 
                              type="checkbox" value="Near public transportation" 
                              name="Parking_Section2" /></td>
                            <td>Near public transportation</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td><input class="radio" id="Parking_Section" 
                              type="checkbox" value="Owner Occupied" 
                              name="Parking_Section2" /></td>
                            <td colspan="2">Owner Occupied </td>
                            <td><input class="radio" id="Parking_Section" 
                              type="checkbox" 
                              value="Walking Distance to Harvard Square" 
                              name="Parking_Section2" /></td>
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
                      <TD colSpan=3 height=58><TEXTAREA class=inputtext id=additionalDetails onKeyDown="CheckCharacters(this, 'additionalDetails_Count', 400);" onBlur="CheckCharacters(this, 'additionalDetails_Count', 400);" onKeyUp="CheckCharacters(this, 'additionalDetails_Count', 400);" onFocus="CheckCharacters(this, 'additionalDetails_Count', 400);" name=additionalDetails rows=5 wrap=VIRTUAL cols=60></TEXTAREA> 
                        <BR>
                        <DIV align=right><SPAN 
                        class=smallbluetext><B>characters:</B></SPAN> 
                        <DIV id=additionalDetails_Count 
                        style="DISPLAY: inline">0</DIV>/400 <IMG height=15 
                        src="Landlord Application - Add Listing_files/spacer.gif" 
                        width=18>
                      <?php
                      if ($_SESSION["addD"]) {
                        ?>
                        <p style="color: red; font-size:10px;" >
                      <?php 
                      echo$_SESSION["addD"];
                      unset($_SESSION["addD"]);
                      ?>
                      </p>
                      <?php
                      }
                      ?>
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
                      <TD colSpan=3 height=71><TEXTAREA class=inputtext name=LookingFor rows=5 wrap=VIRTUAL cols=60></TEXTAREA> 
                         <BR>
                        <DIV align=right><SPAN 
                        class=smallbluetext><B>characters:</B></SPAN> 
                        <DIV id=LookingFor_Count 
                        style="DISPLAY: inline">0</DIV>/400 <IMG height=15 
                        src="Landlord Application - Add Listing_files/spacer.gif" 
                        width=18> 
                        <?php
                      if ($_SESSION["lkF"]) {
                        ?>
                        <p style="color: red; font-size:10px;" >
                      <?php 
                      echo$_SESSION["lkF"] ;
                      unset($_SESSION["lkF"]);
                      ?>
                      </p>
                      <?php
                      }
                      ?></DIV>
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
                              size=4 name=NumberOfMembers>
                              <?php
                      if ($_SESSION["mem"]) {
                        ?>
                        <p style="color: red; font-size:10px;" >
                      <?php 
                      echo$_SESSION["mem"];
                      unset($_SESSION["mem"]);
                      ?>
                      </p>
                      <?php
                      }
                      ?></TD>
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
                        type=hidden value=1 name=PartnerID> <INPUT class=button onClick="window.location='add_listing.asp'" type=button value=Reset name=Reset> 
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





