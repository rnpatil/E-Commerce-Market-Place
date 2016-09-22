<?php

@session_start();
$message=$_SESSION['message'];
if(!isset($_SESSION['message']))
{
$_SESSION['message']="<h2>You are not authorized to see this page.</h2>";
}
?>

<html>
<head>
	<title>Message</title>
	<link rel="stylesheet" type="text/css" href="ecomm.css"/>
</head>
<body>
	<div class="container">
		<div class="message">
			<?php echo $message;?><br />
			
			<a href='index.php'>Go to E-commerce portal</a>
		</div>
	</div>
</body>