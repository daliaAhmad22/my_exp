<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Home Page</title>
		<style>
			*{
				margin: 0;
				padding: 0;
				font=family: sans-serif;
			}
			body{
				background-color: #C0C0C0;
			}
			img{
				margin-top: 60px;
			}
			h1{
				text-align: center;
			}

			.boxContainer{
				margin: auto;
				margin-top: 4%;
				position: relative;
				width: 700px;
				height: 42px;
				border: 4px solid #2980b9;
				padding: 0px 10px;
				border-radius: 50px;

			}
			.elementContainer{
				width: 100%;
				height: 100%;
				vertical-align: middle;
			}
			.search{
				border: none;
				height: 100%;
				width: 600px;
				padding: 0px 5px;
				font-size: 18px;
				font-family: "Nunito";
				color: #424242;
				font-weight: 500;
			}

			.search{
				outline: none;
			}
			.material-icons{
				font-size: 26;
				color: #2980b9;
			}


		</style>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<?php include "include.html" ?>
		<div class="boxContainer">
			<form action=" " method="POST">
			<table class="elementsContainer">
				<tr>
					<td>
						<input type="submit" name="submit" value="search">
					</td>
					<td>
						<input type="text" placeholder="search" class="search" name="search">
						<!-- <a href="product.php?search=<php echo $>"><i class="material-icons">search</i></a> -->
					</td>
				</tr>
			</table>
			
		</div>
			</form>
		<center>
			<br> 
			<i class="fa" style="font-size:24px"></i>
		    <span> <a id="cart" class="" href="basket.php"><div class="count"> </div>Basket</a> </span>
		</center>
		<img src="image_gas/gass_image.jpeg" width="100%">
		<h1 >Welcome In Gas Booking System</h1>
	</body>
</html>

<?php 
	if(isset($_POST['submit'])) {
		$search = $_POST['search'];
		$query = "SELECT * FROM cylinder WHERE TYPE = '$search'  ";
		$result = oci_parse($connect, $query);
		oci_execute($result);

		if (oci_fetch_all($result, $rst) > 0) {
			header('location:product.php');
		}
		else{
			header('location:index.php');
		}
}
?>