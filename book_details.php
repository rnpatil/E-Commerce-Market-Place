<?php
include('DbConnect.php');
$book_id=$_GET['book_id'];

$sql="select * from books b, author a, category c where b.book_id='$book_id' and b.author_id=a.author_id and b.category_id=c.category_id";
$row=select_unique($sql);
if($row=='false')
{
	$_SESSION['message']='<h2>Book not found</h2>';
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
		<table id="main_table" cellspacing="10" class="book_profile"  width='100%'>
			<tr>
				<td>
					<?php echo"<h2>".$row['book_title']."</h2>"; ?>
				</td>
			</tr>
			<tr>
				<td valign="top" width="13%">
					<?php
						$image_path=$row['image_path'];
						echo "<img style='border:1px solid black' src='$image_path' height='260' width='230' />";
					?>
				</td>
				<td valign="top" width="50%">
					<div class='book_details'><?php
						$isbn=$row['isbn'];
						$book_title=$row['book_title'];
						$price=$row['price'];
						$pages=$row['pages'];
						$publisher=$row['publisher'];
						$author=$row['author_name'];
						$category=$row['category_name'];
						$category_id=$row['category_id'];
						$author_id=$row['author_id'];
						$desc=$row['description'];
						
						echo "<ul class='desc'>
						<li><b>ISBN </b>: $isbn</li>
						<li><b>Author </b>: $author</li>
						<li><b>category </b>: $category</li>
						<li><b>publisher </b>: $publisher</li>
						<li><b>pages </b>: $pages</li>
						<li><b>price </b>: Rs. $price</li>
						<li><br /><b>Synopsis: </b><br />
						$desc</li>";

						echo"<br /><br /><a href='add_to_cart.php?action=add&book_id=$book_id' class='add_to_cart_button'>Add to Cart</a>";
					?>
					</div>
				</td>
				
			</tr>
			
			
		</table>
</body>
</html>