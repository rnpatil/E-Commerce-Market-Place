<?php
function add_to_cart($book_id)
{	
	$user_id=@$_SESSION['user_id'];
	$row=select_unique("select * from shopping_cart where book_id='$book_id' and user_id='$user_id'");

	if($row!=='false')
	{		
		$_SESSION['message']="<h3>You already have this book in your cart.</h3><p>Please try out with different one.</p>";
		header("location:message.php");
		die;
	}
	else
	{
		$sql="select * from books where book_id='$book_id'";
		$row=select_unique($sql);
		$price=$row['price'];
		$sql="INSERT INTO shopping_cart(book_id,user_id,price,total_price,last_update) values($book_id,$user_id,$price,$price,now())";
		$res=insert_or_update($sql);
		return $res;
	}
}
function remove_from_cart($book_id)
{	$user_id=@$_SESSION['user_id'];
	$sql="select * from books where book_id=$book_id";
	$row=select_unique($sql);
	if($row!=='false')
	{
		$remove_sql="delete from shopping_cart where book_id='$book_id' and user_id='$user_id'";
		$row2=insert_or_update($remove_sql);
		return $row2;
	}
	else
	{
		return 'false';
	}
}

function update_cart()
{	$user_id=@$_SESSION['user_id'];
	$update_array=$_REQUEST['q'];
	foreach($update_array as $book_id=>$quantity)
	{	
		$check_available_quantity="select quantity from books where book_id='$book_id'";
		$row=select_unique($check_available_quantity);
		if($row!=='false')
		{
			if($row['quantity']<$quantity)
			{
				die("<h3>Sorry, We do not have sufficient quantity available.</h3><p>Please try out with different books.</p>");
			}
		}
		else
		{
		}
		$sql="update shopping_cart set quantity='$quantity' where (book_id='$book_id' and user_id='$user_id')";
		$res=insert_or_update($sql);
		if($res!=true)
		{
			return 'false';
		}
		else
		{
		$sql="update shopping_cart set total_price=quantity*price where(book_id='$book_id' and user_id='$user_id')";
			$res=insert_or_update($sql);
			if($res!=true)
			{
				return 'false';
			}
		}
	}
	return 'true';
	
}
function write_cart_status()
{	
	if(@$_SESSION['user_status']=='logged_in')
		{$user_id=@$_SESSION['user_id'];
		$sql="select * from shopping_cart where user_id='$user_id'";
		$res=select($sql);

		if($res!=='false')
		{	$count=0;
			while($row=mysql_fetch_assoc($res))
			{
			$count+=$row['quantity'];
			}
			echo "<p style='font-family:verdana;font-size:13px;text-align:center'><b>You have ".$count." books in your shopping cart.</b></p>";
			echo"<a href='cart.php' style='font-family:verdana;font-size:13px;text-align:center;color:firebrick'><b>See your shopping cart</b></a>";
		}
		else
		{
		echo "<p style='font-family:verdana;font-size:13px;text-align:center'><b>Your shopping cart is empty.</b></p>";
		}
	}		
}

function checkout()
{
$user_id=@$_SESSION['user_id'];

foreach($_REQUEST as $key=>$value)
{
	if($value=="")
	{
	die("<h2>You cannot leave any field empty</h2><p>You might have missed out some fields in the form.<br />Please fill the form correctly and try again</p>");
	}
}
	
	$shipping_fname=mysql_real_escape_string($_REQUEST['shipping_fname']);
	$shipping_lname=mysql_real_escape_string($_REQUEST['shipping_lname']);
	$shipping_address=mysql_real_escape_string($_REQUEST['shipping_address']);
	$shipping_contact=mysql_real_escape_string($_REQUEST['shipping_contact']);
	$shipping_state=mysql_real_escape_string($_REQUEST['shipping_state']);
	$shipping_district=mysql_real_escape_string($_REQUEST['shipping_district']);
	$shipping_city=mysql_real_escape_string($_REQUEST['shipping_city']);
	$shipping_zip=mysql_real_escape_string($_REQUEST['shipping_zip']);
	
	
	$sql="insert into shipping_user_info (user_id,shipping_fname,shipping_lname,shipping_address,shipping_contact,shipping_state,shipping_district,shipping_city,shipping_zip)
	VALUES('$user_id','$shipping_fname','$shipping_lname','$shipping_address','$shipping_contact','$shipping_state','$shipping_district','$shipping_city','$shipping_zip')";
	$res=insert_or_update($sql);
	if($res==true)
	{	
	
		$sql2="select shipping_id from shipping_user_info where user_id='$user_id' and shipping_fname='$shipping_fname'";
		$row=select_unique($sql2);
		$shipping_id=$row['shipping_id'];
		
		
		$sql3="select * from shopping_cart where user_id='$user_id'";
		$res=select($sql3);
		if($res!=='false')
		{
			while($row2=mysql_fetch_assoc($res))
			{	$cart_id=$row['cart_id'];
				$book_id=$row['book_id'];
				$quantity=$row['quantity'];
				$total_price=$row['total_price'];
				
				
				$sql4="insert into shipping_books_info (book_id,quantity,total_price,shipping_id) VALUES ('$book_id','$quantity','$total_price','$shipping_id')";
				$res4=insert_or_update($sql4);
				if($res4!=='false')
				{
					
					$sql="delete from shopping_cart where user_id='$user_id'";
					$res=insert_or_update($sql);
					if($res==true)
					{	
						
						$_SESSION['message']="<h2>Thank you for shopping at our e-commerce portal.</h2><h3>Visit again</h3>
						<p>You will recieve your books within 2days.</p>";
					}
					else
					{
						$_SESSION['message']="Cannot delete books from shopping cart";
					}
				
				}
				else
				{
				$_SESSION['message']="<h2>Error during inserting books shipping information.</h2>";
				}
			}
		}
	}
	else
	{
	$_SESSION['message']="<h2>Error during inserting user shipping information.</h2>";
	}
	
	header('location:message.php');
	


}


?>