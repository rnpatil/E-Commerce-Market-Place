<?php

include('DbConnect.php');
include('CartFunctions.php');
$order=$_GET['order'];
$category_name=$_GET['category_name'];
switch($order)
{	
	case 'category':
	$sql="select * from books b,category c where b.category_id=c.category_id and category_name='$category_name'";
	$result=select($sql);
	break;
	
}
if(@$_SESSION['user_status']!='logged_in')
{
$form="
<p>Dear Guest, Please Log in</p>
<form action='user_action.php?action=login' method='post'>
Email: <br />
	<input type='email' name='email'/> 
	<br />
	 Password :<br />
	<input type='password' size='25' name='password'/><br />
	<input type='submit' size='25' value='Login'/>
</form>

<a href='signup1.php'>Signup Here</a>

";
}
else
{
$form="<a href='user_action.php?action=logout' class='add_to_cart_button'>Logout</a> <h1>welcome</h1> ";
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
	
		<table id="main_table" class="main_table"  width='100%'>
			<tr>
				<td valign="top" width="13%">
					<div class="content">
						<?php include('includes/left_nav.php');?>
					</div>
					<div class="content">
						
					</div>
				</td>
				
				<td valign="top" width="51%">
						<div class="content">
						<h3 class="title">Latest arrival</h3>
						
						<table style="margin-top:-10px" class="image_display" cellspacing="5" cellpadding="25" >
						<?php
						$i=0;
						while($row=mysql_fetch_assoc($result))
						{
						
							$book_title=$row['book_title'];
							$book_id=$row['book_id'];
							$book_price=$row['price'];
							$image_path=$row['image_path'];
							$author_id=$row['author_id'];
							$category_id=$row['category_id'];
						
							$sql2="SELECT author_name FROM author WHERE author_id='$author_id'";
							$row2=select_unique($sql2);
							$author_name=$row2['author_name'];
							
							$sql3="SELECT category_name FROM category WHERE category_id='$category_id'";
							$row3=select_unique($sql3);
							$category_name=$row3['category_name'];
							
								
							if($i%3==0)
							echo"<tr>";
							
							echo"
							<td >
									<div class='details'>
										<a href='book_details.php?book_id=$book_id' ><div class='book_title'>$book_title</div>
										<img src='$image_path' />
											</a>
										<ul class='details'>
											<li><b>Author</b>- $author_name</li>
											<li><b>Category</b>-$category_name</li>
											<li><b>price</b>- $book_price</li>
											<li><br />	<a href='add_to_cart.php?action=add&book_id=$book_id' class='add_to_cart_button'>Add to cart</a></li>
										</ul>
										</div>
									
									</div>
								
							</td>";
							
							$i++;
						}
						
						?>
						
						</table>
					</div>
				</td>
				<td valign="top" width="15%">
					<div class="login">
						<?php echo $form; ?>
					</div>
					<div class="shoppimg_cart_link">
						<h1><?php 
						
						echo @$_SESSION['user_name'];
						write_cart_status();
						?> </h1>
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
				