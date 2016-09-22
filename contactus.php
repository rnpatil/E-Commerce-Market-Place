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
						<h3 class="title">Contact us</h3>
						
						<table style="margin-top:-10px" class="image_display" cellspacing="5" cellpadding="25">
						<tr>          
				          <td align="left"><h4> Rohit Patil</h4> 
						                   <h5>Contact:-8123498122<br/>
                                           Email ID:-rohitneelpatil@gmail.com</h5>   	
                                          
											
					</td>
					</tr>
					<tr>
					</tr>	
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
