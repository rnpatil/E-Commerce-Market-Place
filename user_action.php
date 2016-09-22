<?php
include("DbConnect.php");

	$action=@$_REQUEST['action'];


switch($action)
{
	
	case 'register':
		
			$fname=mysql_real_escape_string($_REQUEST['fname']);
			$email=mysql_real_escape_string($_REQUEST['emailid']);
			$addr=mysql_real_escape_string($_REQUEST['address']);
			$zip=mysql_real_escape_string($_REQUEST['zip_code']);
			
			$state=mysql_real_escape_string($_REQUEST['state']);
			$country=mysql_real_escape_string($_REQUEST['country']);
			$lno=mysql_real_escape_string($_REQUEST['lno']);
			$mno=mysql_real_escape_string($_REQUEST['mno']);
			$psww=mysql_real_escape_string($_REQUEST['psww']);
			$cpsww=mysql_real_escape_string($_REQUEST['cpsww']);    
			
			
			
			
								
								
								$sql="insert into user2(name,email_id,address,zip_code,state,country,landline_no,mobile_no,password,con_password)  values('$fname','$email','$addr',$zip,'$state','$country',$lno,$mno,'$psww','$cpsww')";
								$result=insert_or_update($sql);
								if($result==true)
								{		
											
										$res2=mysql_query("select * from user2 where email_id='$email' and password='$psww'") or die(mysql_error());
										$row2=mysql_fetch_assoc($res2);
										
										$_SESSION['user_status']='logged_in';
										$_SESSION['user_id']=$row2['id'];
										$_SESSION['user_name']=$row2['name'];
										
										header("location:index.php");
								}
								else
								{
									die("Some error has occured. Please try again later");
								}
					
	break;
	
	case 'login':
	$email=mysql_real_escape_string($_REQUEST['email']);
	$password=(mysql_real_escape_string($_REQUEST['password']));
	
	$sql="select * from user2 where email_id='$email' and password='$password'";
	$row=select_unique($sql);
	
	if($row!=='false')
	{	session_start();
		$_SESSION['user_status']='logged_in';
		$_SESSION['user_id']=$row['id'];
		$_SESSION['user_name']=$row['name'];
		header("location:index.php");
	}
	else
	{
		die("<h2>Invalid Email or Password.Please try again</h2>");
	}
	
	break;
	
	case 'logout':
	if($_SESSION['user_status']=='logged_in')
	{
		unset($_SESSION['user_status']);
		unset($_SESSION['user_id']);
		unset($_SESSION['user_name']);
		header("location:index.php");
		
	}
	break;
	
	default:
	echo "<h2>Wrong Choice</h2>";
	break;
}



?>