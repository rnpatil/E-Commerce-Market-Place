<?php
include('DbConnect.php');
if(@$_SESSION['user_status']!='logged_in')
{
	die("<h2>Please login to use this facility</h2>");
}
include('CartFunctions.php');
$action=@$_GET['action'];
$book_id=@$_GET['book_id'];


	switch($action)
	{
		
		case 'add':
		$res=add_to_Cart($book_id);
		if($res=='true')
		{
			header('location:cart.php');
		}
		else
		{
			$_SESSION['message']='<h3>Some error occured</h3><p>Cannot add data to shopping cart.</p>';
			header('location:message.php');
			die;
		}
		break;
		
		case 'remove':
		$res=remove_from_cart($book_id);
			if($res!=='false')
			{
				header('location:cart.php');
			}
			else
			{
			$_SESSION['message']='<h3>Some error occured</h3><p>Cannot remove data from shopping cart.</p>';
			header('location:message.php');
			die;
			}
		break;
		
		case 'update':
		$res=update_cart();
			if($res=='true')
			{
			header('location:cart.php');
			}
			else
			{
			$_SESSION['message']='<h3>Some error occured</h3><p>Cannot update shopping cart.</p>';
			header('location:message.php');
			die;
			}
		break;
		
		case 'checkout':
			$res=checkout();
		break;
		
		case 'empty':
			
		break;
	
		default:
			$_SESSION['message']="<h2>Wrong choice</h2><p>Please choose options made available on web page</p>";
			header('location:message.php');
		break;


	}




?>