<?php
include('DbConnect.php');
if($_SESSION['user_status']!='logged_in')
{
	die("<h3>You are not logged in</h3><p>Please login to use this facility.</p>");
}
$user_id=@$_SESSION['user_id'];

$sql="select * from shopping_cart where user_id='$user_id'";
$result=select($sql);
if($result=='false')
{	
	
	  
	$_SESSION['message']="<h2>You do not have any books in your shopping cart</h2>";
	header("location:message.php");
}
?>
<html>
<head>
	<title>E-commerce</title>
	<link rel="stylesheet" type="text/css" href="ecomm.css"/>
</head>
<body>
	<div class="container">
	
	<?php
	include('includes/header.php');
	?>
	
		<table id="checkout_table" class="checkout_table"  width='100%'>
			<tr>
				<td valign="top">
					<h3 class="title">Please Fill the shipping information</h3>
					<p>Note:</p><p>Books will be delivered to destination with your reference.</p>
					<p>Payment on delivery</p>
					<ul>
						<form action="add_to_cart.php?action=checkout" method="post">
						<li><input type="text" name='shipping_fname'/>: First name</li>
						<li><input type="text" name='shipping_lname'/>: Last name</li>
						<li><textarea  cols="40" rows="3" style="resize:none" name='shipping_address'></textarea>: Address</li>
						<li><input type="text" name='shipping_contact'/>: Contact no</li>
						<li><input type="text" name='shipping_state'/>: State</li>
						<li><input type="text" name='shipping_district'/>: District</li>
						<li><input type="text" name='shipping_city'/>: City</li>
						<li><input type="text" name='shipping_zip'/>: Zip</li>
						<li><input type="submit" name='shipping_form_submit' value="Checkout"/></li>
						</form>
					</ul>
				</td>
				<td valign="top">
				<h3 class='title'>Your Bill</h3>
						<div class='cart'>
								<?php
									$sql="select * from shopping_cart where user_id='$user_id'";
									$result=select($sql);
									if($result!=='false')
									{	$i=1;$total_price=0;
										echo "<table class='cart_table'>";
										echo"<tr><th>Sr. No.</th><th>Book title</th><th>Quantity</th><th>Book Price</th><th>Total price</th></tr>";
										
										while($row=mysql_fetch_assoc($result))
										{	
											$book_id=$row['book_id'];
											$row2=select_unique("select * from books where book_id='$book_id'");
											$book_title=$row2['book_title'];
											echo"<tr>";
											echo"<td>".$i."</td>";
										
											echo"<td>".$book_title."</td>";
											echo"<td>".$row['quantity']."</td>";
											echo"<td>Rs. ".$row['price']."</td>";
											echo"<td>Rs. ".$row['total_price']."</td>";
											$total_price+=$row['total_price'];
											
											echo"</tr>";
											$i++;
										}
									
										echo"<tr>
									
										<td colspan='5' align='right'> <b>Total amount: </b>Rs. $total_price</td>
										</tr>"; 
										
											
											echo "</table>";
									}
								?>
							</div>
				
				</td>
			</tr>
		<table>
	</div>
</body>
</html>

							