<?php

function DbConnect()
{
	$con=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db("ecomm2",$con)or die(mysql_error());
	return $con;
}
include('DbFunctions.php');
@session_start();
?>