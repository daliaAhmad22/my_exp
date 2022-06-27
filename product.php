<?php
	include "include.html";
	include "connection_DB.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Products</title>
		<style>
			.container{
				max-width: 1200px;
				margin: auto;
				background: #f2f2f2;
				overflow: auto;
			}
			.gallery{
				margin: 5px;
				border: 1px solid #ccc;
				float: left;
				width: 390px;
			}
			.gallery img{
				width: 100%;
				height: auto;
			}
			.desc{
				padding: 15px;
				text-align: center;
			}
		</style>
	</head>
	<body>
		<br> <br>
		<form action="basket.php" method="post">
		<div class="container">
			<div class="gallery">
				<img src="image_gas/g1.jpg">
				<center>
				<br>
					<h3 style="color: red">Discription: </h3>
					<br>
					<br>
					<br>
					<h4>
						Type : gas1 <br>
						Wight: 12 Kg<br>
						Price : 50 SH<br>
					</h4>
					<br>
				<button class="desc" type="submit" name="product1">Add to carts</button>
				</center>
			</div>
			</form>

			<div class="gallery">
				<img src="image_gas/g2.jpg">
				<center>
				<br>
					<br>
					<br>
					<br>
					<h3 style="color: red">Discription: </h3>
					<br>
					<h4>
						Type : gas2 <br>
						Wight: 5 Kg<br>
						Price : 35 SH<br>
					</h4>
					<br>
				<button class="desc" type="submit" name="product2">Add to carts</button>
					<br>
				</center>
			</div>

			<div class="gallery">
				<img src="image_gas/g3.jpg">
				<center>
					<h3 style="color: red">Discription: </h3>
					<br>
					<h4>
						Type : gas3 <br>
						Wight: 12 Kg<br>
						Price : 50 SH<br>
					</h4>
					<br>
				<button class="desc" type="submit" name="product3">Add to carts</button>
				</center>
			</div>

			<div class="gallery">
				<img src="image_gas/g4.jpg">
				<center>
					<h3 style="color: red">Discription: </h3>
					<br>
					<h4>
						Type : gas4 <br>
						Wight: 12 Kg<br>
						Price : 50 SH<br>
					</h4>
				<button class="desc" type="submit" name="product4">Add to carts</button>
				</center>
			</div>

			<div class="gallery">
				<img src="image_gas/g5.jpg">
				<center>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<h3 style="color: red">Discription: </h3>
					<br>
					<h4>
						Type : gas5 <br>
						Wight: 12 Kg<br>
						Price : 50 SH<br>
					</h4>
				<br>
				<button class="desc" type="submit" name="product5">Add to carts</button>
				</center>
			</div>

			<div class="gallery">
				<img src="image_gas/g6.jpg">
				<center>
					<br>
					<br>
					<h3 style="color: red">Discription: </h3>
					<br>
					<h4>
						Type : gas6 <br>
						Wight: 12 Kg<br>
						Price : 50 SH<br>
					</h4>
				<button class="desc" type="submit" name="product6">Add to carts</button>
				</center>
			</div>

		</div>
	</body>
</html>

