<?php
include('DbConnect.php');
include('CartFunctions.php');
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
				</td>

				<td valign="top" width="51%">
					<div class="content">
						<h3 class="title">About us</h3>
						
						<table style="margin-top:-10px" class="image_display" cellspacing="5" cellpadding="25">
						
						<h1>Buy Books Online from Our Bookstore</h1>
						<p>Catch up on all the latest Books at ONLINE BOOKSTORE, including award winning authors, illustrators, designers, publishers and book related to news. From inspirational guides to cookbooks, motivational books, yoga, weight management, children's books, books on Medicine, technology and engineering, sports and recreation to fiction and nonfiction, you can find them all online. Books in India find an idyll in our store.</p>
						<p>Searching for books is also not a hassle at Indiaplaza book section, as user friendly categorization makes it easy to navigate through the store and not waste time surfing blindly. We offer huge discounts and have very lucrative offers from time to time. We also offer advance purchase of books slated for a late release. You will be the first to get the book if you have booked your edition.</p>
						</table>
					</div>
				</td>
				<td valign="top" width="15%">
					<div class="login">
						<?php echo $form; 
						 ?>
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
