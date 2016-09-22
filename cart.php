<?php
include('Dbconnect.php');
if(@$_SESSION['user_status']!=='logged_in')
{
$_SESSION['message']="<h2>You are not logged in</h2><p>Please log in to use this facility</p>";
header("location:message.php");
}
else
{	
	$user_id=$_SESSION['user_id'];
	$user_name=$_SESSION['user_name'];
	$sql="select * from shopping_cart where user_id='$user_id'";
	$result=select($sql);
	if($result=='false')
	{
		$_SESSION['message']="<h2>You do not have any books in your shopping cart</h2>";
		header("location:message.php");
	}

}
?>

<html>
<head>
	<title>E-commerce: Sign up</title>
		<link rel="stylesheet" type="text/css" href="ecomm.css"/>
	</head>
	
	<body>
	<div class="container">
	
	<?php
	include('includes/header.php');
	?>
	
		<table id="main_table" class="main_table"  width='100%'>
			<tr>
				<td valign="top" width="20%">
					<div class="content">
						<div class="hnav">
						<p class="title"> Cart Functions..</p>
							<ul>
								<li><a href="index.php">Add more books</a></li>
						
							</ul>
						</div>
					</div>
				</td>
				<td valign="top" width="70%">	
					<div class="content">
							<div class="welcome">
								<h3>Welcome <?php echo $user_name; ?></h3>
							</div>
							<div class='cart'>
								<?php
									$sql="select * from shopping_cart where user_id='$user_id'";
									$result=select($sql);
									if(mysql_num_rows($result)>0)
									{	$i=1;$total_price=0;
										echo "<table class='cart_table'>";
										echo"<tr><th>Sr. No.</th><th>Action</td><th>Book title</th><th>Quantity</th><th>Book Price</th><th>Total price</th><th>Last updated</th></tr>";
										echo "<form action='add_to_cart.php?action=update' method='post'>";
										while($row=mysql_fetch_assoc($result))
										{	
											$book_id=$row['book_id'];
											$row2=select_unique("select * from books where book_id='$book_id'");
											$book_title=$row2['book_title'];
											echo"<tr>";
											echo"<td>".$i."</td>";
											echo"<td><a href='add_to_cart.php?action=remove&book_id=$book_id' >Remove </a></td>";
											echo"<td>".$book_title."</td>";
											echo"<td><input size='5' type='number' name='q[$book_id]' value='".$row['quantity']."'/></td>";
											echo"<td>Rs. ".$row['price']."</td>";
											echo"<td>Rs. ".$row['total_price']."</td>";
											$total_price+=$row['total_price'];
											echo"<td>".$row['last_update']."</td>";
											echo"</tr>";
											$i++;
										}
									
										echo"<tr>
										<td colspan='4'><input type='submit' value='Update cart' /></td>
										<td colspan='2'> <b>Total amount: </b>Rs. $total_price</td>
										</tr>"; 
										echo "<tr><td style='padding:10px 0px 10px 0px' colspan='7'><a class='add_to_cart_button' href='checkout.php'>Checkout</a>";
											echo "</form>";
											echo "</table>";
									}
								?>
							</div>
					</div>
				</td>
			</tr>
		</table>
	</div>
	</body>
	</html>
					