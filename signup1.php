<?php
session_start();
if(@$_SESSION['user_status']=='logged_in')
{
header('location:home.php');
die;
}


?>

<html>
<head>
	<title>E-commerce: Sign up</title>
	<link rel="stylesheet" type="text/css" href="ecomm.css"/>
		<script type="text/javascript">
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
</script>
	</head>
	
	<body>
	<div class="container">
	
	<?php
	include('includes/header.php');
	?>
	
		<table id="main_table" class="main_table"  width='100%'>
			<tr>
				
					<td valign="top" width="50%">
						<div class="signup">
							<h3>Welcome Guest</h3>
							<p><b>Register Here</b></p>
							<form id="form1" name="form1" method="post" action="user_action.php?action=register">
<table width="529" border="0" align="center">
    <tr>
      <th width="169" scope="row">Name</th>
      <td width="344"><input name="fname" type="text" id="name" /></td>
    </tr>
    <tr>
      <th scope="row">Email Id</th>
      <td>
        <input type="text" name="emailid" id="emailid" />
      </td>
    </tr>
    <tr>
      <th scope="row">Address</th>
      <td>
        <textarea name="address" id="address" cols="45" rows="5"></textarea>
      </td>
    </tr>
    <tr>
      <th scope="row">Zip code</th>
      <td>
        <input type="text" name="zip_code" id="zip_code" />
      </td>
    </tr>
    <tr>
      <th scope="row">State</th>
      <td>
        <input type="text" name="state" id="state" />
      </td>
    </tr>
    <tr>
      <th scope="row">Country</th>
      <td>
        <input type="text" name="country" id="country" />
      </td>
    </tr>
    <tr>
      <th scope="row">Landline No.</th>
      <td>
        <input type="text" name="lno" id="lno" />
      </td>
    </tr>
    <tr>
      <th scope="row">Mobile No.</th>
      <td>
        <input type="text" name="mno" id="mno" />
      </td>
    </tr>
    <tr>
      <th scope="row">Password</th>
      <td>
        <input type="password" name="psww" id="psww" />
      </td>
    </tr>
    <tr>
      <th scope="row">Confirm Password</th>
      <td>
        <input type="password" name="cpsww" id="cpsww" />
      </td>
    </tr>
    <tr>
      <th colspan="2" scope="row">
        <input type="submit" name="submit" id="submit" value="Submit" onclick="MM_validateForm('name','','R','emailid','','RisEmail','zip_code','','NisNum','lno','','NisNum','mno','','NisNum','psww','','R','cpsww','','R','address','','R');return document.MM_returnValue"/>
      </th>
    </tr>
    <tr>
      <th colspan="2" scope="row">
        <input type="reset" name="Reset" id="Reset" value="Reset" />
      </th>
    </tr>
  </table>
 </form>
						</div>
						
					</td>
					<td valign="top" width="50%">
					<div class="signup">	
					<h3>What is shopping cart..</h3>
					<p style="font-size:13px;font-family:helvetica;" >Shopping cart software is software used in e-commerce to assist people making purchases online, analogous to the American English term 'shopping cart'. 
					In British English it is generally known as a shopping basket, almost exclusively shortened on websites to 'basket'.<p>

	<p style="font-size:13px;font-family:helvetica;">The software allows online shopping customers to accumulate a list of items for purchase, described metaphorically as "placing items in the shopping cart". Upon checkout, the software typically calculates a total for the order, including shipping and handling (i.e. postage and packing) charges and the associated taxes, as applicable.</p>
					</div>
					</td>
				</tr>
			</table>
					
		</div>
		<?php
	include('includes/footer.php');
	?>
	</body>
</html>